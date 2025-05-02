<?php

namespace Proyek1\Service;

use Exception;
use Proyek1\Config\Database;
use Proyek1\Domain\Laporan;
use Proyek1\Domain\User;
use Proyek1\Exception\ValidationException;
use Proyek1\Model\UserForgotPasswordRequest;
use Proyek1\Model\UserForgotPasswordResponse;
use Proyek1\Model\UserLoginRequest;
use Proyek1\Model\UserLoginResponse;
use Proyek1\Model\UserRegisterRequest;
use Proyek1\Model\UserRegisterResponse;
use Proyek1\Model\UserTambahLaporanRequest;
use Proyek1\Model\UserTambahLaporanResponse;
use Proyek1\Repository\UserRepository;
use Proyek1\Model\UserProfileUpdateRequest;
use Proyek1\Model\UserProfileUpdateResponse;
use Proyek1\Model\UserPasswordUpdateRequest;
use Proyek1\Model\UserPasswordUpdateResponse;
use Proyek1\Service\Mailer;
class UserService {

    private UserRepository $userRepository;
    private Mailer $mailer;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function register(UserRegisterRequest $request): UserRegisterResponse{
        $this->validateUserRegisterRequest($request);
        
        try{
            Database::beginTransaction();
            $user = $this->userRepository->findById($request->id);
            if ($user != null){
                throw new ValidationException("User Already exists");
            } 

            $user = new User();
            $user->id = $request->id;
            $user->name = $request->name;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $response = new UserRegisterResponse();
            $response->user = $user;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateUserRegisterRequest(UserRegisterRequest $request){
        if ($request->id == null || $request->name == null || $request->password == null ||
            trim($request->id) == "" || trim($request->name) == "" || trim($request->password) == "") {
            throw new ValidationException("Id, Name, Password can not blank");
        }
    }

    public function login(UserLoginRequest $request): UserLoginResponse  {
        $this->validateUserLoginRequest($request);

        $user = $this->userRepository->findById($request->id);
        if($user == null){
            throw new ValidationException("id or password is wrong ");
        }

        if(password_verify($request->password, $user->password)){
            $response = new UserLoginResponse();
            $response->user = $user                                                                                                             ;
            return $response;
        }else{
            throw new ValidationException("id or password is wrong ");
        }
    }

    private function validateUserLoginRequest(UserLoginRequest $request) {
        if ($request->id == null || $request->password == null ||
            trim($request->id) == "" || trim($request->password) == "") {
            throw new ValidationException("Id, Password can not blank");
        }
    }


    public function updateProfile(UserProfileUpdateRequest $request): UserProfileUpdateResponse {
        $this->validateUserProfileRequest($request);
        try {
            
            Database::beginTransaction();
            $user = $this->userRepository->findById($request->id);  
            
            if ($user == null){
                throw new ValidationException("User is not found");
            }

            $user->name = $request->name;
            $this->userRepository->update($user);
            Database::commitTransaction();

            $response = new UserProfileUpdateResponse();
            $response->User = $user;
            return $response;
        }catch (\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateUserProfileRequest(UserProfileUpdateRequest $request) {
        if ($request->id == null || $request->name == null || trim($request->id) == "" || trim($request->name) == "") {
            throw new ValidationException("Id, Password can not blank");
        }
    }

    public function updatePassword(UserPasswordUpdateRequest $request): UserPasswordUpdateResponse
    {
        $this->validateUserPasswordUpdateRequest($request);

        try {
            Database::beginTransaction();

            $user = $this->userRepository->findById($request->id);
            if ($user == null) {
                throw new ValidationException("User is not found");
            }

            if (!password_verify($request->oldPassword, $user->password)) {
                throw new ValidationException("Old password is wrong");
            }

            $user->password = password_hash($request->newPassword, PASSWORD_BCRYPT);
            $this->userRepository->update($user);

            Database::commitTransaction();

            $response = new UserPasswordUpdateResponse();
            $response->user = $user;
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateUserPasswordUpdateRequest(UserPasswordUpdateRequest $request)
    {
        if ($request->id == null || $request->oldPassword == null || $request->newPassword == null ||
            trim($request->id) == "" || trim($request->oldPassword) == "" || trim($request->newPassword) == "") {
            throw new ValidationException("Id, Old Password, New Password can not blank");
        }
    }

    public function forgotPassword(UserForgotPasswordRequest $request ): UserForgotPasswordResponse {
        $this->validateUserForgotPasswordRequest($request);
        try {
            Database::beginTransaction();
            $token = $this->userRepository->setTheToken($request);
            Database::commitTransaction();
            if ($token == null){
                throw new ValidationException("SomeThing wrong the token is null");
            }
            if ($token !=  null) {
                $mail = $this->mailer->setMail();
                
                $mail->setFrom("noreply@example.com");
                $mail->addAddress($request);
                $mail->Subject = "Password Reset";
                $mail->Body = <<<END

                Click <a href="https://Proyek-1.test/reset-password.php?token=$token">here</a>
                to reset your password.

                END;
                try {
                    $mail->send();

                    $response = new UserForgotPasswordResponse();
                    $response->id = $request->id;
                    $response->token = $token;
                    return $response;
                    
                    
                } catch(Exception $e) {
                    echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                }

                
            }
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
                
    }

    private function validateUserForgotPasswordRequest(UserForgotPasswordRequest $request) 
    {
    // Validasi jika ID tidak diberikan, berupa string kosong, atau format email tidak valid
        if (empty($request->id) || trim($request->id) === "" || !filter_var($request->id, FILTER_VALIDATE_EMAIL)) { 
            throw new ValidationException("Please send the verified email!");
        }
    }

    public function TambahLaporan(UserTambahLaporanRequest $request):UserTambahLaporanResponse {
        $this->validateUsertambahlaporamRequest($request);
        try {
            Database::beginTransaction();
            $laporan = new Laporan();
            
            $laporan->no_kk = $request->no_kk;
            $laporan->jumlah_anggota_keluarga = $request->jumlah_anggota_keluarga;
            $laporan->jumlah_rumah = $request->jumlah_rumah;
            $laporan->langit_langit = $request->langit_langit;
            $laporan->dinding = $request->dinding;
            $laporan->lantai = $request->lantai;
            $laporan->jendela_kamar_tidur = $request->jendela_kamar_tidur;
            $laporan->jendela_ruang_keluarga = $request->jendela_ruang_keluarga;
            $laporan->ventilasi = $request->ventilasi;
            $laporan->lubang_asap_dapur = $request->lubang_asap_dapur;
            $laporan->pencahayaan = $request->pencahayaan;
            $laporan->sarana_air_minum = $request->sarana_air_minum;
            $laporan->jamban = $request->jamban;
            $laporan->spal = $request->spal;
            $laporan->tps = $request->tps;
            $laporan->nama_laporan = $request->nama_laporan;
            

            $this->userRepository->laporan($laporan);
            $response = new UserTambahLaporanResponse;
            $response->nama_laporan = $laporan->nama_laporan;
            Database::commitTransaction();

            return $response;
            
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateUsertambahlaporamRequest(UserTambahLaporanRequest $request) 
    {
    // Validasi jika ID tidak diberikan, berupa string kosong, atau format email tidak valid
        if (empty($request->nama_laporan) || trim($request->nama_laporan) === "") {
            throw new ValidationException("Nama laporan tidak boleh kosong!");
        }

        // Validasi nomor KK harus berupa angka dan tidak boleh kosong
        if (empty($request->no_kk) || !is_numeric($request->no_kk)) {
            throw new ValidationException("Nomor KK harus berupa angka dan tidak boleh kosong!");
        }

        // Validasi jumlah anggota keluarga harus angka positif
        if (isset($request->jumlah_anggota_keluarga) && $request->jumlah_anggota_keluarga <= 0) {
            throw new ValidationException("Jumlah anggota keluarga harus lebih dari 0!");
        }

        // Validasi jumlah rumah harus angka positif
        if (isset($request->jumlah_rumah) && $request->jumlah_rumah <= 0) {
            throw new ValidationException("Jumlah rumah harus lebih dari 0!");
        }


    }

    public function getRekapLaporan():array{
        try {
            return $this->userRepository->rekapLaporan();
        } catch (\Exception $exception) {
            // Log error untuk debugging
            error_log("Error in getAllRekapLaporan: " . $exception->getMessage());
            return [];
        }
    }

    public function getGroupedDataByNamaLaporan(): array {
        try {
            return $this->userRepository->getGroupedDataByNamaLaporan();
        } catch (\Exception $exception) {
            error_log("Error in getGroupedDataByNamaLaporan: " . $exception->getMessage());
            return [];
        }
    }

    public function getGroupedData(): array {
        return $this->userRepository->getGroupedData();
    }
    
    public function getAkumulasiLaporan():array{
        try {
            return $this->userRepository->akumulasiLaporan();
        } catch (\Exception $exception) {
            // Log error untuk debugging
            error_log("Error in getAllRekapLaporan: " . $exception->getMessage());
            return [];
        }
    }
        
    
}
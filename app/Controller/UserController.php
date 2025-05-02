<?php

namespace Proyek1\Controller;

use Proyek1\Config\Database;
use Proyek1\Exception\ValidationException;
use Proyek1\Model\UserForgotPasswordRequest;
use Proyek1\Model\UserLoginRequest;
use Proyek1\Model\UserRegisterRequest;
use Proyek1\Model\UserTambahLaporanRequest;
use Proyek1\Service\UserService;
use Proyek1\Repository\UserRepository;
use Proyek1\App\View;
use Proyek1\Repository\SessionRepository;
use Proyek1\Service\SessionService;
use Proyek1\Model\UserProfileUpdateRequest;



class UserController
{
    private UserService $userService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection('prod');
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    public function register()
    {
        View::render('Register/index', [
            'title' => 'Register new User'
        ]);
    }

    public function postRegister()
    {
        $request = new UserRegisterRequest();
        $request->id = $_POST['id'];
        $request->name = $_POST['name'];
        $request->password = $_POST['password'];

        try {
            $this->userService->register($request);
            View::redirect('/Login');
        } catch (ValidationException $exception) {
            View::render('Register/index', [
                'title' => 'Register new User',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function login()
    {
        View::render('Login/index', [
            "title" => "Login user"
        ]);
    }

    public function postLogin()
    {
        $request = new UserLoginRequest();
        $request->id = $_POST['id'];
        $request->password = $_POST['password'];

        try {
            $response = $this->userService->login($request);
            $this->sessionService->create($response->user->id);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('Login/index', [
                'title' => 'Login user',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function logout()
    {
        $this->sessionService->destroy();
        View::redirect("/");
    }

    public function updateProfile(){
        $user = $this->sessionService->current();
        
        View::render('Profile/Profile', [
            "title" => "User Profile",
            "user" => [
                "id" => $user -> id,
                "name" => $user->name
            ]
        ]);
    }

    public function postUpdateProfile()
    {
        $user = $this->sessionService->current();

        $request = new UserProfileUpdateRequest();
        $request->id = $user->id;
        $request->name = $_POST['name'];

        try {
            $this->userService->updateProfile($request);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('/Profile', [
                "title" => "Update user profile",
                "error" => $exception->getMessage(),
                "user" => [
                    "id" => $user->id,
                    "name" => $_POST['name']
                ]
            ]);
        }
    }

    public function forgotPassword(){
        View::render('Reset-password/index', [
            "title" => "forgot password"
        ]);
    }

    public function postForgotPassword(){
        $request = new UserForgotPasswordRequest();
        $request->id = $_POST['email'];
        
        try {
            $this->userService->forgotPassword($request);
            echo "berhasil";
        } catch(ValidationException $exception) {
            View::render('Reset-password', 
            [
                'title' => 'forgot password',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function laporan() {
        $user = $this->sessionService->current();
        View::render('Laporan/index', [
            'title' => 'Buat Laporan',
            "user" => [
                "id" => $user -> id,
                "name" => $user->name
            ]
        ]);
    }


    public function postLaporan(){
        $request = new UserTambahLaporanRequest();
        $request->nama_laporan = $_POST['nama_laporan'];
        $request->no_kk = $_POST['no_kk'];
        $request->jumlah_anggota_keluarga = $_POST['jumlah_anggota_keluarga'];
        $request->jumlah_rumah = $_POST['jumlah_rumah'];
        $request->langit_langit = $_POST['langit_langit'];
        $request->dinding = $_POST['dinding'];
        $request->lantai = $_POST['lantai'];
        $request->jendela_kamar_tidur = $_POST['jendela_kamar_tidur'];
        $request->jendela_ruang_keluarga = $_POST['jendela_ruang_keluarga'];
        $request->ventilasi = $_POST['ventilasi'];
        $request->lubang_asap_dapur = $_POST['lubang_asap_dapur'];
        $request->pencahayaan = $_POST['pencahayaan'];
        $request->sarana_air_minum = $_POST['sarana_air_minum'];
        $request->jamban = $_POST['jamban'];
        $request->spal = $_POST['spal'];
        $request->tps = $_POST['tps'];

        try {
            $this->userService->TambahLaporan($request);
            View::redirect('/Laporan');
        } catch (ValidationException $exception) {
            View::render('Laporan/index', [
                'title' => 'Buat Laporan',
                'error' => $exception->getMessage()
            ]);
        }

    }

    public function rekapLaporan() {
        $user = $this->sessionService->current();
    
        // Ambil data rekap laporan dari service
        $rekapList = $this->userService->getRekapLaporan(); // Array dari objek Rekap
    
        // Render view dengan data
        View::render('Rekap-laporan/index', [
            "title" => "Rekap Laporan",
            "user" => [
                "id" => $user->id,
                "name" => $user->name
            ],
            "rekapList" => $rekapList // Data diteruskan langsung ke view
        ]);
    }

    public function downloadGroupedData() {
        // Ambil data yang dikelompokkan
        $groupedData = $this->userService->getGroupedData();
    
        if (empty($groupedData)) {
            http_response_code(404);
            echo "Tidak ada data untuk diunduh.";
            exit;
        }
    
        // Load PhpSpreadsheet
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'No KK');
        $sheet->setCellValue('C1', 'Jumlah Anggota Keluarga');
        $sheet->setCellValue('D1', 'Jumlah Rumah');
        $sheet->setCellValue('E1', 'Langit-Langit');
        $sheet->setCellValue('F1', 'Dinding');
        $sheet->setCellValue('G1', 'Lantai');
        $sheet->setCellValue('H1', 'Tanggal Waktu');
        $sheet->setCellValue('I1', 'Nama Laporan');
    
        // Isi data ke dalam Excel
        $rowIndex = 2; // Baris dimulai dari kedua
        foreach ($groupedData as $namaLaporan => $rows) {
            foreach ($rows as $row) {
                $sheet->setCellValue("A{$rowIndex}", $row['no']);
                $sheet->setCellValue("B{$rowIndex}", $row['no_kk']);
                $sheet->setCellValue("C{$rowIndex}", $row['Jumlah_anggota_keluarga']);
                $sheet->setCellValue("D{$rowIndex}", $row['Jumlah_rumah']);
                $sheet->setCellValue("E{$rowIndex}", $row['langit_langit']);
                $sheet->setCellValue("F{$rowIndex}", $row['Dinding']);
                $sheet->setCellValue("G{$rowIndex}", $row['Lantai']);
                $sheet->setCellValue("H{$rowIndex}", $row['tanggal_waktu']);
                $sheet->setCellValue("I{$rowIndex}", $namaLaporan);
                $rowIndex++;
            }
            $rowIndex++; // Tambahkan jarak antar kelompok
        }
    
        // Nama file untuk diunduh
        $fileName = "Grouped_Data_Laporan.xlsx";
    
        // Header untuk unduhan
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        header('Cache-Control: max-age=0');
    
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function akumulasi() {
        $user = $this->sessionService->current();
    
        // Ambil data rekap laporan dari service
        $rekapList = $this->userService->getAkumulasiLaporan(); // Array dari objek Rekap
    
        // Render view dengan data
        View::render('Akumulasi-laporan/index', [
            "title" => "Rekap Laporan",
            "user" => [
                "id" => $user->id,
                "name" => $user->name
            ],
            "rekapList" => $rekapList // Data diteruskan langsung ke view
        ]);
    }
    
    
    
    

}
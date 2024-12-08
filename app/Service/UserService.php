<?php

namespace Proyek1\Service;

use Exception;
use Proyek1\Config\Database;
use Proyek1\Domain\User;
use Proyek1\Exception\ValidationException;
use Proyek1\Model\UserLoginRequest;
use Proyek1\Model\UserLoginResponse;
use Proyek1\Model\UserRegisterRequest;
use Proyek1\Model\UserRegisterResponse;
use Proyek1\Repository\UserRepository;
class UserService {

    private UserRepository $userRepository;
    
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
            $response->user = $user;
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
}
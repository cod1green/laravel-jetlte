<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function searchUser($idTenant, $filter)
    {
        return $this->userRepository->searchUser($idTenant, $filter);
    }
}

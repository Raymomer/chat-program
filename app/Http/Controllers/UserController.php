<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;


class UserController extends Controller
{

    protected $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function Login()
    {
        $result = $this->userService->LoginWithUser();
        echo $result;
        return "Login with account";
    }
    public function LoginWithToken()
    {
        return "Login with token";
    }

    public function Logout()
    {
        return "Logout";
    }

    public function Create()
    {
        return "Create";
    }

    public function Profile()
    {
        return "Profile";
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;

use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function Login(Request $request)
    {

        $request->validate([
            'account' => 'required',
            'password' => 'required',
        ]);

        $result = $this->userService->loginWithAccount($request);

        return response($result);
    }
    public function LoginWithToken()
    {
        return "Login with token";
    }

    public function Logout(Request $request)
    {

        $request->validate([
            'token' => 'required'
        ]);

        $result = $this->userService->logout($request);

        return response($result);
    }

    public function Register(Request $request)
    {
        $result = $this->userService->register($request);

        return  $result;
    }
    public function Profile(Request $request)
    {

        $result = $this->userService->profile($request);
        return  $result;
    }
}

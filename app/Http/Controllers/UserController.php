<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
            'account' => 'required',
            'password' => 'required',
            'name' => 'required'
        ]);

        $result = $this->userService->register($request);

        return  $result;
    }
    public function Profile(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);


        $result = $this->userService->profile($request);
        return  $result;
    }

    public function authenticate(Request $request)
    {

        if (Auth::check()) {
            $userId = Auth::user();
            $response = "UserId => " . $userId . " Login Success";
            return $response;
        }

        return "Auth Check failed";
    }
}

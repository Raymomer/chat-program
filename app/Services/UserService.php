<?php

namespace App\Services;

use App\Models\Users;
use App\Models\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserService
{


    public function loginWithAccount(Request $request)
    {

        $find = $this->findAccountExist($request->input('account'), $request->input('password'));

        if (count($find)) {

            $userId =  $find[0]['id'];
            $token = Str::random(10);


            $result = $this->updateUserVerification($userId, $token);
            if ($result) {
                return ['token' => $token];
            }
        }


        return false;
    }

    public function register(Request $request)
    {


        // request data 
        $name = $request->input('name');
        $account = $request->input('account');
        $password = $request->input('password');


        $find = $this->findAccountExist($account,  $password);

        if (!count($find)) {


            $user = new Users();

            $user->name = $name;
            $user->account = $account;
            $user->password = $password;

            $user->save();


            $token = Str::random(10);
            $data = [
                'user_id' => $user->id,
                'code' => $token
            ];
            UserVerification::query()->insert($data);

            return true;
        }

        return "False";
    }

    public function logout(Request $request)
    {


        $verify = $this->findTokenExist($request->input('token'));

        if (count($verify)) {


            $this->updateUserVerification($verify[0]['user_id'], '');

            return true;
        };

        return "Logout False";
    }

    public function profile(Request $request)
    {

        $find = $this->findTokenExist($request->input('token'));
        if (count($find)) {

            $userId = $find[0]['user_id'];

            $conduction = [
                ['id', '=', $userId]
            ];

            $user = Users::query()->where($conduction)->get();

            return $user;
        }

        return false;
    }

    public function findAccountExist($account, $password)
    {

        $conduction = [
            ['account', '=', $account],
            ['password', '=', $password]
        ];


        $user = Users::query()->where($conduction)->get();
        return $user;
    }

    public function findTokenExist($token)
    {

        $conduction = [
            [
                'code', '=', $token
            ]
        ];

        $result = UserVerification::query()->where($conduction)->get();
        return $result;
    }

    public function updateUserVerification($userId, $token)
    {
        $conduction = [[
            'user_id', '=', $userId
        ]];

        UserVerification::query()->where($conduction)->update(['code' => $token]);

        return true;
    }
}

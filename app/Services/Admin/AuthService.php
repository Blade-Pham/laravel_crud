<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 18/05/2024
 * Time: 09:43
 */

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($data)
    {
        return Auth::guard('admin')->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ], !empty($data['remember'])); // return true or false
    }
}

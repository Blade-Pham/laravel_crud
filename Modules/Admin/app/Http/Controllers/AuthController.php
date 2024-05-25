<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Admin\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Modules\Admin\Http\Requests\SignInRequest;

class AuthController extends Controller
{

    private $authService; // chua ro bien nay thuoc kieu nao

    public function __construct(AuthService  $authService)
    {
        $this->authService = $authService;
    }

    public function login(){
        try {
            if (auth()->guard('admin')->check()) {
                return redirect()->route('admin.dashboard');
            }
            return view("admin::pages.auth.login");
        } catch (\Exception $e){
            dd($e);
//            abort(404);
        }
    }

    public function loginPost(SignInRequest $request)
    {
        try{
            if($this->authService->login($request->all())){
                return redirect()->route('admin.dashboard');
            } else {
                $errors = new MessageBag([
                    'login_failed' => 'Please check email or password',
                ]);
                return redirect()->back()->withErrors($errors)->withInput();
            }
        } catch (\Exception $e){
            dd($e);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function forgetPassword(){
        try {

            return view("admin::pages.auth.forget_password");
        } catch (\Exception $e){
            dd($e);
//            abort(404);
        }
    }
}

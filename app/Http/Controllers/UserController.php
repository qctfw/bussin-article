<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserLoginRequest;
use App\Services\Contracts\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    private $user_service;

    public function __construct(UserServiceInterface $user_service)
    {
        $this->user_service = $user_service;
    }

    public function profile()
    {
        $user = auth()->user();

        return view('user.profile', [
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    public function login(UserLoginRequest $request)
    {
        $user = $this->user_service->signin($request->email, $request->password);

        if (!is_null($user)) {
            Auth::login($user);
            return redirect(route('auth.profile'));
        }

        return redirect(route('auth.login-form'))->with('failed', true);
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function changePassword(UserChangePasswordRequest $request)
    {
        $user = $this->user_service->changePassword(auth()->user()->id, $request->old_password, $request->new_password);

        if (!is_null($user)) {
            return redirect(route('auth.profile'));
        }
    
        return redirect(route('auth.change-password'))->with('failed', true);
    }

    public function changePasswordForm()
    {
        return view('user.change-password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}

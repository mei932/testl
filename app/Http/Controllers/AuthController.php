<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Login;




class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    // function loginPost(Request $request)
    // {
    //     // Validate đầu vào
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended(route("home"));
    //     }
    //     if (Auth::attempt($credentials)) {

    //         Login::create([
    //             'user_id' => Auth::id()
    //         ]);

    //         return redirect()->intended(route("home"));
    //     }


    //     return redirect(route("login.post"))->with("error", "login fail");
    // }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // ✅ Ghi log đăng nhập
            Login::create([
                'user_id' => Auth::id()
            ]);

            return redirect()->intended(route("home")); // gọi tới DashboardController@index
        }

        return redirect()->route("login")->with("error", "Login failed");
    }


    function register()
    {
        return view("auth.register");
    }

    public function registerPost(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);



        // Đăng nhập luôn nếu muốn
        // auth()->attempt($request->only('email', 'password'));

        if ($user->save()) {
            return redirect(route("login"))->with("success", "User created successfully");
        }

        return  redirect(route("register"))->with("erro", "fail");
    }
}

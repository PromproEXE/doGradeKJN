<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function authenticate(Request $request)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'username' => 'required',
        //         'password' => 'required|min:8'
        //     ]
        // );

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'forbidden',
        //         'message' => $validator->getMessageBag(),
        //     ]);
        // }

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'status' => 200,
                'redirect' => route('dashboard'),
            ]);
        }

        return response()->json([
            'status' => 'forbidden',
            'message' => "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง โปรดลองอีกครั้ง"
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

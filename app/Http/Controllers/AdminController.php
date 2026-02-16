<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

class AdminController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // End Method


    public function Adminlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $verificationCode = random_int(100000, 999999);
            session(['verification_code' => $verificationCode, 'user_id' => $user->id]);

            Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));

            Auth::logout();

            return Redirect()->route('custom.verification.form')->with('status', 'Verification code send your mail');
        }

        return redirect()->back()->withError(['email' => 'Invalid Credentials Provided']);
    }
    // End Method

    public function ShowVerification()
    {
        return view('auth.verify');
    }
    // End Method


    public function VerificationVerify(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        // Cek apakah kode cocok
        if ($request->code == session('verification_code')) {

            // Login-kan user menggunakan ID yang disimpan di session
            Auth::loginUsingId(session('user_id'));

            // Gunakan array [] untuk menghapus banyak key session
            session()->forget(['verification_code', 'user_id']);

            // Arahkan ke dashboard
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['code' => 'Invalid Verification Code']);
    }
}

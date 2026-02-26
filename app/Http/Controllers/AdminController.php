<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Hash;


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
    // End Method


    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile', compact('profileData'));
    }
    // End Method


    public function ProfileStore(Request $request)
    {
        // Mengambil ID user yang sedang login
        $id = Auth::user()->id;
        $data = User::find($id);

        // Update data teks (kiri: kolom di database, kanan: input dari form)
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        // Menyimpan nama file foto lama sebagai referensi
        $oldPhotoPath = $data->photo;

        // KOREKSI 1: Typo 'hashFile' menjadi 'hasFile'
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'), $fileName);

            // Update nama foto di database
            $data->photo = $fileName;


            // KOREKSI 2: Cara menghapus foto lama secara langsung
            if ($oldPhotoPath && $oldPhotoPath !== $fileName) {
                $this->deleteOldImage($oldPhotoPath);
            }
        }

        //menyimpan perubahan ke database
        $data->save();

        $notification = array(
            'message' => 'Profile Update Successfuly',
            'alert-type' => 'success'
        );


        //Mengembalikan user ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with($notification);
    }

    // End Method

    private function deleteOldImage(string $oldPhotoPath): void
    {
        $fullpath = public_path('upload/user_images/' . $oldPhotoPath);

        // Cek apakah file ada, lalu hapus
        if (file_exists($fullpath)) {
            unlink($fullpath);
        }
    }

    // End private Method


    public function PasswordUpdate(Request $request)
    {
        $user   = Auth::user();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            $notification = array(
                'message' => 'old password does not match !',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        User::whereId($user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        Auth::logout();

        $notification = array(
            'message' => 'Password Updated Successfuly',
            'alert-type' => 'success'
        );


        //Mengembalikan user ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('login')->with($notification);
    }


    // End Method
}

<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendResetPasswordEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param Request $request
     */
    public function auth(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Password atau Username salah');
        }

        $request->session()->regenerate();

        return redirect('/login')->with('success', 'Login Berhasil!');
    }

    /**
     * Logout the user.
     *
     * @param Request $request
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout Berhasil!');
    }

    /**
     * Show the forgot password form.
     *
     * @param string $token
     */
    public function forgotPassword($token)
    {
        if (!DB::table('password_reset_tokens')->where('token', $token)->first()) {
            return redirect('/login')->with('error', 'Token tidak valid!!');
        }

        return view('auth.reset', ['token' => $token]);
    }

    /**
     * Show the send email form.
     */
    public function sendEmailForm()
    {
        return view('auth.send');
    }

    /**
     * Send the email.
     *
     * @param Request $request
     */
    public function sendEmail(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email'
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->with('error', 'User tidak ditemukan!');
            }

            $token = Str::random(60);

            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->email],
                ['token' => $token, 'created_at' => Carbon::now()]
            );

            SendResetPasswordEmail::dispatch($request->email, $token);

            return redirect('/login')->with('success', 'Silahkan check pada email anda!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengirim email. Silakan coba lagi.');
        }
    }


    /**
     * Send the forgot password.
     *
     * @param Request $request
     */
    public function sendForgotPassword(Request $request)
    {
        $request->validate([
            '_token' => 'required',
            'token' => 'required',
            'password' => 'required|min:8'
        ]);

        DB::beginTransaction();

        try {
            $resetToken = DB::table('password_reset_tokens')->where('token', $request->token)->first();

            if (!$resetToken) {
                return redirect()->back()->with('error', 'Token tidak valid.');
            }

            $user = User::where('email', $resetToken->email)->first();

            if (!$user) {
                return redirect()->back()->with('error', 'Pengguna dengan alamat email tersebut tidak ditemukan.');
            }

            $user->password = Hash::make($request->password);
            $user->save();

            DB::table('password_reset_tokens')->where('token', $request->token)->delete();

            DB::commit();

            return redirect('/login')->with('success', 'Password berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses permintaan Anda. Silakan coba lagi.');
        }
    }
}

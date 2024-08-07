<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use OrderShipped;

class AuthController extends Controller
{

    public function index()
    {
        if (session()->get('id_pengguna')) return redirect('/dashboard');
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validate = $request->validate([
            'alamat_email'     => 'required',
            'kata_kunci'        => 'required',
        ]);

        $pengguna = Pengguna::where('alamat_email', $validate['alamat_email'])->first();

        if ($pengguna === null) {
            // return back()->with('error', 'Nama pengguna atau password salah!');
            $request->session()->put([
                'alamat_email'  => $validate['alamat_email'],
                'kata_kunci'    => $validate['kata_kunci']
            ]);

            return redirect('/')->with('error', 'Nama pengguna atau password salah!');
        }

        $jenis_pengguna = DB::table('jenis_pengguna')->where('id_jenis_pengguna', $pengguna['id_jenis_pengguna'])->first();

        if ($jenis_pengguna->akses_ke_web === 'tidak') {
            // return back()->with('error', 'Nama pengguna atau password salah!');
            $request->session()->put([
                'alamat_email'  => $validate['alamat_email'],
                'kata_kunci'    => $validate['kata_kunci']
            ]);

            return redirect('/')->with('error', 'Anda tidak memiliki hak untuk mengakses halaman ini!');
        }

        if (!password_verify($validate['kata_kunci'], $pengguna['kata_kunci'])) {
            // return back()->with('error', 'Nama pengguna atau password salah!');
            $request->session()->put([
                'alamat_email'  => $validate['alamat_email'],
                'kata_kunci'    => $validate['kata_kunci'],
                'role'          => $jenis_pengguna->jenis_pengguna
            ]);

            return redirect('/')->with('error', 'Nama pengguna atau password salah!');
        }

        $request->session()->put([
            'alamat_email'      => $pengguna['alamat_email'],
            'id_pengguna'       => $pengguna['id_pengguna'],
            'role'              => $jenis_pengguna->jenis_pengguna,
        ]);

        $data['terakhir_login'] = date('Y-m-d H:i:s');
        Pengguna::where('id_pengguna', $pengguna['id_pengguna'])->update($data);

        return redirect('dashboard');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'alamat_email'      => ['required', 'email:dns', 'unique:pengguna'],
            'no_handphone'      => ['required', 'unique:pengguna'],
            'kata_kunci'        => 'required',
        ]);
        $validate['kata_kunci'] = Hash::make($validate['kata_kunci']);
        $validate['waktu_daftar'] = date('Y-m-d H:i:s');
        $validate['id_jenis_pengguna'] = '00';
        Pengguna::create($validate);
        return response()->json(['status' => 'oke'], 201);
    }
    public function logout(Request $request)
    {
        $request->session()->regenerate();
        $request->session()->invalidate();
        return redirect('/');
    }

    public function lupaPassword()
    {
        return view('auth.lupapassword');
    }

    public function sendMail(Request $request)
    {
        $email = $request->get('email');
        $userEmail = Pengguna::where('alamat_email', $email)->first();
        if (!$userEmail) {
            return redirect('/')->with('error', 'Email Tidak Ditemukan');
        }

        Mail::to($email)->send(new SendEmail([
            'id_pengguna' => $userEmail['id_pengguna'],
            'alamat_email' => $userEmail['alamat_email'],
            'nama_lengkap' => $userEmail['nama_lengkap']
        ]));

        return redirect('/')->with('success', 'Sebuah email telah dikirim ke alamat email Anda.');
    }
}

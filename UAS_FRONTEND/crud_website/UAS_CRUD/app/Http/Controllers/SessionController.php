<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index()
    {
        return view('sesi/index');
    }
    function login(Request $request)
    {

        FacadesSession::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('mahasiswa')->with('success',Auth::user()->name . ' Berhasil login');
        } else {
            return redirect('sesi')->withErrors('Username atau password yang dimasukan tidak valid');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout');
    }
    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
        FacadesSession::flash('name', $request->email);
        FacadesSession::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email wajib yang valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password wajib diisi minimal 6 karakter',
        ]);

        $data = [
            'name'=>$request->name,
            'email'=> $request->email,
            'password'=> Hash::make( $request->password)
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('mahasiswa')->with('success', Auth::user()->name . ' Berhasil Register');
        } else {
            return redirect('sesi')->withErrors('Username atau password yang dimasukan tidak valid');
        }
    }
}
// Gila cuy, gua gak tau apa yang salah tapi tiba2 bener astagfirullah alhamdulillah mantab
// I swear ini 40% ngoding 50% debug 10% merhatiin

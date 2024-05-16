@extends('layout.template')
@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <div class="text-center">

            <h1>Login</h1>
            <h6>Masukan email dan password mu untuk mengakses dan memodifikasi data</h6>
        </div>
        <form action="/sesi/login" method="POST">
            {{-- <form action="/Laravel10-crudMahasiswaV.1/sesi/login" method="POST"> --}}
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <p class="fs-6 d-inline">Username atau password yang dimasukan tidak valid? Sepertinya anda belum </p>
        <a class="d-inline" href="/sesi/register">
            {{-- <a href="/Laravel10-crudMahasiswaV.1/sesi/register">mendaftar</a> --}}

    </div>
@endsection

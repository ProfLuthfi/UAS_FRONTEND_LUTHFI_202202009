<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset ('favicon.ico')}}">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@if (Auth::check())
@include('komponen/menu')
@endif
@include('komponen.pesan')
<body>
    <div class="min-h-screen flex flex-col justify-center align-center items-center ">
        <img class="w-auto p-5" src="{{asset ('apple-touch-icon.png')}}">
        <div class="text-5xl font-bold">Data Mahasiswa</div>
        <div class="font-semibold text-2xl ">
            Hallo, <span class="auto-type"></span>
            <script src="https://unpkg.com/typed.js@2.0.132/dist/typed.umd.js"></script>
            <script>
                var typed = new Typed('.auto-type', {
                    strings: [' selamat datang kawan^2000',
                        ' anda berada di halaman yang tepat!^800',
                        ' silakan tekan tombol dibawah^2000'
                    ],
                    typeSpeed: 50,
                    backSpeed: 50,
                    loop: true
                });
                //
            </script>
        </div>

        <div class="flex justify-center items-center mt-10 gap-10">
            <a href="/sesi/">
                {{-- <a href="/Laravel10-crudMahasiswaV.1/sesi/"> --}}
                <button
                    class="mx-auto w-24 px-4 py-2 font-semibold text-sm bg-green-500 text-white rounded-full shadow-sm">Login</button></a>
            <a href="/sesi/register">
                {{-- <a href="/Laravel10-crudMahasiswaV.1/sesi/register"> --}}
                <button
                    class="mx-auto w-24 px-4 py-2 font-semibold text-sm bg-blue-500 text-white rounded-full shadow-sm">Register</button></a>
        </div>
    </div>
</body>

</html>

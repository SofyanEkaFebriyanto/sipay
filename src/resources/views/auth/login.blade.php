<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - SIPAY</title>
    <!-- Favicon Utama -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-[#B9D1EA] to-[#F8D7E8] min-h-screen flex items-center justify-center font-sans antialiased">
    
    <div class="w-full max-w-md px-6 flex flex-col items-center">
        <!-- Logo Aplikasi SIPAY -->
        <img src="{{ asset('logo.png') }}" alt="Logo SIPAY" class="w-75 h-50 object-contain mb-1">

        <!-- Judul Halaman -->
        <h1 class="text-4xl font-bold text-black mb-10 tracking-tight">LOGIN SIPAY</h1>

        <!-- Bagian Pesan Kesalahan Validasi -->
        @if ($errors->any())
            <div class="mb-4 text-red-600 bg-red-100 p-3 rounded-xl w-full text-center font-medium border border-red-300">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Form Login Utama -->
        <form action="{{ route('login') }}" method="POST" class="w-full flex flex-col items-center space-y-6">
            @csrf
            
            <!-- Input Username atau NISN -->
            <div class="w-full">
                <label for="username" class="block text-base font-medium text-black mb-2 pl-2">Username (USERNAME/NISN)</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
                    class="w-full bg-[#E0E7ED] border border-black rounded-full px-6 py-4 outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all placeholder-gray-500"
                    placeholder="Masukkan Username atau NISN Anda">
            </div>

            <!-- Input Password -->
            <div class="w-full">
                <label for="password" class="block text-base font-medium text-black mb-2 pl-2">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full bg-[#E0E7ED] border border-black rounded-full px-6 py-4 outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all placeholder-gray-500"
                    placeholder="Masukkan password Anda">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" 
                class="mt-4 bg-white text-black font-bold border border-black rounded-2xl px-12 py-3 hover:bg-gray-100 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                LOGIN
            </button>
        </form>


    </div>

</body>
</html>

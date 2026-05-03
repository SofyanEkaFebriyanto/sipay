<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - SPP Project</title>
</head>
<body>

    <div>
        <!-- Title -->
        <h1>Sign In</h1>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Username -->
            <div>
                <label for="username">Username (Email / NISN)</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus placeholder="Masukkan Username atau NISN Anda">
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Masukkan Password Anda">
            </div>

            <!-- Button -->
            <button type="submit">
                Sign In 
            </button>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .login-box {
            width: 100%;
            max-width: 360px;
            background: #fff;
            padding: 32px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .login-box h2 {
            margin: 0 0 24px;
            text-align: center;
        }

        .login-box label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
        }

        .login-box button:hover { background: #1d4ed8; }

        .error {
            margin-bottom: 16px;
            padding: 10px;
            border-radius: 6px;
            background: #fee2e2;
            color: #b91c1c;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login Perpustakaan Digital</h2>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>
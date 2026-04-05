<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login — {{ config('app.name') }}</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    body {
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-container {
      background: #fff;
      padding: 40px 35px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      color: #333;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      transition: all 0.2s ease;
    }
    input:focus {
      border-color: #2575fc;
      outline: none;
      box-shadow: 0 0 0 2px rgba(37,117,252,0.2);
    }
    .remember {
      display: flex;
      align-items: center;
      font-size: 14px;
      color: #555;
    }
    .remember input {
      margin-right: 6px;
    }
    .btn {
      background: #2575fc;
      color: #fff;
      padding: 10px;
      border: none;
      width: 100%;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      transition: background 0.3s;
    }
    .btn:hover {
      background: #1e63d3;
    }
    .link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }
    .link a {
      color: #2575fc;
      text-decoration: none;
      font-weight: 600;
    }
    .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
        @error('email')
          <small style="color:red;">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required />
        @error('password')
          <small style="color:red;">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group remember">
        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Ingat saya</label>
      </div>

      <button type="submit" class="btn">Masuk</button>

      <div class="link">
        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
      </div>
    </form>
  </div>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
    
    body {
        font-family: Arial, sans-serif;
        background: url('{{ asset('images/6.webp') }}') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

   
    .login-container {
        background: #00c6c8; 
        padding: 3rem; 
        border-radius: 35px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 400px; 
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    
    .logo {
        width: 250px;  
        margin-bottom: 20px;
    }

    
    .input-field {
        width: 100%;
        padding: 14px; 
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    
    .input-field:focus {
        border-color: #3d9be9;
    }

   
    .login-btn {
        width: 100%;
        padding: 14px; 
        background: linear-gradient(135deg, #3d9be9, #2a80c6); 
        border: none;
        color: white;
        font-size: 18px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .login-btn:hover {
        background: linear-gradient(135deg, #2a80c6, #1e5e94); 
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        transform: translateY(-2px); 
    }

    .login-btn:active {
        transform: translateY(2px); 
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }

    
    .login-links {
        margin-top: 15px;
        font-size: 14px;
    }

    .login-links a {
        color: white;
        text-decoration: none;
    }

    .login-links a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('images/logo4.png') }}" alt="Logo" class="logo">
        </div>
        <h2>Iniciar Sesión</h2>
        <form action="{{ route('control.login') }}" method="POST">
            @csrf
            <input type="text" class="input-field" name="email" placeholder="Correo Electrónico" required>
            <input type="password" class="input-field" name="password" placeholder="Contraseña" required>
            <button type="submit" class="login-btn">Ingresar</button>
        </form>
        <div class="login-links">
            ¿No tienes cuenta? <a href="{{ route('control.registro.form') }}">Regístrate</a>
        </div>
    </div>

</body>
</html>

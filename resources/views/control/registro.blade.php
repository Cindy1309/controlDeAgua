<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
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
            position: relative; 
        }

       
        .register-container {
            background: #00c6c8;
            padding: 3rem; 
            border-radius: 35px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1); 
            text-align: center;
            width: 450px; 
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px; 
            max-width: 100%; 
        }

        
        .register-container h2 {
            margin-bottom: 1rem;
            color: #333;
            font-size: 30px;
        }

        
        .input-field {
            width: 100%;
            padding: 12px;
            margin: 15px 0; 
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        
        .register-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #3d9be9, #2a80c6); 
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); 
        }

       
        .register-btn:hover {
            background: linear-gradient(135deg, #2a80c6, #1e5e94); 
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); 
            transform: translateY(-2px); 
        }

        
        .register-btn:active {
            transform: translateY(2px); 
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.15); 
        }

        
        .login-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link {
            color: black;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        
        .header img {
            position: absolute;
            top: 20px; 
            left: 20px; 
            height: 100px; 
            width: auto;
        }

    </style>
</head>
<body>

   
    <div class="header">
        <img src="images/logo4.png" alt="Logo OCNAgua">
    </div>

    <div class="register-container">
        <h2>Crear Cuenta</h2>

       
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <form action="{{ route('control.registro') }}" method="POST">
            @csrf 
            <input type="text" class="input-field" name="name" placeholder="Nombre Completo" value="{{ old('name') }}" required>
            <input type="email" class="input-field" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
            <input type="password" class="input-field" name="password" placeholder="Contraseña" required>
            <input type="password" class="input-field" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            <button type="submit" class="register-btn">Registrar</button>
        </form>

        <a href="{{ route('control.login.form') }}" class="login-link">¿Ya tienes cuenta? Inicia sesión</a>
    </div>

</body>
</html>

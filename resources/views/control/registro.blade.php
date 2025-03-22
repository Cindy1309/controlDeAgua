<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background: url('{{ asset('images/6.webp') }}') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative; /* Necesario para el posicionamiento del logo */
        }

        /* Contenedor del registro */
        .register-container {
            background: #00c6c8;
            padding: 3rem; /* Aumentamos el padding para hacerlo más espacioso */
            border-radius: 35px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1); /* Sombra más suave */
            text-align: center;
            width: 450px; /* Aumentamos el ancho */
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px; /* Margen alrededor del contenedor */
            max-width: 100%; /* Para evitar que el contenedor se salga de la pantalla en pantallas pequeñas */
        }

        /* Título */
        .register-container h2 {
            margin-bottom: 1rem;
            color: #333;
            font-size: 30px;
        }

        /* Campos de entrada */
        .input-field {
            width: 100%;
            padding: 12px;
            margin: 15px 0; /* Ajuste del margen entre los campos */
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        /* Botón */
        .register-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #3d9be9, #2a80c6); /* Degradado atractivo */
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); /* Sombra suave */
        }

        /* Efecto hover */
        .register-btn:hover {
            background: linear-gradient(135deg, #2a80c6, #1e5e94); /* Cambia de color con el hover */
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Sombra más suave */
            transform: translateY(-2px); /* Desplazamiento hacia arriba para dar un efecto 3D */
        }

        /* Efecto cuando el botón es presionado */
        .register-btn:active {
            transform: translateY(2px); /* Desplazamiento hacia abajo al presionar */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.15); /* Sombra más suave cuando se presiona */
        }

        /* Enlaces */
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

        /* Estilo para los mensajes de error */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Logo en la esquina superior izquierda */
        .header img {
            position: absolute;
            top: 20px; /* Distancia desde la parte superior */
            left: 20px; /* Distancia desde la izquierda */
            height: 100px; /* Tamaño del logo */
            width: auto;
        }

    </style>
</head>
<body>

    <!-- Logo en la esquina superior izquierda -->
    <div class="header">
        <img src="images/logo4.png" alt="Logo OCNAgua">
    </div>

    <div class="register-container">
        <h2>Crear Cuenta</h2>

        <!-- Mostrar mensajes de error si los hay -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de registro -->
        <form action="{{ route('control.registro') }}" method="POST">
            @csrf <!-- Token CSRF para seguridad -->
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

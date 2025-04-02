<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - OCNAgua</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background: url('{{ asset('images/6.webp') }}') no-repeat center center fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
        }

        
        .container {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }

        
        .logo {
            width: 250px;
            margin-bottom: 20px;
        }

        
        h1 {
            font-size: 2.5em;
            color: #004d99;
            margin-bottom: 20px;
        }

        
        p {
            font-size: 1.2em;
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }

       
        button {
            background-color: #004d99;
            color: white;
            font-size: 1.1em;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

      
        button:hover {
            background-color: #003366;
        }

       
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

       
        .top-right-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .top-right-button button {
            padding: 10px 20px;
            background-color: #007bff; 
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .top-right-button button:hover {
            background-color: #0056b3; 
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
    
    <div class="top-right-button">
       ¿Ya tienes una cuenta? <button onclick="window.location.href='{{ route('control.login') }}'">Inicia Sesión</button>
    </div>

   
    <div class="container">
        <img src="images/logo4.png" alt="Logo OCNAgua" class="logo">
        <h1>Bienvenido a OCNAgua</h1>
        <p>Gestión inteligente del agua para un futuro sostenible. Registra tu casa y ten un suministro sin problema.</p>
        <p>¿No tienes una cuenta?</p>
        <button onclick="window.location.href='{{ route('control.registro') }}'">Registrate</button>
    </div>
</body>
</html>

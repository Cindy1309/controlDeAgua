<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Contenedor del formulario */
        .edit-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 320px;
        }

        /* Título */
        .edit-container h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        /* Campos de entrada */
        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        /* Botones */
        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-save {
            background: #4facfe;
        }

        .btn-save:hover {
            background: #008cff;
        }

        .btn-cancel {
            background: #e53e3e;
            margin-top: 10px;
            text-decoration: none; /* Elimina el subrayado */
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        .btn-cancel:hover {
            background: #c53030;
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

    <div class="edit-container">
        <h2>Editar Usuario</h2>

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

        <!-- Formulario de edición -->
        <form action="{{ route('usuarios.updateAdmin', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" class="input-field" name="name" placeholder="Nombre Completo" value="{{ old('name', $usuario->name) }}" required>
            <input type="email" class="input-field" name="email" placeholder="Correo Electrónico" value="{{ old('email', $usuario->email) }}" required>

            <button type="submit" class="btn btn-save">Guardar Cambios</button>
        </form>
<h1></h1>
        <a href="{{ route('adminUsuario') }}" class="btn btn-cancel">Cancelar</a>
    </div>

</body>
</html>

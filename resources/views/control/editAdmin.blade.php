<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
    
    body {
        font-family: Arial, sans-serif;
        background: url('{{ asset('images/6.webp') }}') no-repeat center center fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    
    .edit-container {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 320px;
        max-width: 500px;
    }

 
    .edit-container h2 {
        margin-bottom: 1.5rem;
        color: #333;
    }

   
    .input-field {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }

    
    .btn {
        padding: 10px;
        border: none;
        color: white;
        font-size: 18px;
        border-radius: 25px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-save {
        background: #4facfe;
        width: 100%; 
    }

    .btn-save:hover {
        background: #008cff;
    }

    .btn-cancel {
        background: #e53e3e;
        margin-top: 10px;
        text-decoration: none;
        display: inline-block;
        width: 80%; 
        text-align: center;
        font-size: 16px; 
        padding: 8px; 
    }

    .btn-cancel:hover {
        background: #c53030;
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

    <div class="edit-container">
        <h2>Editar Usuario</h2>

        
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <form action="{{ route('usuarios.updateAdmin', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

           
            <input type="text" class="input-field" name="name" placeholder="Nombre Completo" value="{{ old('name', $usuario->name) }}" required>
            <input type="email" class="input-field" name="email" placeholder="Correo Electrónico" value="{{ old('email', $usuario->email) }}" required>

            
            <input type="password" class="input-field" name="password" placeholder="Contraseña (Dejar vacío si no quieres cambiarla)">

           
            <h3>Casas Registradas</h3>
            @foreach ($usuario->casas as $index => $casa)
                <div class="casa-container">
                    <h4>Casa {{ $index + 1 }}</h4>
                    <input type="text" name="casas[{{ $index }}][calle]" class="input-field" placeholder="Calle" value="{{ old('casas.' . $index . '.calle', $casa['calle']) }}" required>
                    <input type="text" name="casas[{{ $index }}][numero_casa]" class="input-field" placeholder="Número Casa" value="{{ old('casas.' . $index . '.numero_casa', $casa['numero_casa']) }}" required>
                    <input type="text" name="casas[{{ $index }}][tipo_almacenamiento]" class="input-field" placeholder="Tipo de Almacenamiento" value="{{ old('casas.' . $index . '.tipo_almacenamiento', $casa['tipo_almacenamiento']) }}" required>
                    <input type="number" name="casas[{{ $index }}][litros_asignados]" class="input-field" placeholder="Litros Asignados" value="{{ old('casas.' . $index . '.litros_asignados', $casa['litros_asignados']) }}" required>
                    <hr>
                </div>
            @endforeach

            <button type="submit" class="btn btn-save">Guardar Cambios</button>
        </form>

        <a href="{{ route('adminUsuario') }}" class="btn btn-cancel">Cancelar</a>
    </div>

</body>
</html>

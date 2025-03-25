<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('{{ asset('images/6.webp') }}') no-repeat center center fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            position: relative;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 900px;
            text-align: center;
            overflow-y: auto;
            max-height: 80vh;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: black;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: linear-gradient(135deg, #ffbb33, #ff8800);
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #e6a00f, #cc7700);
            transform: scale(1.05);
        }

        .btn-delete {
            background: linear-gradient(135deg, #e53e3e, #c53030);
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #c53030, #a61d1d);
            transform: scale(1.05);
        }
         /* Estilos del botón de Cerrar Sesión */
         .btn-logout {
            background: #e53e3e; /* Rojo */
            border-radius: 50px; /* Redondear el botón */
            padding: 10px 20px;
            position: absolute;
            top: 20px; /* Ajustar la distancia desde el borde superior */
            right: 20px; /* Ajustar la distancia desde el borde derecho */
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background: #c53030; /* Rojo más oscuro en el hover */
        }
     /* Estilo para el botón redondeado y azul */
.btn-redirect {
    padding: 12px 25px; /* Ajustar el tamaño del botón */
    background-color: #007BFF; /* Azul más atractivo */
    color: white;
    border-radius: 25px; /* Redondeo del botón */
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.2s;
    border: none;
    cursor: pointer;
    font-size: 16px; /* Aumentar el tamaño de la fuente */
}

.btn-redirect:hover {
    background-color: #0056b3; /* Azul más oscuro en hover */
    transform: scale(1.05); /* Aumenta el tamaño un poco al pasar el cursor */
}
    </style>
</head>
<body>
    <!-- Vista donde quieres agregar el botón, por ejemplo adminUsuarios.blade.php -->
<form action="{{ route('suministros.datos') }}" method="GET" style="position: absolute; top: 20px; left: 20px;">
    <button type="submit" class="btn btn-redirect">Suministro</button>
</form>
       <!-- Botón de Cerrar Sesión en la esquina superior derecha -->
    <form action="{{ route('control.logout') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit" class="btn btn-logout">Cerrar Sesión</button>
    </form>
<div class="container">
    <h1>Administrar Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
                <th>Casas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $usuario['nombre'] }}</td>
                <td>{{ $usuario['email'] }}</td>
                <td>{{ \Carbon\Carbon::parse($usuario['creado_en'])->format('d/m/Y H:i:s') }}</td>
                <td>
                    @if(empty($usuario['casas']))
                        <p>No tiene casas registradas.</p>
                    @else
                        @foreach ($usuario['casas'] as $casa)
                            <p><strong>Calle:</strong> {{ $casa['calle'] }}</p>
                            <p><strong>Número:</strong> {{ $casa['numero_casa'] }}</p>
                            <p><strong>Almacenamiento:</strong> {{ $casa['tipo_almacenamiento'] }}</p>
                            <p><strong>Litros asignados:</strong> {{ $casa['litros_asignados'] }}</p>
                            <hr>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a href="{{ route('usuarios.editAdmin', $usuario['id']) }}" class="btn btn-edit">Editar</a>
                    <form action="{{ route('usuarios.destroyAdmin', $usuario['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

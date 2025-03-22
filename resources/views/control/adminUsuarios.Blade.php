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
            max-width: 800px;
            text-align: center;
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
            box-shadow: 0 4px 6px rgba(255, 136, 0, 0.3);
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #e6a00f, #cc7700);
            transform: scale(1.05);
        }

        .btn-delete {
            background: linear-gradient(135deg, #e53e3e, #c53030);
            box-shadow: 0 4px 6px rgba(229, 62, 62, 0.3);
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #c53030, #a61d1d);
            transform: scale(1.05);
        }

        .logout-btn, .btn-users {
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .logout-btn {
            background: linear-gradient(135deg, #ff3e3e, #d32f2f);
            color: white;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #d32f2f, #b71c1c);
            transform: scale(1.05);
        }

        .btn-users {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    color: black;
    margin-top: 20px;
    text-decoration: none; /* Asegúrate de que esta propiedad esté aquí */
}

.btn-users:hover {
    background: linear-gradient(135deg, #3a89d9, #0094c6);
    transform: scale(1.05);
}
    </style>
</head>
<body>
    <form action="{{ route('control.logout') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit" class="logout-btn">Cerrar Sesión</button>
    </form>

    <div class="container">
        <h1>Administrar Usuarios</h1>
        <a href="{{ route('control.admin') }}" class="btn-users">Administrar Casas</a>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at }}</td>
                    <td>
                        <a href="{{ route('usuarios.editAdmin', $usuario->id) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('usuarios.destroyAdmin', $usuario->id) }}" method="POST" style="display:inline;">
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

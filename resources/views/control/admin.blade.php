<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Casas</title>
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
        background:  #007bff;
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

    .logout-btn, .btn-users, .admin-btn {
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
        color: black;
        position: absolute;
        top: 20px;
        right: 20px;
        border: none; /* Eliminar el borde */
    }

    .logout-btn:hover {
        background: linear-gradient(135deg, #d32f2f, #b71c1c);
        transform: scale(1.05);
    }

    .btn-users {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        color: black;
        margin-top: 20px;
    }

    .btn-users:hover {
        background:  #007bff;
        transform: scale(1.05);
    }

    /* Estilo del botón Admin (azul sólido, sin degradado ni subrayado) */
    .admin-btn {
        background-color: #007bff; /* Azul sólido */
        color: black;
        position: absolute;
        top: 20px;
        left: 20px;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .admin-btn:hover {
        background-color: #0056b3; /* Azul más oscuro al pasar el mouse */
        transform: scale(1.05);
    }
</style>
</head>
<body>

    <!-- Botón para ir a la vista de botonAdmin -->
    <a href="{{ route('botonAdmin') }}" class="admin-btn">Suministro</a>

    <form action="{{ route('control.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Cerrar Sesión</button>
    </form>

    <div class="container">
        <h1>Administrar Casas</h1>
        <a href="{{ route('adminUsuario') }}" class="btn btn-users">Administrar Usuarios</a>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Número de Casa</th>
                    <th>Calle</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($casas as $casa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $casa->numero_casa }}</td>
                    <td>{{ $casa->calle }}</td>
                    <td>{{ $casa->propietario }}</td>
                    <td>
                        <a href="{{ route('casas.editAdmin', $casa->_id) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('casas.destroyAdmin', $casa->_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de eliminar esta casa?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

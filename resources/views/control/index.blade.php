<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCNAgua</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #0099cc, #4ac6e3);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Barra superior */
        .header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .header .title {
            font-size: 40px;
            color: black;
            font-weight: bold;
        }

       /* Estilo para el botón de registro de casa */
.header .register-link {
    font-size: 20px;
    color: black;
    text-decoration: none;
    padding: 12px 24px;
    background-color: #4ac6e3; /* Azul cielo */
    border-radius: 25px;
    text-align: center;
    box-shadow: 0px 4px 6px rgba(74, 198, 227, 0.3);
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
}

.header .register-link:hover {
    background-color: #34b2d6; /* Azul más oscuro */
    box-shadow: 0px 6px 12px rgba(74, 198, 227, 0.5);
    transform: translateY(-3px); /* Efecto de elevación */
}

/* Estilo para el botón de cerrar sesión */
.logout-link {
    font-size: 16px;
    color: white;
    background-color: #e53e3e; /* Rojo */
    padding: 12px 24px;
    border-radius: 25px;
    text-align: center;
    text-decoration: none;
    box-shadow: 0px 4px 6px rgba(229, 62, 62, 0.3);
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
}

.logout-link:hover {
    background-color: #c53030; /* Rojo más oscuro */
    box-shadow: 0px 6px 12px rgba(229, 62, 62, 0.5);
    transform: translateY(-3px); /* Efecto de elevación */
}

        /* Contenido principal */
        .content {
            padding: 20px;
            text-align: center;
            color: white;
            flex-grow: 1;
        }

        .content h2 {
            font-size: 28px;
        }

        .message-box {
            background-color: #40e0d0;
            color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Estilo para las casas registradas */
        .house-list {
            list-style: none;
            padding: 0;
        }

        .house-list li {
            background-color: white;
            color: #333;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px px px rgba(0, 0, 0, 0.1);
        }

        .house-list li h3 {
            margin: 0;
            font-size: 25px;
        }

        .house-list li p {
            margin: 10px 0;
        }

        /* Botones de editar y eliminar */
.btn-edit, .btn-delete {
    display: inline-block;
    padding: 12px 24px; /* Aumentar el tamaño para un aspecto más elegante */
    margin-top: 5px;
    border-radius: 25px; /* Bordes más redondeados */
    font-size: 16px; /* Aumentar el tamaño de la fuente */
    font-weight: bold; /* Aumentar el grosor de la fuente */
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

/* Estilo para el botón de editar */
.btn-edit {
    background-color: #f0ad4e;
    color: white;
    border: none;
    box-shadow: 0px 4px 6px rgba(240, 173, 78, 0.3); /* Sombra suave */
}

.btn-edit:hover {
    background-color: #ec971f;
    box-shadow: 0px 6px 12px rgba(240, 173, 78, 0.5); /* Sombra más intensa al pasar el ratón */
    transform: translateY(-3px); /* Efecto de levantar el botón */
}

/* Estilo para el botón de eliminar */
.btn-delete {
    background-color: #d9534f;
    color: white;
    border: none;
    box-shadow: 0px 4px 6px rgba(217, 83, 79, 0.3); /* Sombra suave */
}

.btn-delete:hover {
    background-color: #c9302c;
    box-shadow: 0px 6px 12px rgba(217, 83, 79, 0.5); /* Sombra más intensa al pasar el ratón */
    transform: translateY(-3px); /* Efecto de levantar el botón */
}


        /* Estilos para pantallas pequeñas */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }

            .header .title {
                font-size: 20px;
            }

            .header .register-link {
                margin-top: 10px;
            }

            .content h2 {
                font-size: 24px;
            }
        }

        /* Estilos generales del login */
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
    </style>
</head>
<body>

    <!-- Barra superior -->
    <div class="header">
    <img src="images/logo4.png" alt="Logo OCNAgua" style="height: 100px;">
    
        <a href="{{ route('registroCasa') }}" class="register-link">Registra tu casa</a>

       

        <form action="{{ route('control.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-delete">Cerrar sesión</button>
        </form>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <div class="message-box">
            <h1>Casas Registradas</h1>
            <h3>A continuación se muestran las casas registradas bajo tu nombre:</h3>

            @if($casas->isEmpty())
                <p>No has registrado ninguna casa aún.</p>
            @else
                <ul class="house-list">
                    @foreach($casas as $casa)
                        <li>
                            <h3>Casa: {{ $casa->numero_casa }}</h3>
                            <p><strong>Calle:</strong> {{ $casa->calle }}</p>
                            <p><strong>Tipo de almacenamiento:</strong> {{ $casa->tipo_almacenamiento }}</p>
                            <p><strong>Propietario:</strong> {{ $casa->propietario }}</p>

                            <!-- Botones de acción -->
                            <a href="{{ route('casas.edit', $casa->id) }}" class="btn-edit">Editar</a>

                            <form action="{{ route('casas.destroy', $casa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que quieres eliminar esta casa?')">Eliminar</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

</body>
</html>


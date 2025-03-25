<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Suministros</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background: url('images/6.webp') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        .container {
            text-align: center;
            padding: 50px;
            background: #00c6c8;
            border-radius: 12px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
            position: relative;
            width: 60%;
            max-width: 700px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }
        table td {
            color: black; /* Cambié el color del texto a negro */
        }

        /* Estilo del botón fuera del contenedor */
        .boton-regresar {
            position: absolute;
            top: 20px; /* Ajusta la posición vertical */
            left: 20px; /* Ajusta la posición horizontal */
            padding: 16px 30px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 30px;
            text-align: center;
            box-shadow: 0px 6px 10px rgba(0, 123, 255, 0.3);
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            font-size: 22px;
            cursor: pointer;
        }

        .boton-regresar:hover {
            background-color: #007bff;
            box-shadow: 0px 8px 14px rgba(0, 123, 255, 0.5);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <!-- Botón que redirige a la vista "botonAdmin" fuera del contenedor -->
    <a href="{{ route('botonAdmin') }}">
        <button class="boton-regresar">Suministro</button>
    </a>

    <div class="container">
        <h1>Datos de Suministros</h1>
        
        <!-- Tabla que muestra los suministros -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suministros as $suministro)
                    <tr>
                        <td>{{ $suministro->_id }}</td>
                        <td>{{ $suministro->estado }}</td>
                        <td>{{ $suministro->fecha_hora }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>

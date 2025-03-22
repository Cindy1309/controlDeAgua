<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Casa</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background: url('{{ asset('images/6.webp') }}') no-repeat center center fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Contenedor principal */
        .form-container {
            background-color: #00c6c8;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3); /* Sombras más grandes */
            width: 100%;
            max-width: 500px; /* Aumenté el tamaño máximo */
            text-align: center;
            box-sizing: border-box;
        }

        /* Título principal */
        .form-container h1 {
            font-size: 40px; /* Aumenté el tamaño del título */
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        /* Título del formulario */
        .form-container h2 {
            font-size: 28px; /* Aumenté el tamaño de "Editar Casa" */
            font-weight: bold;
            margin-bottom: 25px;
            color: #333;
        }

        /* Campos de entrada */
        .input-field {
            width: 100%;
            padding: 15px; /* Aumenté el padding */
            margin: 12px 0; /* Aumenté el margen */
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 18px; /* Aumenté el tamaño de la fuente */
            box-sizing: border-box;
        }

        /* Botón de acción */
        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #4facfe;
            border: none;
            color: white;
            font-size: 20px; /* Aumenté el tamaño de la fuente */
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        .submit-btn:hover {
            background-color: #008cff;
            transform: scale(1.05); /* Efecto de agrandamiento  #e53e3e*/
        }

        /* Botón de cancelar (más pequeño en longitud) */
        .cancel-btn {
            padding: 8px 16px; /* Menos padding en los lados para hacerlo más estrecho */
            background-color: #e53e3e;
            border: none;
            color: white;
            font-size: 16px; /* Reducido el tamaño de la fuente */
            border-radius: 6px; /* Ajuste de bordes */
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block; /* Cambié a inline-block para que no ocupe todo el ancho */
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .cancel-btn:hover {
            background-color: #c53030;
            transform: scale(1.05); /* Efecto de agrandamiento */
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
<div class="header">
    <img src="{{ asset('images/logo4.png') }}" alt="Logo OCNAgua">
</div>
    <div class="form-container">
        <h2>Editar Casa</h2>

        <form action="{{ route('casas.update', $casa->_id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="numero_casa">Número de Casa:</label>
            <input type="text" id="numero_casa" name="numero_casa" class="input-field" value="{{ $casa->numero_casa }}" required>

            <label for="calle">Calle:</label>
            <input type="text" id="calle" name="calle" class="input-field" value="{{ $casa->calle }}" required>

            <label for="tipo_almacenamiento">Tipo de Almacenamiento:</label>
            <select id="tipo_almacenamiento" name="tipo_almacenamiento" class="input-field" required>
                <option value="Tinaco" {{ $casa->tipo_almacenamiento == 'Tinaco' ? 'selected' : '' }}>Tinaco</option>
            </select>

            <label for="propietario">Propietario:</label>
            <input type="text" id="propietario" name="propietario" class="input-field" value="{{ $casa->propietario }}" required>

            <button type="submit" class="submit-btn">Actualizar Casa</button>
            <a href="{{ route('control.index') }}" class="cancel-btn">Cancelar</a>
        </form>
    </div>

</body>
</html>


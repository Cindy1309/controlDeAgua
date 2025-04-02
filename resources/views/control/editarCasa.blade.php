<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Casa</title>
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

       
        .form-container {
            background-color: #00c6c8;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3); 
            width: 100%;
            max-width: 500px; 
            text-align: center;
            box-sizing: border-box;
        }

        .form-container h1 {
            font-size: 40px; 
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

      
        .form-container h2 {
            font-size: 28px; 
            font-weight: bold;
            margin-bottom: 25px;
            color: #333;
        }

        
        .input-field {
            width: 100%;
            padding: 15px; 
            margin: 12px 0; 
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 18px;
            box-sizing: border-box;
        }

        
        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #4facfe;
            border: none;
            color: white;
            font-size: 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        .submit-btn:hover {
            background-color: #008cff;
            transform: scale(1.05); 
        }

       
        .cancel-btn {
            padding: 8px 16px; 
            background-color: #e53e3e;
            border: none;
            color: white;
            font-size: 16px; 
            border-radius: 6px; /
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block; 
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .cancel-btn:hover {
            background-color: #c53030;
            transform: scale(1.05); 
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


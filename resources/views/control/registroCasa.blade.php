<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Casa</title>
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

    /* Estilo para el título */
    .header .title {
        font-size: 48px; /* Tamaño grande para el título */
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: black;
    }

   /* Contenedor del formulario */
.form-container {
    background-color: #00c6c8;
    padding: 40px; /* Aumenté el padding para un mayor tamaño */
    border-radius: 10px; /* Bordes más redondeados */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Sombras más grandes para darle más profundidad */
    width: 100%;
    max-width: 500px; /* Aumenté el tamaño máximo */
    box-sizing: border-box; /* Asegura que el padding no afecte el tamaño total */
    font-size: 18px; /* Tamaño de fuente general más grande */
}

/* Estilo para el título */
.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 32px; /* Tamaño del título más grande */
}

    /* Campos de entrada */
    .input-field {
        width: 100%;
        padding: 15px;
        margin: 15px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 16px;
    }

    /* Estilo del botón de enviar */
    .submit-btn {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #008cff, #0073e6); /* Degradado atractivo */
        border: none;
        color: white;
        border-radius: 8px; /* Bordes redondeados */
        font-size: 18px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s ease-in-out;
    }

    /* Efecto al pasar el mouse (hover) */
    .submit-btn:hover {
        background: linear-gradient(135deg, #008cff, #0073e6);
        transform: translateY(-2px); /* Efecto de elevación al pasar el mouse */
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); /* Sombra al pasar el mouse */
    }

    /* Estilo para cuando se presiona el botón */
    .submit-btn:active {
        transform: translateY(2px); /* Efecto al presionar el botón */
        box-shadow: none;
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
    <!-- Logo en la esquina superior izquierda -->
    <div class="header">
        <img src="images/logo4.png" alt="Logo OCNAgua">
    </div>
 <!-- Barra superior -->
 <div class="header">
    
    <div class="form-container">
        <h2>Registrar Casa</h2>
        <!-- Formulario para registrar una casa -->
        <form action="{{ route('registroCasa.store') }}" method="POST">
            @csrf
            <!-- Campo para calle -->
            <input type="text" class="input-field" name="calle" placeholder="Calle" required>

            <!-- Campo para número de casa -->
            <input type="text" class="input-field" name="numero_casa" placeholder="Número de Casa" required>

            <!-- Campo para tipo de almacenamiento de agua -->
            <select class="input-field" name="tipo_almacenamiento" required>
                <option value="tinaco">Tinaco</option>
            </select>

            <!-- Campo para propietario -->
            <input type="text" class="input-field" name="propietario" placeholder="Propietario" required>

            <button type="submit" class="submit-btn">Registrar Casa</button>
        </form>
    </div>

</body>
</html>

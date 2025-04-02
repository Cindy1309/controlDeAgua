<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botón de Encendido/Apagado</title>
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

    .boton {
        padding: 25px 60px; 
        font-size: 32px;
        font-weight: 700; 
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        outline: none;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        display: inline-block;
        background-color: #00c6c8;
    }

    .boton.apagado {
        background-color: #ff4d4d;
        transform: scale(1);
    }

    .boton.prendido {
        background-color: #28a745;
        transform: scale(1.1);
    }

    .boton:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .boton:active {
        transform: scale(0.98);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .boton span {
        font-size: 24px; 
        font-weight: 600; 
        text-transform: uppercase;
    }

    .leyenda {
        margin-top: 30px;
        font-size: 22px; 
        font-weight: 500;
        color: black;
    }

    
    .boton-datos {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 22px; 
        background-color: #007bff; 
        color: #fff;
        padding: 16px 30px; 
        border-radius: 30px;
        text-align: center;
        box-shadow: 0px 6px 10px rgba(0, 123, 255, 0.3);
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        border: none; 
    }

    .boton-datos:hover {
        background-color: #0056b3;
        box-shadow: 0px 8px 14px rgba(0, 123, 255, 0.5);
        transform: translateY(-3px);
    }

    .boton-admin {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 22px; 
        background-color: #007bff; 
        color: #fff;
        padding: 16px 30px; 
        border-radius: 30px;
        text-align: center;
        box-shadow: 0px 6px 10px rgba(0, 123, 255, 0.3);
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        border: none; 
    }

    .boton-admin:hover {
        background-color: #0056b3;
        box-shadow: 0px 8px 14px rgba(0, 123, 255, 0.5);
        transform: translateY(-3px);
    }
</style>

</head>
<body>

    <a href="{{ route('suministros.index') }}">
        <button class="boton-datos">Ir a Datos</button>
    </a>

    <a href="{{ route('usuarios.index') }}">
        <button class="boton-admin">Casas Registradas</button>
    </a>

    <div class="container">
        <button id="boton" class="boton apagado" onclick="cambiarEstado()">
            <span>Apagado</span>
        </button>
        <div class="leyenda">
            Enciende o apaga el suministro de agua
        </div>
    </div>
    <script>
   
    window.onload = function() {
        obtenerEstado();
    };

    function obtenerEstado() {
        fetch("{{ route('api.control.bomba.estado') }}") 
        .then(response => response.json())
        .then(data => {
            var boton = document.getElementById('boton');
            var texto = boton.querySelector('span');
            if (data.estado === 'on') {
                boton.classList.remove('apagado');
                boton.classList.add('prendido');
                texto.textContent = 'Prendido';
            } else {
                boton.classList.remove('prendido');
                boton.classList.add('apagado');
                texto.textContent = 'Apagado';
            }
        })
        .catch(error => console.error("Error al obtener el estado:", error));
    }

    
    function cambiarEstado() {
        var boton = document.getElementById('boton');
        var texto = boton.querySelector('span');
        var estado = boton.classList.contains('apagado') ? 'on' : 'off';

        fetch("{{ route('api.control.bomba') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ estado: estado })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (estado === "on") {
                    boton.classList.remove('apagado');
                    boton.classList.add('prendido');
                    texto.textContent = 'Prendido';
                } else {
                    boton.classList.remove('prendido');
                    boton.classList.add('apagado');
                    texto.textContent = 'Apagado';
                }
            } else {
                alert("Error al enviar la señal.");
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>



</body>
</html>


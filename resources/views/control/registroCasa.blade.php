<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Casa</title>
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

    
    .header .title {
        font-size: 48px; 
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: black;
    }

   
.form-container {
    background-color: #00c6c8;
    padding: 40px; 
    border-radius: 10px; 
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); 
    width: 100%;
    max-width: 500px; 
    box-sizing: border-box; 
    font-size: 18px; 
}


.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 32px; 
}

    
    .input-field {
        width: 100%;
        padding: 15px;
        margin: 15px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 16px;
    }

   
    .submit-btn {
        width: 100%;
        padding: 15px;
        background: linear-gradient(135deg, #008cff, #0073e6); 
        border: none;
        color: white;
        border-radius: 8px; 
        font-size: 18px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s ease-in-out;
    }

    
    .submit-btn:hover {
        background: linear-gradient(135deg, #008cff, #0073e6);
        transform: translateY(-2px); 
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); 
    }

    
    .submit-btn:active {
        box-shadow: none;
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
        <img src="images/logo4.png" alt="Logo OCNAgua">
    </div>
 
 <div class="header">
    
    <div class="form-container">
        <h2>Registrar Casa</h2>
        
        <form action="{{ route('registroCasa.store') }}" method="POST">
            @csrf
            
            <input type="text" class="input-field" name="calle" placeholder="Calle" required>

            
            <input type="text" class="input-field" name="numero_casa" placeholder="Número de Casa" required>

           
            <select class="input-field" name="tipo_almacenamiento" required>
                <option value="tinaco">Tinaco</option>
            </select>

            
            <input type="text" class="input-field" name="propietario" placeholder="Propietario" required>

            <button type="submit" class="submit-btn">Registrar Casa</button>
        </form>
    </div>

</body>
</html>

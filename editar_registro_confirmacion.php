<?php
// Configuración de base de datos
$servername = "localhost";
$username = "luisvilla";  // Cambiar si es necesario
$password = "lkqaz923";
$dbname = "encuentroca";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del archivo a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM registro_confirmacion WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        die("Registro no encontrado.");
    }
} else {
    die("ID no especificado.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación asistencia</title>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 40px 30px;
        }
        h1 {
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 10px;
            color: #333333;
        }
        p {
            text-align: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: #555555;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label, option {
            line-height: 1.5;
            font-size: 0.9rem;
            font-weight: bold;
            color: #333333;
        }
        input[type="text"],
        input[type="file"], 
        input[type="email"],
        input[type="number"]{
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 0.9rem;
        }
        input[type="radio"] {
            margin-right: 8px;
        }
        .radio-group {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        button {
            padding: 10px;
            background-color: rgb(5,26,57);
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            margin-top: 1rem;
        }

        button:hover {
            background-color: #333333;
        }

        .note {
            font-size: 0.8rem;
            color: #555555;
            text-align: center;
        }
        img{
            margin-top: 1rem;
            margin-bottom: 1rem;
            width: 100%;
            object-fit: cover;
            height: 80px;
        }
        .inline-block{
            display: inline-block;
            width: 100%;
        }
        .mt-4{
            margin-top: .5rem;
        }
        .object-fit{
            width: full;
            height: auto;
            object-fit: cover;
        }
    </style>
    </head>
<body>
    <div class="container">
        <img src="Encabezado_Nuevo.jpg" class="object-fit" alt="encabezado">
        <h1>Formulario de registro - 2o. Encuentro de CA's</h1>
        <p>Únicamente para asistentes al evento del 2o. Encuentro de CA's a celebrarse los días 27 y 28 de marzo en el Instituto Tecnológico de Boca del Río</p>

        <form action="update__registro_confirmacion.php" id="myForm" method="POST" enctype="multipart/form-data">
            <div>
                <label>Nombre(s):*</label>
                <input type="text" name="name" id="name"  required placeholder="Ingrese el nombre(s)" value="<?php echo $row['name_']; ?>">
            </div>
            <div>
                <label>Apellido paterno:*</label>
                <input type="text" name="lastname_p" id="lastname_p" required placeholder="Ingrese el apellido paterno" value="<?php echo $row['lastname_p']; ?>">
            </div>
            <div>
                <label>Apellido materno:*</label>
                <input type="text" name="lastname_m" id="lastname_m" required placeholder="Ingrese el apellido materno" value="<?php echo $row['lastname_m']; ?>">
            </div>
            <div>
                <label>Correo institucional:*</label>
                <input type="email" name="email" id="email" required placeholder="Ingrese el correo institucional " value="<?php echo $row['email']; ?>">
            </div>
            <div>
                <label>Institución de procedencia *</label>
                <input type="text" name="institucion" id="institucion" required placeholder="ngrese el nombre de la institución de procedencia" value="<?php echo $row['institucion']; ?>">
            </div>
            <div>
                <label>Número teléfonico:*</label>
                <input type="number" name="telefono"  id="telefono" required placeholder="Ingrese el número teléfonico" value="<?php echo $row['telefono']; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div>
                <label>Nombre del cuerpo académico*</label>
                <input type="text" name="ca_nombre" id="ca_nombre" required placeholder="Ingrese el nombre del cuerpo académico" value="<?php echo $row['ca_nombre']; ?>">
            </div>
            <div>
                <label>Clave del cuerpo académico *</label>
                <input type="text" name="ca_clave" id="ca_clave" required placeholder="Ingrese la clave del cuerpo académico" value="<?php echo $row['ca_clave']; ?>">
            </div>
            <button type="submit">Enviar</button>
        </form>

    </div>
</body>

</html>
<?php
$conn->close();
?>

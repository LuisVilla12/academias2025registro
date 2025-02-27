<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";  // O la IP del servidor si no es localhost
$username = "luisvilla";     // Nombre de usuario de la base de datos
$password = "lkqaz923";   // Contraseña de la base de datos
$dbname = "encuentroca";   // Nombre de la base de datos
$port = 3306;  // Puerto personalizado (en tu caso, es el 330)

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Consulta para obtener los datos
$sql = "SELECT * FROM registro_academias";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de personal</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <h2>Lista de Archivos PDF</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Autores</th>
                <th>Institucion</th>
                <th>Nombre CA</th>
                <th>Clave CA</th>
                <th>Modalidad</th>
                <th>Consolidación</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["autores"] . "</td>
                        <td>" . $row["institucion"] . "</td>
                        <td>" . $row["ca_nombre"] . "</td>
                        <td>" . $row["ca_clave"] . "</td>
                        <td>" . $row["modalidad"] . "</td>
                        <td>" . $row["grado_consolidacion"] . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay archivos disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mi_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
</head>
<body>
    <h1>Bienvenido a mi sitio web</h1>
    <p>Contenido dinámico de la base de datos:</p>
    <?php
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar datos
        while($row = $result->fetch_assoc()) {
            echo "<p>" . $row["nombre"] . " - " . $row["email"] . "</p>";
        }
    } else {
        echo "No hay resultados";
    }
    $conn->close();
    ?>
</body>
</html>

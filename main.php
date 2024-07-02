<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uxinta"; 

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener y sanitizar los datos del formulario
$usuario = isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8') : '';
$pertenencia = isset($_POST['pertenencia']) ? htmlspecialchars($_POST['pertenencia'], ENT_QUOTES, 'UTF-8') : '';
$ticket = isset($_POST['ticket']) ? intval($_POST['ticket']) : 0;
$tecnico = isset($_POST['tecnico']) ? htmlspecialchars($_POST['tecnico'], ENT_QUOTES, 'UTF-8') : '';
$calidad_tiempo = isset($_POST['calidad-tiempo']) ? intval($_POST['calidad-tiempo']) : 0;
$calidad_atencion = isset($_POST['calidad-atencion']) ? intval($_POST['calidad-atencion']) : 0;
$comentario = isset($_POST['comentario']) ? htmlspecialchars($_POST['comentario'], ENT_QUOTES, 'UTF-8') : '';

// Preparar y ejecutar la consulta SQL
$stmt = $conn->prepare("INSERT INTO `form-ux` (usuario, pertenencia, ticket, tecnico, `calidad-tiempo`, `calidad-atencion`, comentario, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("ssissis", $usuario, $pertenencia, $ticket, $tecnico, $calidad_tiempo, $calidad_atencion, $comentario);

if ($stmt->execute() === TRUE) {
    echo "Su colaboración nos ayuda a mejorar, muchas gracias por su participación";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

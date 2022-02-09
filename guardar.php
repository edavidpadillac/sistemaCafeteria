<?php
include('db.php');

if (isset($_POST['guardar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $ref = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $cate = $_POST['categoria'];
    $stock = $_POST['stock'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO productos (id, nombre, referencia, precio, peso, categoria,stock, fecha_creacion)VALUES('$id', '$nombre', '$ref', '$precio', '$peso', '$cate', '$stock', '$fecha')";

    $resultado = mysqli_query($mysqli, $sql);

    if (!$resultado) {
        echo "error al guardar";
    } else {

        
        echo "<script>
        alert('Producto registrado exitosamente');
        window.location= 'productos.php' </script>";
          
        //header("Location: productos.php");
    }
}

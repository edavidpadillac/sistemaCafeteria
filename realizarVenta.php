<?php
include('db.php');

if (isset($_POST['vender'])) {
    $id = $_POST['id'];
    $cantidad = $_POST['canti'];
    //consulta para traer el valor del producto
    $consPrecio = "SELECT * FROM productos WHERE id=$id";
    $result = mysqli_query($mysqli, $consPrecio);

    if (mysqli_num_rows($result) == 1) {
        $campo = mysqli_fetch_array($result);
        $pre = $campo['precio'];
        $sto = $campo['stock'];

        $total = $pre * $cantidad;

        if ($cantidad > $sto) {
            echo "<script>
            alert('El producto es insuficiente');
            window.location= 'ventas.php' </script>";
        } else {

            //consulta para registrar ventas
            $sql = "INSERT INTO ventas (id_producto, cantidad, total)VALUES('$id','$cantidad', '$total')";

            $resultado = mysqli_query($mysqli, $sql);

            if (!$resultado) {
                echo "error al registrar venta";
            } else {
                $nuevoStock = $sto - $cantidad;
                $query = "UPDATE productos set stock = '$nuevoStock' WHERE id=$id";
                mysqli_query($mysqli, $query);
                echo "<script>
        alert('Venta registrada exitosamente');
        window.location= 'ventas.php' </script>";

                //header("Location: productos.php");
            }
        }
    }
}

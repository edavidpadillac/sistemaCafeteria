<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM productos WHERE id = $id";
  $result = mysqli_query($mysqli, $sql);
  if(!$result) {
    echo "error al eliminar registro";
  }

  echo "<script>
        alert('Producto eliminado exitosamente');
        window.location= 'productos.php' </script>";
  //header('Location: productos.php');
}

?>
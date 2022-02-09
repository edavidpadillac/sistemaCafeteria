<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id=$id";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 1) {
        $campo = mysqli_fetch_array($result);
        $nombre = $campo['nombre'];
        $referencia = $campo['referencia'];
        $precio = $campo['precio'];
        $peso = $campo['peso'];
        $categoria = $campo['categoria'];
        $stock = $campo['stock'];
        $fecha = $campo['fecha_creacion'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nom = $_POST['txtNombre'];
    $ref = $_POST['txtRef'];
    $pre = $_POST['txtPrecio'];
    $pes = $_POST['txtPeso'];
    $cat = $_POST['txtCat'];
    $sto = $_POST['txtStock'];
    $fec = $_POST['dateFecha'];

    $query = "UPDATE productos set nombre = '$nom', referencia = '$ref', precio = '$pre', peso = '$pes', categoria = '$cat', stock = '$sto', fecha_creacion = '$fec'  WHERE id=$id";
    mysqli_query($mysqli, $query);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: productos.php');
}

?>
<?php include('base/cabecera.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="actualizar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="txtNombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtRef" class="form-control" value="<?php echo $referencia; ?>" placeholder="Referencia" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="txtPrecio" class="form-control" value="<?php echo $precio; ?>" placeholder="Precio" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="txtPeso" class="form-control" value="<?php echo $peso; ?>" placeholder="Peso" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="txtCat" class="form-control" value="<?php echo $categoria; ?>" placeholder="Categoria" required> 
                    </div>
                    <div class="form-group">
                        <input type="number" name="txtStock" class="form-control" value="<?php echo $stock; ?>" placeholder="Stock" required>
                    </div>
                    <div class="form-group">
                        <input type="date" name="dateFecha" class="form-control" value="<?php echo $fecha; ?>" required>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('base/pie.php'); ?>
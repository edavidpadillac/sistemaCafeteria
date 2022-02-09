<?php include("db.php") ?>
<title>Productos</title>
<?php include("base/cabecera.php") ?>

<main class="container p-4">
    <div class="row mt-2">
        <div class="col md-4">


            <div class="card card-body">
                <form action="guardar.php" method="POST">

                    <div class="form-group">
                        <input type="number" name="id" class="form-control" placeholder="Código producto" autofocus required >
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="referencia" class="form-control" placeholder="Referencia" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="precio" class="form-control" placeholder="Precio" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="peso" class="form-control" placeholder="Peso" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="categoria" class="form-control" placeholder="Categoria" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="stock" class="form-control" placeholder="Stock" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="date" name="fecha" class="form-control" placeholder="Fecha registro" autofocus required>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">

                </form>

            </div>
        </div>
        <div class="row mt-2">
            <div class="col md-8">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Fecha ingreso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM productos";
                        $resultado = mysqli_query($mysqli, $sql);

                        while ($campo = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $campo['nombre']; ?></td>
                                <td><?php echo $campo['referencia']; ?></td>
                                <td><?php echo $campo['precio']; ?></td>
                                <td><?php echo $campo['peso']; ?></td>
                                <td><?php echo $campo['categoria']; ?></td>
                                <td><?php echo $campo['stock']; ?></td>
                                <td><?php echo $campo['fecha_creacion']; ?></td>
                                <td>
                                    <a href="actualizar.php?id=<?php echo $campo['id'] ?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="eliminar.php?id=<?php echo $campo['id'] ?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>



<?php include("base/pie.php") ?>
<?php include("db.php") ?>
<title>Ventas</title>
<?php include("base/cabecera.php") ?>

<main class="container p-4">
    <div class="row mt-8">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="realizarVenta.php" method="POST">
                    <div class="form-group">
                        <input type="number" name="id" class="form-control" placeholder="Código producto" autofocus required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="canti" class="form-control" placeholder="Cantidad" autofocus required>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="vender" value="Realizar venta">
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="col md-8">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Código producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

                <?php
                
                $sql = "SELECT * FROM ventas ";
                $resultado = mysqli_query($mysqli, $sql);

                while ($campo = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $campo['id_producto']; ?></td>
                        <td><?php echo $campo['cantidad']; ?></td>
                        <td><?php echo $campo['total']; ?></td>                        
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</main>



<?php include("base/pie.php") ?>
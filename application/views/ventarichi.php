<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-cubes"></i> GESTION DE VENTAS</h1>
		<a href="nueva_venta.php" class="btn btn-info"> <i class="fas fa-user-plus"></i>&nbsp;NUEVA VENTA</a>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr align=center>
							<th>Nro</th>
							<th>FECHA</th>
							<th>TOTAL</th>
							<th>GENERAR REPORTE</th>
						</tr>
					</thead>
					<tbody bgcolor="#022424">
						<?php
						require "../conexion.php";
						$query = mysqli_query($conexion, "SELECT nofactura, fecha,codcliente, totalfactura, estado FROM factura ORDER BY nofactura DESC");
						mysqli_close($conexion);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
						?>
								<tr align=center>
									<td><?php echo $dato['nofactura']; ?></td>
									<td><?php echo $dato['fecha']; ?></td>
									<td><?php echo $dato['totalfactura']; ?></td>
									<td>
										<button type="button" class="btn btn-success view_factura" cl="<?php echo $dato['codcliente'];  ?>" f="<?php echo $dato['nofactura']; ?>">VER REPORTE</button>
									</td>
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>
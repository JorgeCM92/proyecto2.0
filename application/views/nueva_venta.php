

                <!-- Contenido de la página de inicio -->
                <div class="container-fluid" style="background-color:#022424;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <font color="orange"><h4 class="text-center">DATOS DEL CLIENTE</h4></font>
                                <a href="#" class="btn btn-outline-info btn_new_cliente"><i class="fas fa-user-plus"></i> NUEVO CLIENTE</a>
                                <a href="ventas.php" class="btn btn-outline-info"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;CANCELAR</a>
                            </div>
                            <div class="card">
                                <div class="card-body" style="background-color:#008080;">
                                    <form method="post" name="form_new_cliente_venta" id="form_new_cliente_venta">
                                        <input type="hidden" name="action" value="addCliente">
                                        <input type="hidden" id="idcliente" value="1" name="idcliente" required>
                                        <div class="row" style="color:white;">
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>NIT/CI</label>
                                                    <input type="number" name="dni_cliente" id="dni_cliente" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>NOMBRE</label>
                                                    <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>TELEFONO</label>
                                                    <input type="number" name="tel_cliente" id="tel_cliente" class="form-control" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>DIRECCION</label>
                                                    <input type="text" name="dir_cliente" id="dir_cliente" class="form-control" disabled required>
                                                </div>
                                            </div>
                                            <div id="div_registro_cliente" style="display: none;">
                                                <button type="submit" class="btn btn-success">GUARDAR</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <font color="orange"> <h4 class="text-center">DATOS DETALLE VENTA</h4> </font>
                            </div>
                            <div class="row" style="color:white;">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> VENDEDOR</label>
                                        <p style="font-size: 16px; text-transform: uppercase; color: cyan;"><?php echo $_SESSION['login']; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>ACCIONES</label>
                                    <div id="acciones_venta" class="form-group">
                                        <a href="#" class="btn btn-danger" id="btn_anular_venta">ANULAR VENTA</a>
                                        <a href="#" class="btn btn-success" id="btn_facturar_venta"><i class="fas fa-save"></i> GENERAR VENTA</a>
                                    </div>
                                </div>
                            </div> 
                              <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" >
                                    <thead class="thead-dark" style="color:orange;">
                                        <tr align=center>
                                            <th width="100px">ID PRODUCTO</th>
                                            <th>DESCRIPCION</th>
                                            <th>PROD_EXISTE</th>
                                            <th width="100px">CANTIDAD</th>
                                            <th class="textright">PRECIO</th>
                                            <th class="textright">TOTAL</th>
                                            <th>AGREGAR</th>
                                        </tr>
                                        <tr align=center>
                                            <td ><input type="number" name="txt_cod_producto" id="txt_cod_producto"></td>
                                            <td id="txt_descripcion">-</td>
                                            <td id="txt_existencia">-</td>
                                            <td><input type="text" name="txt_cant_producto" id="txt_cant_producto"value="0" min="1" disabled></td>
                                            <td id="txt_precio" class="textright">0.00</td>
                                            <td id="txt_precio_total" class="txtright">0.00</td>
                                            <td><a href="#" id="add_product_venta" class="btn btn-warning" style="display: none;">AGREGAR</a></td>
                                        </tr>
                                        <tr align=center>
                                            <th>ID PRODUCTO</th>
                                            <th colspan="2">DESCRIPCION</th>
                                            <th>CANTIDAD</th>
                                            <th class="textright">PRECIO</th>
                                            <th class="textright">TOTAL</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalle_venta">
                                        <!-- Contenido ajax -->

                                    </tbody>

                                    <tfoot id="detalle_totales">
                                        <!-- Contenido ajax -->
                                    </tfoot>
                                </table>

                              </div>
                        </div>
                    </div>

                </div>
                <!-- /.contenedor-líquido -->

            </div>
            <!--Fin del contenido principal -->

<style>
    #nombre,
    #primerA,
    #segundoA:disabled {
        background: #ccc;
    }
</style>


<div class="right_col" role="main">

    <div class="title_left">
        <h3>Insertar nueva venta</h3>
    </div>
    <!-- Inicio Div Right Col Role Main -->
    <div class="container md-3">
        <!-- Inicio Div container md-3 -->
        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 ">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Datos del Cliente</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->
                        <?php
                        echo form_open_multipart('venta/index');
                        ?>
                        <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a lista de ventas
                        </button>
                        <?php
                        echo form_close();
                        ?>
                        <br>
                        <p class="text-muted font-13 m-b-30">
                            Usted va a insertar una nueva venta, por favor llene el siguiente campo:
                        </p>
                        <?php
                        echo form_open_multipart('venta/insertVenta');
                        ?>
                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="Cantidad">Carnet Identidad:</label>
                            <div class="col-md-5">
                                <input type="search" name="carnet" id="carnet" class="form-control"></input>
                            </div>
                            <input hidden name="idcli" id="idcli" value="0" class="form-control">
                            <input hidden name="idUsuario" id="idUsuario" value="0">


                            <label class="col-form-label col-md-1 label-align" for="nombre">Nombre Cliente:</label>
                            <div class="col-md-5">
                                <input class="form-control" disabled name="nombre" id="nombre" placeholder="Escriba algun nombre" />
                                <div id="suggestions">
                                    <ul id="autoSuggestionsList"></ul>
                                </div>

                            </div>

                        </div>

                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="primerapellido">Primer apellido:</label>

                            <div class="col-md-5">
                                <input id="primerA" disabled class="form-control" placeholder="Sin primer apellido" value=""></input>
                            </div>

                            <label class="col-form-label col-md-1 label-align" for="primerapellido">Segundo Apellido:</label>

                            <div class="col-md-5">
                                <input id="segundoA" disabled class="form-control" placeholder="Sin segundo apellido" value=""></input>
                            </div>
                        </div>

                        <button hidden type="submit" class="btn btn-success">
                            <i class="fa fa-plus-circle"></i> Agregar cliente
                        </button>

                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->

        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 ">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Datos de Venta</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->

                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="nombre">Nombre Producto:</label>
                            <div class="col-md-3">
                                <input type="search" class="form-control" value="" name="chasis" id="chasis" placeholder="Escriba nombre del producto" />
                            </div>
                            <input hidden name="idProdu" id="idProdu" value="" class="form-control">


                            <label class="col-form-label col-md-1 label-align" for="Cantidad">Precio Unitario:</label>
                            <div class="col-md-3">
                                <input name="precioU" disabled id="precioU" class="form-control" value="Sin precio Unitario"></input>
                            </div>
                        </div>



                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="numerocelular">Cantidad:</label>
                            <div class="col-md-3">
                                <input type="number" id="cantidad" value="0" name="cantidad" class="form-control" placeholder="0">
                                <?php echo form_error('numerocelular'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align">Total:</label>
                            <div class="col-md-3">
                                <input type="number" name="totalPrecio" id="totalPrecio" class="form-control">
                            </div>
                        </div>
                        <button id="agregarTabla" disabled type="text" class="btn btn-success">
                            <i class="fa fa-plus-circle"></i> Agregar a la tabla
                        </button>

                        <?php echo form_open_multipart('venta/listapdf'); ?>
                        <button type="submit" class="btn btn-success" name="enviar"><i class="fa fa-plus-circle"></i> Insertar</button>
                        <?php echo form_close(); ?>
                        
                        <?php
                        echo form_close();
                        ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->


        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            
                            <th class="column-title">Nombre </th>
                            <th class="column-title">Marca </th>
                            <th class="column-title">Precio </th>
                            <th class="column-title">Codigo </th>
                            <th class="column-title no-link last"><span class="nobr">Eliminar</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>

                    <tbody id="bodyTabla">

            
                    </tbody>
                </table>
            </div>


        </div>


    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->


<!-- ✅ Load CSS file for jQuery ui  -->
<link href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

 let producto = [];

    $("#chasis").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/venta/productList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                },
                error: function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
        },
        select: function(event, ui) {
            $('#chasis').val(ui.item.value); // display the selected text
            //$('#marca').val(ui.item.nombreMarca); // display the selected text
            $('#precioU').val(ui.item.precioUnitario); // save selected id to input
            $('#idProdu').val(ui.item.idProducto); // save selected id to input
            $('button[id=agregarTabla]').removeAttr('disabled');
            producto = ui.item;
            return false;
        }
    });


    $("#carnet").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/venta/clientList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#carnet').val(ui.item.value); // display the selected text
            $('#primerA').val(ui.item.primerApellido); // display the selected text
            $('#segundoA').val(ui.item.segundoApellido); // display the selected text
            $('#nombre').val(ui.item.nombres); // save selected id to input
            $('#idcli').val(ui.item.idCliente); // save selected id to input
            return false;
        }
    });




    // $(document).ready(function() {
    //     $("#cantidad").keyup(function(event) {
    //         const totalT = $("#precioU").val() * $("#cantidad").val();
    //         $("#totalPrecio").attr('value', totalT);
    //     });
    // });



    // // const nombre = document.getElementById('nombre');
    // // const apellidos = document.getElementById('primerA');
    // // const apellidos = document.getElementById('primerA');
    // // const search = document.getElementById('carnet');

    // // search.addEventListener('input', evt => {
    // //     if (!evt.inputType && search.value === '') {
    // //         apellidos.value = 'Sin apellidos';
    // //         nombre.value = 'Sin nombre';
    // //     }
    // // });


    // const nombre = document.getElementById('nombre');
    // const apellidos = document.getElementById('primerA');
    // const apellidos = document.getElementById('primerA');
    // const search = document.getElementById('carnet');

    // search.addEventListener('input', evt => {
    //     if (!evt.inputType && search.value === '') {
    //         apellidos.value = 'Sin apellidos';
    //         nombre.value = 'Sin nombre';
    //     }
    // });



    // const search2 = document.getElementById('producto');
    // const marca = document.getElementById('marca');
    // const precioU = document.getElementById('precioU');

    // search2.addEventListener('input', evt => {
    //     if (!evt.inputType && search2.value === '') {
    //         marca.value = 'Sin marca';
    //         precioU.value = 'Sin precio Unitario';
    //     }
    // });

           console.log(producto);

        $(document).ready(function () {
            $("#agregarTabla").click(function () {
                // Para este ejemplo, en realidad no envíe el formulario
                     event.preventDefault();
                markup = "<tr class='even pointer'><td>"+producto.nroChasis+"</td><td>"+producto.marca+"</td><td>"+producto.precioUnitario+"</td><td>"+producto.idProducto+"</td><td ><a href='#'>Eliminar</a></tr>";
                tableBody = $("#bodyTabla");
                tableBody.append(markup);
            });
        }); 

</script>
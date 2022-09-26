
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Motocicleta</h2>
        
        <?php 
        foreach($infoproducto->result() as $row)
        {
        echo form_open_multipart('producto/modificarbd');
        ?>
        <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
        <form class="row g-3">
            <div class="col-md-4">
            <label for="inputMa" class="form-label">Marca:</label>
            <select name="idMarca" class="form-control">
                <option>Seleccione una Marca</option>
                <?php
                foreach($marca->result() as $marow)
                {
                    ?>
                        <option value="<?php echo $marow->idMarca; ?>">
                            <?php echo $marow->nombreMarca;?>
                        </option>
                    <?php
                }
                ?>
            </select>
            </div>
            <div class="col-md-4">
            <label for="inputMo" class="form-label">Modelo:</label>
            <select name="idModelo" class="form-control">
                <option>Seleccione un Modelo</option>
                <?php
                foreach($modelo->result() as $mrow)
                {?>
                    <option value="<?php echo $mrow->idModelo;?>"><?php echo $mrow->nombreModelo;?></option>
                <?php
                }
                ?>
            </select>
            </div>
            <div class="col-md-4">
                <label for="inputCo" class="form-label">Color:</label>
                <select name="color" id="exampleInputColor" class="form-control form-select form-select-lg" aria-label="First name" required value="<?php echo $row->color; ?>">
                    <option value="" disabled selected >Seleccione un Color:</option>
                    <option>ROJO</option>
                    <option>BLANCO</option>
                    <option>NEGRO</option>
                    <option>PLOMO</option>
                    <option>AZUL</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputAM" class="form-label">Año Modelo:</label>
                <input type="text" name="aniomodelo" class="form-control"  placeholder="Año Modelo" required aria-label="First name" value="<?php echo $row->anioModelo; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputNC" class="form-label">Numero Chasis:</label>
                <input type="text" name="nrochasis" class="form-control" id="inputNC" placeholder="Ingrese Nro. Chasis" aria-label="First name" required value="<?php echo $row->nroChasis; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputNM" class="form-label">Numero Motor:</label>
                <input type="text" name="nromotor" class="form-control" id="inputNM" placeholder="Ingrese Nro. Motor" aria-label="First name" required value="<?php echo $row->nroMotor; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputPo" class="form-label">Poliza:</label>
                <input type="text" name="poliza" class="form-control" id="inputPo" placeholder="Ingrese la Poliza" aria-label="First name" required value="<?php echo $row->poliza; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputPre" class="form-label">Precio:</label>
                <input type="text" name="precio" class="form-control" id="inputPre" placeholder="Ingrese el Precio" aria-label="First name" required value="<?php echo $row->precio; ?>">
            </div><br> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modificar Motocicleta</button>
            </div>
            <br>
            
        </form>
        <?php 
        echo form_close();
        }
        ?>            
        </div>

    </div>
</div>
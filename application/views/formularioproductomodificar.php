
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
                <option value="<?php echo $row->idMarca; ?>"><?php echo $row->nombreMarca;?></option>
                <?php
                foreach($marca->result() as $marow2)
                {
                    ?>
                        <option value="<?php echo $marow2->idMarca; ?>">
                            <?php echo $marow2->nombreMarca;?>
                        </option>
                    <?php
                }
                ?>
            </select>
            </div>
            <div class="col-md-4">
            <label for="inputMo" class="form-label">Modelo:</label>
            <select name="idModelo" class="form-control">
                <option value="<?php echo $row->idModelo;?>"><?php echo $row->nombreModelo;?></option>
                <?php
                foreach($modelo->result() as $mrow2)
                {?>
                    <option value="<?php echo $mrow2->idModelo;?>"><?php echo $mrow2->nombreModelo;?></option>
                <?php
                }
                ?>
            </select>
            </div>
            <div class="col-md-4">
                <label for="inputCo" class="form-label">Color:</label>
                <select name="color" id="exampleInputColor" class="form-control form-select form-select-lg" aria-label="First name" required >
                    <option value="<?php echo $row->idProducto; ?>" ><?php echo $row->color;?></option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputAM" class="form-label">A??o Modelo:</label>
                <input type="text" name="aniomodelo" class="form-control"  placeholder="A??o Modelo" required aria-label="First name" value="<?php echo $row->anioModelo; ?>">
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
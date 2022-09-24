
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Agregar Sucursal</h2>
        
        <?php 
        echo form_open_multipart('sucursal/agregarbd');
        ?>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputN" class="form-label">Nombre Sucursal:</label>
                <input type="text" name="nombresucursal" class="form-control" placeholder="Ingrese el nombre de la sucursal" aria-label="First name" required>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control" id="inputAddress2" placeholder="Ingrese la direccion de su domicilio" required>
            </div><br> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar Sucursal</button>
            </div>
            <br>
            
        </form>
        <?php 
        echo form_close();
        ?>            
        </div>

    </div>
</div>
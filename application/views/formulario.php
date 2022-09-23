
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Agregar Cliente</h2>
        
        <?php 
        echo form_open_multipart('cliente/agregarbd');
        ?>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputN" class="form-label">Nombres:</label>
                <input type="text" name="nombres" class="form-control" placeholder="Ingrese su nombre" aria-label="First name" required>
            </div>
            <div class="col-md-6">
                <label for="inputPA" class="form-label">Primer Apellido:</label>
                <input type="text" name="primerapellido" class="form-control" placeholder="Ingrese su primer apellido" aria-label="First name" required>
            </div>
            <div class="col-md-6">
                <label for="inputSA" class="form-label">Segundo Apellido:</label>
                <input type="text" name="segundoapellido" class="form-control" placeholder="Ingrese su segundo apellido" aria-label="First name">
            </div>
            <div class="col-md-2">
                <label for="inputCI" class="form-label">Cedula Identidad:</label>
                <input type="text" name="cedulaidentidad" class="form-control" id="inputCI" placeholder="Cedula Identidad" required>
            </div>
            <div class="col-md-6">
                <label for="inputT" class="form-label">Telefono:</label>
                <input type="text" name="telefono" class="form-control" id="inputT" placeholder="Ingrese su telefono" required>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control" id="inputAddress2" placeholder="Ingrese la direccion de su domicilio" required>
            </div><br> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar Cliente</button>
            </div>
            <br>
            
        </form>
        <?php 
        echo form_close();
        ?>            
        </div>

    </div>
</div>
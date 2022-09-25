
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Agregar Modelo</h2>
        
        <?php 
        echo form_open_multipart('modelo/agregarbd');
        ?>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputN" class="form-label">Nombre Modelo:</label>
                <input type="text" name="nombremodelo" class="form-control" placeholder="Ingrese el nombre del modelo" aria-label="First name" required>
            </div><br> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar Modelo</button>
            </div>
            <br>
            
        </form>
        <?php 
        echo form_close();
        ?>            
        </div>

    </div>
</div>
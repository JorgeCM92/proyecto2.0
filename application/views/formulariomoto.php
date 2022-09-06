
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Agregar Motocicleta</h2>
        
        <?php 
        echo form_open_multipart('motocicleta/agregarbd');
        ?>
        <form class="row g-3">
            <div class="col-md-4">
                <label for="inputMa" class="form-label">Marca:</label>
                <input type="text" name="marca" class="form-control" placeholder="Ingrese la Marca" aria-label="First name" required>
            </div>
            <div class="col-md-4">
                <label for="inputTM" class="form-label">Tipo de Modelo:</label>
                <select name="tipomodelo" id="exampleInputTipo" class="form-control form-select form-select-lg" aria-label="First name" required >
                    <option value="" disabled selected >Seleccione un tipo de modelo:</option>
                    <option>CG110</option>
                    <option>CB1</option>
                    <option>CB125F</option>
                    <option>CB160F</option>
                    <option>CB250F</option>
                    <option>XR150L</option>
                    <option>XR190L</option>
                    <option>XR250TORNADO</option>
                    <option>CRF250F</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputCo" class="form-label">Color:</label>
                <input type="text" name="color" class="form-control" placeholder="Ingrese el color" aria-label="First name" required>
            </div>
            <div class="col-md-4">
                <label for="inputAM" class="form-label">Año Modelo:</label>
                <input type="text" name="aniomodelo" class="form-control"  placeholder="Año Modelo" required aria-label="First name" >
            </div>
            <div class="col-md-4">
                <label for="inputNC" class="form-label">Numero Chasis:</label>
                <input type="text" name="nrochasis" class="form-control" id="inputNC" placeholder="Ingrese Nro. Chasis" aria-label="First name" required>
            </div>
            <div class="col-md-4">
                <label for="inputNM" class="form-label">Numero Motor:</label>
                <input type="text" name="nromotor" class="form-control" id="inputNM" placeholder="Ingrese Nro. Motor" aria-label="First name" required>
            </div>
            <div class="col-md-4">
                <label for="inputPo" class="form-label">Poliza:</label>
                <input type="text" name="poliza" class="form-control" id="inputPo" placeholder="Ingrese la Poliza" aria-label="First name" required>
            </div><br> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar Motocicleta</button>
            </div>
            <br>
            
        </form>
        <?php 
        echo form_close();
        ?>            
        </div>

    </div>
</div>
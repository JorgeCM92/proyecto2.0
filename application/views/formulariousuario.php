
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Agregar Usuario</h2>
        
        <?php 
        echo form_open_multipart('usuarios/agregarbd');
        ?>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputN" class="form-label">Login:</label>
                <input type="text" name="login" class="form-control" placeholder="Ingrese el login" aria-label="First name" required>
            </div>
            <div class="col-md-6">
                <label for="inputPas" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Ingrese su password" aria-label="First name" required>
            </div>
            <div class="col-md-6">
                <label for="inputPas" class="form-label">Rol Usuario:</label>
                <select name="tipo" id="exampleInputTipo" class="form-control form-select form-select-lg" required >
                    <option value="" disabled selected >Seleccione un rol:</option>
                    <option>admin</option>
                    <option>guest</option>
                </select>
            </div>
            <div class="col-md-5">
                <label for="inputPas" class="form-label">Foto:</label>
                <input type="file" name="userfile" class="form-control" id="exampleInputUser">
            </div>
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
            <div class="col-md-2">
                <label for="inputFN" class="form-label">Fecha Nacimiento:</label>
                <input type="date" name="fechanacimiento" class="form-control" id="inputFN" required>
            </div>
            <div class="col-md-6">
                <label for="inputT" class="form-label">Telefono:</label>
                <input type="text" name="telefono" class="form-control" id="inputT" placeholder="Ingrese su telefono" required>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Correo Electronico:</label>
                <input type="email" name="correoelectronico" class="form-control" id="inputEmail4" placeholder="Ingrese su correo" required>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control" id="inputAddress2" placeholder="Ingrese la direccion de su domicilio" required>
            </div><br><br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar Usuario</button>
            </div><br>
            
        </form>
        <?php 
        echo form_close();
        ?>            
        </div>

    </div>
</div>
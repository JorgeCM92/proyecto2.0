
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Usuario</h2>
        
        <?php 
        foreach($infousuario->result() as $row)
        {
        echo form_open_multipart('usuarios/modificarbd'); ?>
        <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputN" class="form-label">Login:</label>
                <input type="text" name="login" class="form-control" placeholder="Ingrese el login" aria-label="First name" required value="<?php echo $row->login; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPas" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Ingrese su password" aria-label="First name" required value="<?php echo $row->password; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPas" class="form-label">Rol Usuario:</label>
                <select name="tipo" id="exampleInputTipo" class="form-control form-select form-select-lg" required value="<?php echo $row->tipo; ?>">
                    <option value="" disabled selected >Seleccione un rol:</option>
                    <option>admin</option>
                    <option>guest</option>
                </select>
            </div><br>
            <div class="col-md-5">
                <label for="inputPas" class="form-label">Foto:</label>
                <input type="file" name="userfile" class="form-control" id="exampleInputUser">
            </div>
            <div class="col-md-6">
                <label for="inputN" class="form-label">Nombres:</label>
                <input type="text" name="nombres" class="form-control" placeholder="Ingrese su nombre" aria-label="First name" required value="<?php echo $row->nombres; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPA" class="form-label">Primer Apellido:</label>
                <input type="text" name="primerapellido" class="form-control" placeholder="Ingrese su primer apellido" aria-label="First name" required value="<?php echo $row->primerApellido; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputSA" class="form-label">Segundo Apellido:</label>
                <input type="text" name="segundoapellido" class="form-control" placeholder="Ingrese su segundo apellido" aria-label="First name" value="<?php echo $row->segundoApellido; ?>">
            </div>
            <div class="col-md-2">
                <label for="inputCI" class="form-label">Cedula Identidad:</label>
                <input type="text" name="cedulaidentidad" class="form-control" id="inputCI" placeholder="Cedula Identidad" required value="<?php echo $row->cedulaIdentidad; ?>">
            </div>
            <div class="col-md-2">
                <label for="inputFN" class="form-label">Fecha Nacimiento:</label>
                <input type="date" name="fechanacimiento" class="form-control" id="inputFN" required value="<?php echo $row->fechaNacimiento; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputT" class="form-label">Telefono:</label>
                <input type="text" name="telefono" class="form-control" id="inputT" placeholder="Ingrese su telefono" required value="<?php echo $row->telefono; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Correo Electronico:</label>
                <input type="email" name="correoelectronico" class="form-control" id="inputEmail4" placeholder="Ingrese su correo" required value="<?php echo $row->correoElectronico; ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control" id="inputAddress2" placeholder="Ingrese la direccion de su domicilio" required value="<?php echo $row->direccion; ?>">
            </div><br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modificar Usuario</button>
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
   
   <!-- Sidebar -->


        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Sistema Motocicletas</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <br>
            <br>
            
            <li class="nav-item">
                <?php echo form_open_multipart('cliente/index');?>
                <button type="submit" class="btn btn-dark border-bottom-secondary border-left-secondary  " >CLIENTES</button>
                <?php echo form_close();?>
            </li>
            <li class="nav-item">
                <?php echo form_open_multipart('motocicleta/index');?>
                <button type="submit" class="btn btn-dark border-bottom-secondary border-left-secondary" >MOTOCICLETAS</button>
                <?php echo form_close();?>
            </li>
            <li class="nav-item">
                <?php echo form_open_multipart('usuarios/index2');?>
                <button type="submit" class="btn btn-dark border-bottom-secondary border-left-secondary" >USUARIOS</button>
                <?php echo form_close();?>
            </li>
            <li class="nav-item">
                <?php echo form_open_multipart('sucursal/index');?>
                <button type="submit" class="btn btn-dark border-bottom-secondary border-left-secondary" >SUCURSALES</button>
                <?php echo form_close();?>
            </li>
            <li class="nav-item">
                <?php echo form_open_multipart('marca/index');?>
                <button type="submit" class="btn btn-dark border-bottom-secondary border-left-secondary" >MARCAS</button>
                <?php echo form_close();?>
            </li>
            <li class="nav-item">
                <?php echo form_open_multipart('modelo/index');?>
                <button type="submit" class="btn btn-dark border-bottom-secondary border-left-secondary" >MODELOS</button>
                <?php echo form_close();?>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-4" src="<?php echo base_url(); ?>sbadmin2/img/moto.jpg" alt="...">
                <p class="text-center mb-2"><strong>SISTEMA</strong> MOTOCICLETAS</p>
            </div>

            <div class="sidebar-card d-none d-lg-flex">
                <h6 class="text-gray-100"> Login:
                <?php echo $this->session->userdata('login'); ?>
                </h6>
                
                <h6 class="text-gray-100"> Tipo:
                <?php echo $this->session->userdata('tipo'); ?>
                </h6>
            </div>

            <!-- Logout -->
            <div>
                <?php echo form_open_multipart('usuarios/logout'); ?>
                <button type="submit" class="btn btn-danger border-bottom-secondary border-left-secondary" name="enviar">CERRAR SESION</button>
                <?php echo form_close(); ?>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-gradient-secondary">

            <!-- Main Content -->
            <div id="content ">

  
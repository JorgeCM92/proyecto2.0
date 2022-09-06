
<div >
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login de Usuarios</title>

        

    </head>

    <body class="bg-gray-900 sidebar-dark ">


        <?php
        echo form_open_multipart('usuarios/validar');
        ?>
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center ">

                <div class="col-xl-5 ">

                    <div class="card o-hidden border-5 shadow-lg my-5 bg-secondary text-gray-100">
                        <div class="card-body p-12">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class=" justify-content-center">
                                        
                                        <div class="text-center">
                                            <h1 class="h4 mb-4">LOGIN DE USUARIOS</h1>
                                            
                                        </div>
                                        
                                        <form class="user">

                                            <div class="form-group">
                                                <label class="form-label">Login:</label>
                                                <input type="text" class="form-control form-control-user" name="login"
                                                    id="login" aria-describedby="loginHelp"
                                                    placeholder="Ingrese su login" require>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Password:</label>
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" name="password" placeholder="Ingrese su password" require>
                                            </div>
                                            <div>
                                                <button class="btn btn-dark btn-user btn-block" btn btn-primary type="submit" >INGRESAR</button>
                                            </div>
                                            <br>
                                            <h4 class="text-warning"> <?php echo mensajeLogin($msg); ?></h4>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url(); ?>sbadmin2/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>sbadmin2/js/sb-admin-2.min.js"></script>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url(); ?>sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

    </body>
</div>
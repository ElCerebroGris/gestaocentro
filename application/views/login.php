<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
    <head>
        <title>ENTRAR</title>
        <!--Bootsrap 4 CDN-->
        <link href="<?= base_url() ?>assets/login/bootstrap.css" id="bootstrap-css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/loginstyles.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/font/css/all.css">
        <!--Fontawesome CDN
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        -->
        <style>
            html,body{
                background-image: url('<?= base_url() ?>img/bg.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                height: 100%;
                font-family: 'Numans', sans-serif;
            }
        </style>


        <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <!--<h3 class="text-center">CASA DA JUVENTUDE</h3>-->
                        <h3 class="text-center">CENTRO DE FORMAÇÃO</h3>
                        <!--
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                        -->
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url() ?>usuario/entrarPost">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="usuario" type="text" class="form-control" placeholder="usuario">

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input name="senha" type="password" class="form-control" placeholder="senha">
                            </div>
                            <!--
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            -->
                            <div class="form-group">
                                <input type="submit" value="Entrar" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <!--
                        <div class="d-flex justify-content-center links">
                            Don't have an account?<a href="#">Sign Up</a>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <a href="#">Esqueceu a senha?</a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
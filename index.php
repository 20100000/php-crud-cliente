<?php
   session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>POS | Treeppayp</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <style>
        pre.prettyprint {
            background-color: #eee;
            border: 0px;
            margin-bottom: 60px;
            margin-top: 30px;
            padding: 20px;
            text-align: left;
        }

        .atv,
        .str {
            color: #05AE0E;
        }

        .tag,
        .pln,
        .kwd {
            color: #3472F7;
        }

        .atn {
            color: #2C93FF;
        }

        .pln {
            color: #333;
        }

        .com {
            color: #999;
        }

        .space-top {
            margin-top: 50px;
        }

        .btn-primary .caret {
            border-top-color: #3472F7;
            color: #3472F7;
        }

        .area-line {
            border: 1px solid #999;
            border-left: 0;
            border-right: 0;
            color: #666;
            display: block;
            margin-top: 20px;
            padding: 8px 0;
            text-align: center;
        }

        .area-line a {
            color: #666;
        }

        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
        }

        .table-shopping .td-name {
            min-width: 130px;
        }

        .pick-class-label {
            border-radius: 8px;
            border: 1px solid #E3E3E3;
            color: #ffffff;
            cursor: pointer;
            display: inline-block;
            font-size: 75%;
            font-weight: bold;
            line-height: 1;
            margin-right: 10px;
            padding: 23px;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap;
        }
    </style>
</head>

<body class="documentation">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-transparent " color-on-scroll="500">
        <div class="  container-fluid ">
            
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper" style="min-height: 100vh;">
        <div class="page-header clear-filter" filter-color="purple">
            <div class="page-header-image" data-parallax="true" style="background-image: url('assets/img/full-screen-image-3.jpg')">
                <div class="filter"></div>
                <div class="title-container text-center">
                    <h1>Teste</h1>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                                <form action="controller/login.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Usúario</label>
                                                <input type="text" class="form-control" name="us" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" class="form-control" name="pw" placeholder=""  required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12">
                                                <button type="submit" class="btn btn-info btn-fill ">Entrar</button>
                                        </div>
                                    </div>            
                                </form>
                                <?php
                                if(isset($_SESSION['nao_autenticado'])):
                                ?>
                                <div class="notification is-danger">
                                  <p>ERRO: Usuário ou senha inválidos.</p>
                                </div>
                                <?php
                                endif;
                                unset($_SESSION['nao_autenticado']);
                                ?>
                        </div>   
                        <div class="col-md-4"></div>     
                    </div>
                    <br />
                </div>
            </div>
        </div>
       
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script>
    var header_height;
    var fixed_section;
    var floating = false;

    $(document).ready(function() {
   

    });
</script>

</html>
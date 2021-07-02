<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="30;url=#" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Empresa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/logognrtipo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">GNR FutureRP</span>
    </a>
<?php

$servername = "localhost";
$username = "root"; //nome do username da db
$password = "";   //password da db

session_start();
$password_user = $_SESSION["pw"];
$login =  $_SESSION['login'];

 try {
   $conn = new PDO("mysql:host=$servername;dbname=gnrfuture", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $tab=$conn->query("SELECT * FROM userstable WHERE usersID='$login' AND usersPw='$password_user'");
   $validacao=$tab->rowcount();
   if($validacao==0){
	   header('Location:..\login.html');
exit;
   }
   $ficha=$tab->fetch();
   $name=$ficha['usersName'];
   $last_name=$ficha['usersLastName'];
   $steam=$ficha['usersSteam'];
   $contagem=$conn->query("SELECT * FROM userstable");
   $contagemOn=$conn->query("SELECT * FROM userstable where usersOn = 1");
   $num=$contagem->rowcount();
   $numOn=$contagemOn->rowcount();
   $funcId=$ficha['usersFunc'];
   $tab2=$conn->query("SELECT * FROM functable WHERE funcId='$funcId'");
   $ficha2=$tab2->fetch();
   $mts=$conn->query("SELECT * FROM total");
   $multas=$mts->fetch();
   $total=$multas['totalMultas'];
   $cash=$multas['totalMultasCash'];
   $func=$ficha2['funcName'];
   $_SESSION["lvl"]=$ficha['usersFunc'];
   }
 catch(PDOException $e)
   {
   echo "Ligação com problemas. Erro: " . $e->getMessage();
   }


?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $func;?></a>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $name; echo "  "; echo $last_name; ?></a>
        </div>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="https://steamcommunity.com/id/<?php echo $steam; ?>" target="_blank" class="btn"><?php echo " A tua conta Steam ";?></a>
        </div>
      </div>
      <font color="white">Missão, Visão, Valores</font>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <iframe width="225" height="345" src="https://www.youtube.com/embed/Bp3DRdLvvDA">
        </iframe>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <li class="nav-item ">
            </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Estatísticas da empresa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="..\login.html"><button class="btn-primary">Sair</button></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total ?></h3>
                <p>As tuas Multas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $cash ?>€</h3>
                <p>A tua Fatorização de multas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $numOn ?></h3>

                <p>Militares em serviço</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Ver  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $num ?></h3>

                <p>Militares </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <h1> Serviço
              <span><a href=sairponto.php><input type="btn" value="Sair de serviço" class="btn btn-danger"></a></span>
            <!--<h1>Fiscalização -  <?php   $user_lvl = $ficha['usersFunc'];
              $cc=$conn->query("SELECT * FROM functable WHERE funcId='$user_lvl'");
              $cargo=$cc->fetch();
                    echo $cargo['funcName'];
                    ?></h1>
            </p>
              <form method="POST" action="picaponto.php">
      					<div class="input-group form-group">
                  <li>
                    Nome  <input class="form-control" type="text" value="<?php echo $ficha['usersName']?>" name="txtname">
                  </li>
                  <li>
                    Ultimo Nome  <input class="form-control" type="text" value="<?php echo $ficha['usersLastName']?>" name="txtlast_name">
                  </li>
                  <li>
                    Dia  <input class="form-control" type="date" value="<?php $date=date("Y-m-d"); echo $date?>" name="txtday">
                  </li>

                  <li>
                      Hora de entrada  <input class="form-control" type="time" value="<?php echo $cargo['job_join']?>" name="txtjoin">
                  </li>

                  <li>
                      Hora de Saída  <input class="form-control" type="time" value="<?php echo $cargo['job_left']?>" name="txtleft">
                  </li>
      			</div>
      					<div class="form-group">
      						<span><a href="#"><input type="button" value="Cancelar" class="btn btn-danger"></a></span>
      						<span><input type="submit" value="Submeter" class="btn btn-primary"></span>
      					</div>
      				</form>
            -->
          </br></br><h1>Multas</h1>
              <?php
                $hh=$conn->query("SELECT * FROM historytable WHERE historyUser='$login'");
                while ($his=$hh->fetch() ){
                      ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Hora Entrada</th>
                    <th>Hora Saida</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $his['historyJoin']?></td>
                    <td><?php echo $his['historyLeft']?></td>
                  </tr>
                </tbody>
              </table><?php } ?>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

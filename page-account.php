<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi cuenta</title>
  <?php include 'partials/header.php';  ?>
  <style>
    .text-white{ /* Titulo texto blanco*/
      margin-top: 20px;
      margin-bottom: 10px;
      font-size: 30px;
      color: #fff;
      font-weight: 500;
      line-height: 1.1;
      font-family: Open Sans, Arial, Helvetica, sans-serif !important;
    }
    .modal-header, .close {
      background-color: #006699;
      text-align: center;
      font-size: 30px;
    }
    .border-left{
      padding-left: 30px;
      padding-right: 30px;
      padding-bottom: 15px;
      padding-top: 10px;
      /*#007bff*/ 
      border-left: 2px solid rgb(0,102,153) !important;
      box-shadow: 0px 0px 2px 0px #999;
    }
    .nav-pills>li.active>a:hover{
      color: #fff !important;
    }
    .alert-primary{
      background: #006699 ;
    }
    /*Badge corner in media*/
    .image_with_badge_container {
      display: inline-block; /* keeps the img with the badge if the img is forced to a new line */
      position: relative;
      margin-bottom: 5px;
    }
    .badge-on-image {
      position: absolute;
      font-size: 20px;
      bottom: 2px; /* position where you want it */
      left: 2px;
      padding: 3px 6px;
    }
  </style>
</head>
<body>
  <?php 
  session_start();
  if (!file_exists("config.php")) {
      echo "<script>location.href='wizard.php';</script>";
  }
  require 'php/conexion.php';
  require 'config.php';  ?>
  <!--menu-->
  <header>
    <nav class="navbar fixed-top navbar-expand-lg  navbar-dark bg-primary">
      <a class="navbar-brand" href="#"><?php echo TITLE_APP;?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL_BLOG; ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#register">Registro</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index.php#login">Mi cuenta</a>
          </li>
        </ul>
      </div>    
    </nav>
  </header>
  <!--end menu-->
  <?php
    if(isset($_POST['numCtrolLogin']) OR isset($_SESSION['login_nc']) ){ 
      $numctrol = "";
      if(isset($_POST['numCtrolLogin'])) {
        $numctrol = mysqli_real_escape_string(getConnection(), utf8_decode($_POST['numCtrolLogin']));
      }else if(isset($_SESSION['login_nc'])){
        $numctrol = $_SESSION['login_nc'];
      }
      $sql = "SELECT * FROM participantes WHERE numCtrol='$numctrol'";
              $result = getConnection()->query($sql);
              $idAlTemp = 0;
              $idReal = 0;
              $PrimerNombre = "";
              $NombreCompleto = "";
              $NumeroCtrol = "";
              $Carrera = "";
              $Semestre = "";
              $Credito = "";
              $countWorkshops = 0;
              $countMyWorkshops = 0;

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $NombreCompleto = utf8_encode($row["nombre"]);
                  $PrimerNombre = strtok($NombreCompleto, " "); // Recorto hasta el primer espacio en blanco
                  $NumeroCtrol = utf8_encode($row["numCtrol"]);
                  $idReal = $row["idParticipante"];
                  $idAlTemp = $NumeroCtrol;
                  $idAlumno = $NumeroCtrol;
                  $idCar = $row["idCarrera"];
                  $sqlCar = "SELECT * FROM carreras WHERE idCarrera='$idCar'";
                  $resultC = getConnection()->query($sqlCar);
                  if ($resultC->num_rows > 0) {
                    while($rowC = $resultC->fetch_assoc()) {
                      $Carrera = utf8_encode($rowC["nombre"]);
                    }
                  }
                  $Semestre = utf8_encode($row["semestre"]);
                  $Credito = utf8_encode($row["credito"]);
                }

                /* Consulta nums de talleres, y evitar duplicado de taller (Si ya esta inscrito no mostrarlo)*/
                $sql = "SELECT * FROM participan WHERE idParticipante='$idReal'";
                $result = getConnection()->query($sql);
                $countMyWorkshops = $result->num_rows;
                $sql = "SELECT * FROM talleres";
                $result = getConnection()->query($sql);
                $countWorkshops = $result->num_rows;
    }else{ echo "tienes que iniciar sesion primero";}         ?>
<br><br>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card border-primary">
          <img class="card-img-top" src="images/register_now.jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Bienvenido/a <?php echo $PrimerNombre;?></h4>
            <p class="card-text">
              <div class="row">
                <!--menu-->
                <div class="col-md-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Mis datos</a>
                    <a class="nav-link" id="v-pills-talleres-tab" data-toggle="pill" href="#v-pills-talleres" role="tab" aria-controls="v-pills-talleres" aria-selected="true">Mis talleres</a>
                    <a class="nav-link" id="v-pills-registro-tab" data-toggle="pill" href="#v-pills-registro" role="tab" aria-controls="v-pills-registro" aria-selected="true">Registro a taller</a>
                    <a class="nav-link disabled" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Mis constancias</a>
                    <a class="nav-link" href="index.php">Cerrar sesion</a>
                  </div>
                </div>
                <!--end menu-->
                <div class="col-md-9">
                  <div class="tab-content border-left" id="v-pills-tabContent">
                    <!--single-->
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      <p style="padding-top: 3px;">
                      <h4>Tu nombre: </h4><input class="form-control" type="text" placeholder="<?php echo $NombreCompleto;?>" readonly>
                      <p></p>
                      <h4>Número de control: </h4><input class="form-control" type="text" placeholder="<?php echo $NumeroCtrol;?>" readonly>
                      <p></p>
                      <h4>Carrera: </h4><input class="form-control" type="text" placeholder="<?php echo strtoupper($Carrera);?>" readonly>
                      <p></p>
                      <h4>Semestre: </h4><input class="form-control" type="text" placeholder="<?php echo $Semestre;?>" readonly>
                      <br>
                      <?php if($Credito === "on"){ ?>
                      <div class="alert alert-info" role="alert">* CON SOLICITUD DE CRÉDITO COMPLEMENTARIO *</div>
                      <?php } else {?>
                      <div class="alert alert-info" role="alert">* SIN SOLICITUD DE CRÉDITO COMPLEMENTARIO *</div>
                      <?php }?>
                      </p>
                    </div>
                    <!--end single-->
                    <!--single-->
                    <div class="tab-pane fade" id="v-pills-talleres" role="tabpanel" aria-labelledby="v-pills-talleres-tab">
                      <h3>Mis talleres</h3>
                      <?php 
                      // Revisar la consulta, el idAlumno es el numero de control
                      $sql = "SELECT * FROM participan WHERE idParticipante='$idReal'";
                      $result = getConnection()->query($sql);
                      $descripcion = ""; 
                      $idRealTaller = 0;
                      $limite = -1;
                      $path = "";
                      $slug = "";
                      $taller = 0;
                      $url = "";
                      $titulo = "";
                    ?>
                    <?php 
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        $idRealTaller = $row['idTaller'];
                        //consulta a la tabla talleres para mostrar la informacion del taller al que esta inscrito
                        $sqlTaller = "SELECT * FROM talleres WHERE idTaller='$idRealTaller'";
                        $resultTaller = getConnection()->query($sqlTaller);
                        while($rowTaller = $resultTaller->fetch_assoc()) {
                          $titulo = utf8_encode($rowTaller["nombre"]);
                          $descripcion = utf8_encode($rowTaller["descripcion"]);
                          $espacios = $rowTaller["espacios"];
                          $path = utf8_encode($rowTaller["image"]);
                          $url = utf8_encode($rowTaller["blog"]);
                          $slug = utf8_encode($rowTaller["slug"]);
                          $taller++;
                          ?>
                          <div class="card bg-dark text-white">
                                  <?php if(empty($path)){ ?>
                                  <img class="card-img" src="images/default.png" alt="Card image">
                                  <?php } else { ?>
                                  <img class="card-img" src="images/<?php echo $path; ?>" alt="Card image">
                                  <?php } ?>
                                  <div class="card-img-overlay">
                                    <h4 class="card-title"> <?php echo $titulo;?> </h4>
                                    <p class="card-text"><?php echo $descripcion;?></p>
                                  </div>
                                </div>
                          <?php }}}?>
                    </div>
                    <!--end single-->
                    <!--single-->
                    <div class="tab-pane fade" id="v-pills-registro" role="tabpanel" aria-labelledby="v-pills-registro-tab">
                      <h3>Talleres activos</h3>
                      <?php 
                        $sql = "SELECT * FROM talleres ORDER BY nombre ASC";
                        $result = getConnection()->query($sql);
                        $titulo = "";
                        $descripcion = ""; 
                        $limite = -1;
                        $path = "";
                        $slug = "";
                        $taller = 0;
                        $url = "";
                      ?>
                        <?php 
                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              $titulo = utf8_encode($row["nombre"]);
                              $descripcion = utf8_encode($row["descripcion"]);
                              $espacios = $row["espacios"];
                              $path = utf8_encode($row["image"]);
                              $url = utf8_encode($row["blog"]);
                              $slug = utf8_encode($row["slug"]);
                              $taller++;
                              ?>
                                <div class="card bg-dark text-white">
                                  <?php if(empty($path)){ ?>
                                  <img class="card-img" src="images/default.png" alt="Card image">
                                  <?php } else { ?>
                                  <img class="card-img" src="images/<?php echo $path; ?>" alt="Card image">
                                  <?php } ?>
                                  <div class="card-img-overlay">
                                    <h3 class="card-title"> <?php echo $titulo;?> </h3>
                                    <p class="card-text"><h5><?php echo $descripcion;?></h5></p>
                                    <p class="card-text">
                                      <button type="button" class="btn btn-primary" id="btnEnterCode" name="<?php echo $slug; ?>" data-toggle="modal" data-target="#modalEnterCode">PARTICIPAR</button></p>
                                  </div>
                                </div>
                              <?php
                            }
                          }
                      ?>
                    </div>
                    <!--end single-->
                  </div>
                </div>
              </div>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal enter code -->
<form action="" method="" id="FormularioCode" name="FormularioCode">
  <div class="modal fade" id="modalEnterCode" name="modalEnterCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <div class="text-white"><h3 class="modal-title">Registro a taller</h3></div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="">Ingresa el código que se te proporciono al pagar:</label>
          <input type="text" name="codePSW" id="codePSW" class="form-control" placeholder="WSC-9OMI-7SH">
          <input id="idTaller" name="idTaller" hidden="true">  
        </div>
        <div class="modal-footer">
          <button type="button" id="btnCorregir" name="btnCorregir" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btnOk" name="btnOk" class="btn btn-primary" disabled="true">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- end modal enter code -->


  <?php
}
   include 'partials/footer.php'; ?>
   
  <script>
    $(function() {
      $("button").click(function() {      
        if(this.name == "btnCorregir"){
          $(':input','#modalEnterCode').val('');
          $('#btnOk').prop('disabled', true); //btn registro
        }else if(this.name == "btnOk"){
          // Ajax
        var numctrol = <?php echo $idAlumno;?>;
        var formData = {
          'slug'    : $('input[name=idTaller]').val(),
          'code'    : $('input[name=codePSW]').val(),
          'toUrl'   : 'URL_registerToWorkshop'
        };
        $.ajax({
          type        : 'POST',
          url         : 'php/postData.php',
          data        : formData,
          dataType    : 'json'
          }).done(function(data) {
            console.log(data);
            if ( ! data.success) {
              alertify.success("Ocurrió un problema. Intentalo de nuevo.");
            } else {
              alertify.success("Registrado correctamente.");
              $("#modalEnterCode").modal("hide");
              $(':input','#modalEnterCode').val('');
              location.reload();
            }
          }).fail(function(data) {
            alertify.success("Ocurrió un problema en el server.");
            console.log(data);
          });
         // end Ajax
         } else {
            // Recoger slug de taller y enviarlo al form
            $("#idTaller").val(this.name);
        }
      });
    });
  </script>
  <script>
    $(function() {
      var options =  {
        onComplete: function(cep) {
          $('#btnOk').prop('disabled', false); //btn registro
        },
        onInvalid: function(val, e, f, invalid, options){
          $('#btnOk').prop('disabled', true); //btn registro
        }
      };
      $('#codePSW').mask('AAA-0AA-AAA', options);
      $('input').keyup(function() {
        /* Cambiar a mayusculas */
        this.value = this.value.toLocaleUpperCase();
      });
    });
  </script>
</body>
</html>
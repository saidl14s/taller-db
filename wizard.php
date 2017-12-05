
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title> Instalacion de la aplicacion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/material.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
</head>

<body>

  <div class="image-container set-full-height" style="background-image: url('http://demos.creative-tim.com/material-bootstrap-wizard/assets/img/wizard-book.jpg')">
    <!--   Big container   -->
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <!-- Wizard container -->
          <div class="wizard-container">
            <div class="card wizard-card" data-color="red" id="wizard">
              <form action="main.php" method="post">
                <div class="wizard-header">
                    <h3 class="wizard-title">
                      Configuracion inicial.
                    </h3>
                    <h5>Powered by Said Llamas</h5>
                </div>
                <div class="wizard-navigation">
                  <ul>
                    <li><a href="#db" data-toggle="tab">Base de datos</a></li>
                    <li><a href="#general" data-toggle="tab">General</a></li>
                  </ul>
                </div>
                <div class="tab-content">
                  <div class="tab-pane" id="db">
                    <div class="row">
                      <div class="col-sm-12">
                        <h4 class="info-text"> Bienvenido. Antes de empezar necesitamos alguna información de la base de datos. Necesitarás saber lo siguiente antes de continuar.</h4>
                      </div>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">cloud_queue</i>
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">Nombre del servidor</label>
                            <input name="servername" type="text" class="form-control" required="true">
                          </div>
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">supervisor_account</i>
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">Usuario</label>
                            <input name="username" type="text" class="form-control" required="true" value="root">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">Contraseña</label>
                            <input name="password" type="password" class="form-control">
                          </div>
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="material-icons">edit</i>
                          </span>
                          <div class="form-group label-floating">
                            <label class="control-label">Nombre de la base de datos</label>
                            <input name="dbname" type="text" class="form-control" required="true">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="general">
                    <h4 class="info-text"> Por ultimo solo es completar la siguiente informacion.</h4>
                    <div class="row">
                      <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="material-icons">language</i>
                            </span>
                            <div class="form-group label-floating">
                              <label class="control-label">Titulo del sitio</label>
                              <input name="title" type="text" class="form-control" required="true">
                            </div>
                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="material-icons">http</i>
                            </span>
                            <div class="form-group label-floating">
                              <label class="control-label">Direccion de website</label>
                              <input name="url-blog" type="text" class="form-control" required="true">
                            </div>
                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="material-icons">http</i>
                            </span>
                            <div class="form-group label-floating">
                              <label class="control-label">Direccion de Mysql</label>
                              <input name="url-mysql" type="text" class="form-control" value="C:/xampp/mysql/bin/" required="true">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="wizard-footer">
                  <div class="pull-right">
                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Siguiente' />
                    <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Terminar' />
                  </div>
                  <div class="pull-left">
                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Atrás' />
                  </div>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div> <!-- wizard container -->
        </div>
      </div> <!-- row -->
    </div> <!--  big container -->
  </div>
</body>

</html>

  <script src="js/wizard.js"></script>
</body>
</html>

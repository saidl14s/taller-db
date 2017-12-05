<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Usuarios</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<style type="text/css" media="screen">
		.hide{
			display: none;
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
	  	require 'config.php';

	  if(isset($_SESSION['login_admin'])){
	?>
	<!--menu-->
	<header>
		<nav class="navbar fixed-top navbar-expand-lg  navbar-dark bg-primary">
			<a class="navbar-brand" href="<?php echo URL_BLOG;?>"><?php echo TITLE_APP;?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" id="nP" href="#">Participantes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nT" href="#">Actividades</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nC" href="#">Codigos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nA" href="#">Asistentes a actividades</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nAd" href="#">Administradores</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="nConfig" href="#">Extras</a>
					</li>
				</ul>
			</div>		
		</nav>
	</header>
	<!--end menu-->

	<br><br><br>

	<div class="container">
		<div class="row hide" id="admins">
			<div class="col">
				<div class="card mb-3">
					<img class="card-img-top" src="images/BANNER-ADMIN.png" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Agregar usuario</h4>
						<!--container-->
						<p class="card-text">
							<form class="center" method="POST" action="php/postData.php">
								<div class="form-group row justify-content-md-center">
									<label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
									<div class="col-sm-4">
										<input type="text" name="user" class="form-control" id="inputUser" placeholder="rishq">
									</div>
								</div>
								<div class="form-group row justify-content-md-center">
									<label for="inputName" class="col-sm-2 col-form-label">Servidor</label>
									<div class="col-sm-4">
										<input type="text" name="server" class="form-control" id="inputName" value="<?php echo SERVERNAME?>">
									</div>
								</div>
								<div class="form-group row justify-content-md-center">
									<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
									<div class="col-sm-4">
										<input type="password" name="pass" class="form-control" id="inputPassword" placeholder="12345">
									</div>
								</div>
								<div class="form-group row justify-content-md-center">
									<label for="staticEmail" class="col-sm-2 col-form-label">DB Name</label>
									<div class="col-sm-4">
										<input type="text" name="db" class="form-control" value="<?php echo DBNAME;?>">
									</div>
								</div>
								<div class="row justify-content-md-center">
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox1" value="ALTER"> Alter
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox2" value="CREATE"> Create
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox2" value="DELETE"> Delete
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox2" value="SELECT"> Select
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox2" value="UPDATE"> Update
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox2" value="INSERT"> Insert
										</label>
									</div>
									<div class="form-check form-check-inline">
										<label class="form-check-label">
											<input class="form-check-input" name="permissions[]" type="checkbox" id="inlineCheckbox2" value="DROP"> Drop
										</label>
									</div>
								</div>
								<input type="hidden" name="toUrl" value="URL_createAdmin">
								<div class="row justify-content-md-center">
									<button class="btn btn-primary" type="submit">Agregar usuario</button>	
								</div>
							</form>
						</p>
						<h4 class="card-title">Eliminar usuario</h4>
						<!--container-->
						<p class="card-text">
							<form class="center" method="POST" action="php/postData.php">
								<div class="form-group row justify-content-md-center">
									<label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
									<div class="col-sm-4">
										<select class="custom-select" name="user">
											<?php 
												$sql = "select * from mysql.user";
												$result = getConnection()->query($sql);

												if ($result->num_rows > 0) {
                      								while($row = $result->fetch_assoc()) {
                      									?>
                      									<option value="<?php echo $row['User']; ?>"><?php echo $row['User']; ?></option>
                      									<?php
                      								}
                      							}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row justify-content-md-center">
									<label for="inputUser" class="col-sm-2 col-form-label">Servidor</label>
									<div class="col-sm-4">
										<select class="custom-select" name="server">
											<?php 
												$sql = "select * from mysql.user";
												$result = getConnection()->query($sql);

												if ($result->num_rows > 0) {
                      								while($row = $result->fetch_assoc()) {
                      									?>
                      									<option value="<?php echo $row['Host']; ?>"><?php echo $row['Host']; ?></option>
                      									<?php
                      								}
                      							}
											?>
										</select>
									</div>
								</div>
								<input type="hidden" name="toUrl" value="URL_deleteAdmin">
								<div class="row justify-content-md-center">
									<button class="btn btn-danger" type="submit">Eliminar usuario</button>	
								</div>
							</form>
						</p>
						<!--end container-->
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="participantes">
			<div class="col">
				<div class="card mb-3">
					<img class="card-img-top" src="images/BANNER-ADMIN.png" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Participantes</h4>
						<!--container-->
						<p class="card-text">
							<!--table alumnos-->
                        	<table id="tableAlumnos" class="display" cellspacing="0" width="100%">
	                          	<thead>
						            <tr>
						                <th>Nombre</th>
						                <th>Número de control</th>
						                <th>Carrera</th>
						                <th>Semestre</th>
						                <th>Credito</th>
						                <th>Acciones</th>
						            </tr>
						        </thead>
						        <tbody>
							        <?php 
								        $sql = "SELECT * FROM participantes";
								    	$result = getConnection()->query($sql);

								    	if ($result->num_rows > 0) {
								    		while($row = $result->fetch_assoc()) { ?>
								    			<!--single tupla-->
								            	<tr>
								            		<form action="php/postData.php" method="post">
								            			<input type="hidden" name="toUrl" value="URL_controlsParticipantes">
								                	<td><?php echo utf8_encode($row["nombre"]); ?></td>
									                <td><?php echo utf8_encode($row["numCtrol"]); ?></td>
									                <td><?php echo utf8_encode($row["idCarrera"]); ?></td>
									                <td><?php echo utf8_encode($row["semestre"]); ?></td>
									                <td><?php echo utf8_encode($row["credito"]); ?></td>
									                <td><button type="submit" value="<?php echo utf8_encode($row['idParticipante']); ?>" name="editarAsistente" class="btn btn-info">E</button>
									                <button type="submit" value="<?php echo utf8_encode($row['idParticipante']); ?>" name="eliminarAsistente" class="btn btn-danger">D</button></td>
									                </form>
								            	</tr>
								            	<!--end single tupla-->
								    		<?php 
								    		}//while resultados
							    		}//if > 0
							    	?>
						        </tbody>
				           	</table>
	                    	<!--end table alumnos-->
						</p>
						<!--end container-->
					</div>
				</div>
			</div>
		</div>
		<div class="row hide" id="talleres">
			<div class="col">
				<div class="card mb-3">
					<img class="card-img-top" src="images/BANNER-ADMIN.png" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Talleres</h4>
						<!--container-->
						<p class="card-text">
							<!--table talleres-->
                        	<table id="tableTalleres" class="display" cellspacing="0" width="100%">
	                          	<thead>
						            <tr>
						                <th>Nombre</th>
						                <th>Slug</th>
						                <th>Espacios</th>
						                <th width="10%">Acciones</th>
						            </tr>
						        </thead>
						        <tbody>
							        <?php 
								        $sql = "SELECT * FROM talleres";
								    	$result = getConnection()->query($sql);

								    	if ($result->num_rows > 0) {
								    		while($row = $result->fetch_assoc()) { ?>
								    			<!--single tupla-->
								            	<tr>
								            		<form action="php/postData.php" method="post">
										            	<input type="hidden" name="toUrl" value="URL_controlsActividades">
										                <td><?php echo utf8_encode($row["nombre"]); ?></td>
										                <td><?php echo utf8_encode($row["slug"]); ?></td>
										                <td><?php echo utf8_encode($row["espacios"]); ?></td>
										                <td><button type="submit" value="<?php echo utf8_encode($row['idTaller']); ?>" name="eliminarActividad" class="btn btn-danger">D</button></td>
									                </form>
									            </tr>
								            	<!--end single tupla-->
								    		<?php 
								    		}//while resultados
							    		}//if > 0
							    	?>
						        </tbody>
				           	</table>
	                    	<!--end table talleres-->

	                    	<br><br>
	                    	<form action="php/postData.php" method="post">
	                    		<div class="text-center">
                    				<span> <h5>Agregar actividad</h5></span>
                    			</div>
                    			<br>
	                    		<div class="row">
	                    			<div class="col-sm-6">
	                    				<div class="form-group">
									    	<label for="exampleInputEmail1">Titulo de actividad</label>
									    	<input onkeyup="setSlug(this.value)" type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Analisis de algoritmos">
									  	</div>
									  	<div class="form-group">
									    	<label for="exampleInputEmail1">Descripcion</label>
									    	<input type="text" class="form-control" id="exampleInputEmail1" 
									    	name="txtDescription" placeholder="Ven y aprender sobre metodos de ordenamiento y diversas estructuras de datos">
									  	</div>
									  	<div class="form-group">
									    	<label for="exampleInputEmail1">SLUG (no modificar)</label>
									    	<input type="text" id="textSlug" class="form-control" name="slug" placeholder="arduino-asd1" readonly="true">
									  	</div>
	                    			</div>
	                    			<input type="hidden" name="toUrl" value="URL_createActivity">
	                    			<div class="col-sm-6">
	                    				<div class="form-group">
									    	<label for="exampleInputEmail1">Espacios</label>
									    	<input type="number" name="txtEspacio" class="form-control" value="20">
									  	</div>
									  	<div class="form-group">
									    	<label for="exampleInputEmail1">Imagen</label>
									    	<select class="selectpicker" name="image">
		                        			<?php
		                        				$directorio = DIRECTORIO_DB . "../php/img-workshops"; //ruta actual
												while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
												{
												    if (!is_dir($archivo))
												    {
												        ?> <option data-tokens="<?php echo $archivo ; ?>" value="<?php echo $archivo ; ?>"> <?php echo $archivo ; ?> </option> <?php
												    }
												}
		                        			?>
		                        		</select>
									  	</div>
									  	<div class="form-group">
									    	<label for="exampleInputEmail1">Direccion de publicacion</label>
									    	<input type="text" name="txtURL" class="form-control" placeholder="http://images.com/sa.png">
									  	</div>
	                    			</div>
	                    		</div>
	                    		<br>
	                    		<div class="row">
	                    			<div class="col-sm-3 offset-sm-9">
	                    				<button type="submit" class="btn btn-primary btn-block">Agregar</button>
	                    			</div>
	                    		</div>
	                    	</form>
						</p>
						<!--end container-->
					</div>
				</div>
			</div>
		</div>
		<div class="row hide" id="codigos">
			<div class="col">
				<div class="card mb-3">
					<img class="card-img-top" src="images/BANNER-ADMIN.png" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Codigos</h4>
						<!--container-->
						<p class="card-text">
							<!--table talleres-->
                        	<table id="tableCodigos" class="display" cellspacing="0" width="100%">
	                          	<thead>
						            <tr>
						                <th>Clave</th>
						                <th>Notas</th>
						                <th>Valido</th>
						                <th width="10%">Acciones</th>
						            </tr>
						        </thead>
						        <tbody>
							        <?php 
								        $sql = "SELECT * FROM codigos";
								    	$result = getConnection()->query($sql);
								    	if ($result->num_rows > 0) {
								    		while($row = $result->fetch_assoc()) { ?>
								    			<!--single tupla-->
								            	<tr>
								            		<form action="php/postData.php" method="post">
									            		<input type="hidden" name="toUrl" value="URL_controlsCodigos">
										                <td><?php echo utf8_encode($row["clave"]); ?></td>
										                <td><?php echo utf8_encode($row["nota"]); ?></td>
										                <td><?php echo utf8_encode($row["valido"]); ?></td>
										                <td><button type="submit" value="<?php echo utf8_encode($row['idCodigo']); ?>" name="eliminarCodigo" class="btn btn-danger">D</button></td>
									                </form>
									            </tr>
								            	<!--end single tupla-->
								    		<?php 
								    		}//while resultados
							    		}//if > 0
							    	?>
						        </tbody>
				           	</table>
	                    	<!--end table talleres-->

	                    	<br><br>
	                    	<form action="php/postData.php" method="post">
	                    		<div class="text-center">
                    				<span> <h5>Agregar codigos</h5></span>
                    			</div>
                    			<br>
	                    		<div class="row">
	                    			<div class="col-sm-6">
	                    				<div class="form-group">
									  		<label for="exampleInputEmail1">Cantidad</label>
		                        			<select class="form-control" id="codesCantidad" onchange="generateCodes(this);">
		                        				<option>Seleccionar</option>
				                        		<option value="1">Generar 1</option>
				                        		<option value="10">Generar 10</option>
				                        		<option value="30">Generar 30</option>
				                        		<option value="50">Generar 50</option>
				                        	</select>
										</div>
									  	<div class="form-group">
									    	<label for="exampleInputEmail1">Notas</label>
									    	<input type="text" class="form-control" id="exampleInputEmail1" 
									    	name="description" placeholder="Responsabe: María">
									  	</div>
	                    			</div>
	                    			<div class="col-sm-6">
	                    				<div class="form-group">
									    	<label for="exampleInputEmail1">Clave</label>
									    	<textarea id="viewCodes" name="viewCodes" rows="6" class="form-control" id="exampleInputEmail1" placeholder="ERC-34S-RF3" ></textarea>
									  	</div>
	                    			</div>
	                    			<input type="hidden" name="toUrl" value="URL_createCode">
	                    		</div>
	                    		<br>
	                    		<div class="row">
	                    			<div class="col-sm-3 offset-sm-9">
	                    				<button type="submit" class="btn btn-primary btn-block">Agregar</button>
	                    			</div>
	                    		</div>
	                    	</form>

						</p>
						<!--end container-->
					</div>
				</div>
			</div>
		</div>
		<div class="row hide" id="asistencia">
			<div class="col">
				<div class="card mb-3">
					<img class="card-img-top" src="images/BANNER-ADMIN.png" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Asistentes a talleres</h4>
						<!--container-->
						<p class="card-text">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
								    	<label for="exampleInputEmail1">Actividad</label>
								    	<select class="form-control slTaller" name="slTaller" id="slTaller">
								    		<option value="">Seleccionar una actividad</option>
								    		<?php 
										        $sql = "SELECT * FROM talleres";
										    	$result = getConnection()->query($sql);

										    	if ($result->num_rows > 0) {
										    		while($row = $result->fetch_assoc()) { ?>
								    				<option value="<?php echo $row['idTaller']; ?>"><?php echo $row['nombre']; ?></option>
								    				<?php }
								    			}?>
								    	</select>
								  	</div>
								  	<div class="form-group">
								    	<button class="btn btn-primary btn-block" onclick="printAsistentes();">Imprimir</button>
								  	</div>
								</div>
								<div class="col-sm-6">
									<textarea name="tableResultsAsis" id="tableResultsAsis" class="form-control" id="" style="width: 100%" rows="5" readonly="true"></textarea>
								</div>
							</div>
						</p>
						<!--end container-->
					</div>
				</div>
			</div>
		</div>
		<div class="row hide" id="configuracion">
			<div class="col">
				<div class="card mb-3">
					<img class="card-img-top" src="images/BANNER-ADMIN.png" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Configuracion</h4>
						<!--container-->
						<hr>
						<p class="card-text">
							<form action="php/postData.php" method="post">
								<input type="hidden" name="toUrl" value="URL_generateBK">
								<input type="hidden" name="id" value="1">
								<button type="submit" class="btn btn-primary">Generar BK</button>
							</form>
							<br>
							<form action="php/postData.php" method="post">
								<input type="file" name="file" class="form-control">
								<input type="hidden" name="toUrl" value="URL_generateBK">
								<input type="hidden" name="id" value="2">
								<button type="submit" class="btn btn-primary">Restaurar BK</button>
							</form>
						</p>
						<hr>
						<p class="card-text">
							<form action="php/postData.php" method="POST" >
								<input type="hidden" name="testProcedures" value="URL_getAllRegisters">
								<input class="btn btn-primary" type="submit" name="S" value="Procedimientos">
							</form>
						</p>
						<!--end container-->
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="myjs/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript" charset="utf-8">
		$("#nAd").click(function(){
		    $("#talleres").hide();
		    $("#codigos").hide();
		    $("#asistencia").hide();
		    $("#participantes").hide();
		    $("#configuracion").hide();
		    $("#admins").show();
		});
		$("#nP").click(function(){
			$("#admins").hide();
		    $("#talleres").hide();
		    $("#codigos").hide();
		    $("#asistencia").hide();
		    $("#configuracion").hide();
		    $("#participantes").show();
		});
		$("#nT").click(function(){
			$("#admins").hide();
		    $("#codigos").hide();
		    $("#asistencia").hide();
		    $("#participantes").hide();
		    $("#configuracion").hide();
		    $("#talleres").show();
		});
		$("#nC").click(function(){
			$("#admins").hide();
		    $("#asistencia").hide();
		    $("#participantes").hide();
		    $("#talleres").hide();
		    $("#configuracion").hide();
		    $("#codigos").show();
		});
		$("#nA").click(function(){
			$("#admins").hide();
		    $("#participantes").hide();
		    $("#talleres").hide();
		    $("#codigos").hide();
		    $("#configuracion").hide();
		    $("#asistencia").show();
		});
		$("#nConfig").click(function(){
			$("#admins").hide();
		    $("#participantes").hide();
		    $("#talleres").hide();
		    $("#codigos").hide();
		    $("#asistencia").hide();
		    $("#configuracion").show();
		});
	</script>
	<script>
	$(document).ready(function() {  	
		$('#tableAlumnos').dataTable( {
            language: {
			    "sProcessing":     "Procesando...",
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Buscar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
			}
        });

         $('#tableTalleres').dataTable({
    	"language": {
			    "sProcessing":     "Procesando...",
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Buscar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
			}
    	});
         $('#tableCodigos').dataTable({
    	"language": {
			    "sProcessing":     "Procesando...",
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Buscar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
			}
    	});
	});
</script>
<script type="text/javascript">
	$(function(){
        $("#slTaller").on("change", function(){
        	var formData = {
	            'idTaller'		: $('select[name=slTaller]').val(),
	            'toUrl'			: 'URL_consultaAsistentes'
	        };
	       $.ajax({
		        url         : 'php/postData.php',
		        type: 'POST',
		        data: formData,
		        success: function(data) {
		            $('#tableResultsAsis').empty().append(data);
		        },
		        error: function(result) {
                    alert("Data not found");
                }
		    });
	    });
	});

	function generateCodes(selectObject){
		var iteraciones = selectObject.value;
		var codes = "";
		for (var i = 0; i < iteraciones; i++) {
			codes += generarPSW();
			codes += '\n';
		}
		viewCodes = document.getElementById("viewCodes");
		viewCodes.value = codes;
	}

	function rand_code(chars, lon){
		code = "";
		for (x=0; x < lon; x++){
			rand = Math.floor(Math.random()*chars.length);
			code += chars.substr(rand, 1);
		}
		return code;
	}
	
	function generarPSW() {
		caracteres = "WA1BC3DEF5GHIJK7LMS9PQVZ";
		psw1 = rand_code(caracteres, 3);
		psw2 = rand_code(caracteres, 2);
		psw3 = rand_code(caracteres, 3);
		randNumber = rand_code("246", 1);

		return psw1+"-"+randNumber+psw2+"-"+psw3;
	}	

	function setSlug(text){
		textSlug = document.getElementById("textSlug");
		textSlug.value = slugify(text) + "-"+rand_code("ACUWSMPUW", 2);
	}

	function slugify(text){
		return text.toString().toLowerCase()
	    .replace(/\s+/g, '-')           // Replace spaces with -
	    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
	    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
	    .replace(/^-+/, '')             // Trim - from start of text
	    .replace(/-+$/, '');            // Trim - from end of text
	}
</script>

<script>
	function printAsistentes(){
		var mywindow = window.open('', 'PRINT', 'height=400,width=600');
		var t = $("#slTaller option:selected").text();
	    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
	    mywindow.document.write('</head><body >');
	    mywindow.document.write('<h1>Asistentes a: '+t+'</h1>');
	    mywindow.document.write(document.getElementById('tableResultsAsis').innerHTML);
	    mywindow.document.write('</body></html>');

	    mywindow.document.close(); // necessary for IE >= 10
	    mywindow.focus(); // necessary for IE >= 10*/

	    mywindow.print();
	    mywindow.close();
    }
</script>

<?php
}else{ echo "<script>location.href='page-login.php';</script>"; }
?>
</body>
</html>
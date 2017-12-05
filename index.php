<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>	Registro</title>
	<?php include 'partials/header.php';  ?>
</head>
<body>
	<?php 
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
	        <a class="nav-link" href="<?php echo URL_BLOG ?>">Inicio</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="#register">Registro</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#login">Mi cuenta</a>
	      </li>
	    </ul>
	  </div>		
	</nav>
	</header>
	<!--end menu-->
	

	<br><br>	

<!-- My content -->
<div class="container">
	<!--section 1-->
	<div class="row">
		<div class="col">
			<div class="card" id="register">
				<img class="card-img-top" src="images/register_now.jpg" alt="Card image cap">
				<div class="card-body">
					<h4 class="card-title"> Registrate</h4>
					<p class="card-text">
						<!--<form method="post" action="php/postData.php" name="formRegistro" id="formRegistro" data-toggle="validator" role="form">-->
							<form method="post" action="php/postData.php">
							<p>
								<div class="row">
									<div class="col">
										<label class="control-label col-md-10" for="numCtrol">Número de control:</label>
										<div class="col-md-10">
											<input id="numCtrol" name="numCtrol" class="form-control" min="9290000" max="17299999" placeholder="15290903" aria-describedby="basic-addon2" type="number" disabled="true" required="true">
										</div>
									</div>
									<div class="col">
										<label class="control-label col-md-10" for="Nombre">Nombre(s):</label>
										<div class="col-md-10"> 
											<input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="TOMÁS JOSÉ" aria-describedby="basic-addon2" disabled="true" required="true" minlength="3" autofocus>
										</div>
									</div>
								</div>
							</p>
							<!--row2-->
							<p>
								<div class="row">
									<div class="col">
										<label class="control-label col-md-10" for="ApellidoP">Apellido paterno:</label>
										<div class="col-md-10">
											<input type="text" id="ApellidoP" name="ApellidoP" class="form-control" placeholder="ACEVEDO" aria-describedby="basic-addon2" disabled="true" required="true" minlength="3">
										</div>
									</div>
									<div class="col">
										<label class="control-label col-md-10" for="ApellidoM">Apellido materno:</label>
				              			<div class="col-md-10"> 
				              				<input type="text" id="ApellidoM" name="ApellidoM" class="form-control" placeholder="MEJÍA" aria-describedby="basic-addon2" disabled="true" required="true" minlength="3">
				          				</div>
									</div>
								</div>
							</p>
							<!--row3-->
							<p>
								<div class="row">
									<div class="col">
										<label class="control-label col-md-10" for="Carrera">Carrera:</label>
				  						<div class="col-md-10">
				  							<select class="form-control disableToggle" id="Carrera" name="Carrera" required="true" disabled="true">
				  							<?php 
										    	$sql = "SELECT * FROM carreras";
										    	$result = getConnection()->query($sql);
										    	if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) { ?>
														<option value="<?php echo $row["idCarrera"]; ?>"><?php echo utf8_encode($row["nombre"]); ?></option>
											<?php
													}
												}
										    ?>
											</select>
										</div>
									</div>
									<div class="col">
										<label class="control-label col-md-10" for="Semestre">Semestre:</label>
										<div class="col-md-10"> 
											<select class="form-control disableToggle" id="Semestre" name="Semestre" required="true" disabled="true">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
											</select>
				              			</div>
									</div>
								</div>
							</p>
							<!--row4-->
							<p>
								<div class="row">
									<div class="col">
										<div class="col-md-12">
											<label></label>
				                			<div class="checkbox">
				                  				<label><input type="checkbox" disabled="true" id="chCredito" name="chCredito"> Solicitar crédito complementario (ACADÉMICO)</label>
				              				</div>
			              				</div>
			              				<input type="hidden" name="toUrl" value="URL_registerParticipante">
									</div>
									<div class="col">
										<div class="col-md-5 offset-md-3">
											<label></label>
				      						<button type="submit" class="btn btn-primary btn-block" data-toggle="modal" disabled="true">Registrar</button>

				      					</div>
									</div>
								</div>
							</p>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<br>


	<!-- Section 2-->
	<div class="row" id="login">
		<div class="col">
			<div class="card">
				<img class="card-img-top" src="images/access.jpg" alt="Card image cap">
				<div class="card-body">
					<h4 class="card-title"> Inicia sesion</h4>
					<p class="card-text">
						<form action="page-account.php" method="POST" name="formLogin" id="formLogin">
							<p>
								<div class="row">
									<div class="col">
										<label class="control-label col-md-4" for="numCtrolLogin">Número de control:</label>
										<div class="col-md-10">
											<input id="numCtrolLogin" class="form-control" name="numCtrolLogin" placeholder="15290903" aria-describedby="basic-addon2" type="text" required="true">
										</div>
									</div>
									<div class="col">
										<label></label>
										<div class="col-md-5  offset-md-3">
											<button type="submit" class="btn btn-primary btn-block">Iniciar</button>
										</div>
									</div>
								</div>
							</p>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>

	<form action="php/postData.php" method="post">
		<!--<input type="hidden" name="testTrans" value="">-->
		<input type="hidden" name="testTriggers" value="">
		<button class="btn btn-primary" type="submit">Submit</button>
	</form>
</div>
<!-- end container -->

<!-- Modal confirm data -->
<div class="modal fade" id="modalConfirm" name="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
	    <div class="modal-header" style="padding:35px 50px;">
	    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	    	<span class="text-white">Verifica tu información</span>
	    </div>
	    <div class="modal-body">
	      <h3>Nombre: <b><span id="cNombre"></span></b></h3>
	      <h3>Número de control: <b><span id="cNumCtrol"></span></b></h3>
	      <h3>Carrera: <b><span id="cCarrera"></span></b></h3>
	      <h3>Semestre: <b><span id="cSemestre"></span></b></h3>
	      <h3><b><span id="msjCredito"></span></b></h3>
	    </div>
	    <div class="modal-footer">
	      <button type="button" id="btnCorregir" name="btnCorregir" class="btn btn-default" data-dismiss="modal">Corregir</button>
	      <button type="button" id="btnOk" name="btnOk" class="btn btn-primary">Registrar</button>
	    </div>
	  </div>
	</div>
</div>
<!--end modal confirm data-->

<br><br><br><br><br><br> <!--espaciado a footer-->
</body>

<?php include 'partials/footer.php'; ?>

<script type="text/javascript">
	$(function() {
		$('input').keyup(function() {
			/* Cambiar a mayusculas */
			this.value = this.value.toLocaleUpperCase();
		});
  		$('#numCtrol').keyup(function() {
  				$('#Nombre').attr('disabled', false); //todos los campos
  				$('#ApellidoP').attr('disabled', false); //todos los campos
  				$('#ApellidoM').attr('disabled', false); //todos los campos
  				$('#Semestre').attr('disabled', false); //todos los campos
  				$('#Carrera').attr('disabled', false); //todos los campos
	  			$('.disableToggle').prop('disabled', false); //los select
	  			$('#chCredito').attr('disabled', false); //todos los campos
	  			$('button').prop('disabled', false); //btn registro
  		});
  		
  		/*$('#btnOk').on('click', function (e) {
  			var credito = "NO";
  			var name = $("#Nombre").val();
	    	name = name.concat(" ");
	    	var app = $("#ApellidoP").val();
	    	app = app.concat(" ");
	    	var apm = $("#ApellidoM").val();
	    	var nameComplete = name.concat(app, apm);
  			if( $('#chCredito').is(':checked') ) {
    			credito = "SI";
			}
  			var formData = {
  				'numCtrol'		: $('input[name=numCtrol]').val(),
	            'Nombre'		: nameComplete,
	            'Credito'		: credito,
	            'Carrera'		: $('select[name=Carrera]').val(),
	            'Semestre'		: $('select[name=Semestre]').val()
	        };
	        $.ajax({
	            type        : 'POST',
	            url         : 'php/postData.php',
	            data        : formData,
	            dataType    : 'json',
                encode		: true
	        }).done(function(data) {
	        	console.log(data);
                if ( ! data.success) {
                	if( data.errores){
                		alertify.success("Ocurrió un problema. El número de control ya está registrado.");
                	}else {
                		alertify.success("Ocurrió un problema. Intentalo de nuevo.");
                	}
                } else {
                	alertify.success("Registrado correctamente.");
  					$("#modalConfirm").modal("hide");
					$(':input','#formRegistro')
					.not(':button, :submit, :reset, :hidden')
					.val('')
					.removeAttr('checked')
					.removeAttr('selected');
                }
            }).fail(function(data) {
            	alertify.success("Ocurrió un problema en el server.");
		        console.log(data);
		    });
  			
		})
*/
		alertify.confirm("Aviso" , "Una vez registrado NO podrás modificar tus datos ¡Revísalos bien!",
  		function(){
  			alertify.success('Ingresa primero tu número de control y después llena los demás campos.');
  			$('#numCtrol').attr('disabled', false); // campo del numero de control
  			//$('.disableToggle').prop('disabled', false); //los select
  			//$('button').prop('disabled', false); //btn registro
  		},
  		function(){
    		alertify.error('No puedes continuar, recarga la página y acepta las indicaciones.');
	});

	/* Limpiar valores en los inputs para evitar reenvio de info*/
	$(':input','#formRegistro')
	.not(':button, :submit, :reset, :hidden')
	.val('')
	.removeAttr('checked')
	.removeAttr('selected'); 

	/* Validaciones */
	$("#formRegistro").validate({
		rules: { },
		onsubmit: true,
		focusInvalid: true,
		validClass: "success",
		messages:{
			Nombre:{
				required:"Es importante que rellenes este campo.",
				minlength : "No parece ser tu nombre."
      		},
      		ApellidoP:{
      			required:"Es importante que rellenes este campo.",
      			minlength : "No parece ser tu apellido."
  			},
  			ApellidoM:{
  				required:"Es importante que rellenes este campo.",
  				minlength : "No parece ser tu apellido."
			},
			Semestre:{
				required:"Es importante que elijas una opción. "
			},
			Carrera:{
				required:"Es importante que elijas una opción. "
			},
			numCtrol: {
		        required: "Es importante que rellenes este campo.",
		        min: "Este no parece ser un número de control valido.",
		        max: "Este no parece ser un número de control valido."
		    }
	    },
	    submitHandler: function(form) {
	    	var nCtrl = $("#numCtrol").val(); 
	    	var name = $("#Nombre").val();
	    	name = name.concat(" ");
	    	var app = $("#ApellidoP").val();
	    	app = app.concat(" ");
	    	var apm = $("#ApellidoM").val();
	    	var nameComplete = name.concat(app, apm);
	    	var carrera = $("#Carrera").val();
	    	var semestre = $("#Semestre").val();
	    	$('#cNombre').html(nameComplete);
	    	$('#cNumCtrol').html(nCtrl);
	    	$('#cCarrera').html(carrera);
	    	$('#cSemestre').html(semestre);
	    	if( $('#chCredito').is(':checked') ) {
    			$('#msjCredito').html("CON SOLICITUD DE CRÉDITO");
			} else {
				$('#msjCredito').html("SIN SOLICITUD DE CRÉDITO");
			}
			$('#modalConfirm').modal('toggle'); 
		},
		invalidHandler: function(event, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				alertify.alert('Atencion', 'Hay un problema con la informacion, revisala');
			}
		}
	})

	$("#formLogin").validate({
		rules: { },
	    messages:{
	    	numCtrolLogin: {
	    		required: "Es importante que rellenes este campo.",
		        min: "Este no parece ser un número de control valido.",
		        max: "Este no parece ser un número de control valido."
	      	}
	   	}
	})
	});
</script>

</body>
</html>
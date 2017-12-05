<?php
	require 'conexion.php';
	require '../config.php';

	$errores = array();      // array de errores
	$data    = array();      // array de informacion

	foreach ($_POST as $name => $value){
		if($name == 'toUrl'){
			if($value == 'URL_registerParticipante'){
				$numctrol = sanitize($_POST['numCtrol']);
				$nombre = sanitize($_POST['Nombre']) . " ". sanitize($_POST['ApellidoP']) . " ". sanitize($_POST['ApellidoM']);
				$carrera = sanitize($_POST['Carrera']);
				$semestre = sanitize($_POST['Semestre']);
				$credito = sanitize($_POST['chCredito']);
				$sqlValidacion = "SELECT numCtrol FROM participantes WHERE numCtrol='$numctrol'";
				$resultVal = getConnection()->query($sqlValidacion);

				if ($resultVal->num_rows > 0) { // Si se encuentra el numero de control entonces cerrar el paso
				    //numctrol ya registrado
		        	echo "Error, esta matricula ya se encuentra registrada. ". getConnection()->errno;
				} else { // Si no esta registrado entonces registrar
				    $sql = "INSERT INTO participantes (idParticipante, numCtrol, nombre, idCarrera, semestre, credito)
						VALUES ('NULL','$numctrol', '$nombre', '$carrera','$semestre','$credito')";
					if (getConnection()->query($sql) === TRUE) {
			        	session_start();
						$_SESSION['login_nc'] = $numctrol;  // Initializing Session with value of PHP Variable
						echo "<script>location.href='../page-account.php';</script>";
					} else {
						//error durante el registro
			        	echo "error2: " . getConnection()->errno;
					}
				}
			}else if($value == 'URL_registerToWorkshop'){
				session_start();
				$numctrol = $_SESSION['login_nc'];
				$taller = sanitize($_POST['slug']);
				$code = sanitize($_POST['code']);

				// revisar idParticipante
				$sqlIdParticipante = "SELECT idParticipante FROM participantes WHERE numCtrol='$numctrol'";
				$resultID = getConnection()->query($sqlIdParticipante);
				$rowID = $resultID->fetch_assoc();
				$idParts = $rowID['idParticipante'];
				$sqlIdT = "SELECT idTaller FROM talleres WHERE slug='$taller'";
				$resultT = getConnection()->query($sqlIdT);
				$rowIDT = $resultT->fetch_assoc();
				$idT = $rowIDT['idTaller'];
				$sqlIdC = "SELECT idCodigo FROM codigos WHERE clave='$code'";
				$resultC = getConnection()->query($sqlIdC);
				$rowIDC = $resultC->fetch_assoc();
				$idC = $rowIDC['idCodigo'];

				// Validacion de codigo existente y activo
				$sqlValidacion = "SELECT clave FROM codigos WHERE clave='$code' AND valido='SI'";
				$resultVal = getConnection()->query($sqlValidacion);
				// Validacion de espacio en taller
				$sqlValidacion2 = "SELECT * FROM talleres WHERE espacios > 0 AND slug = '$taller'";
				$resultVal2 = getConnection()->query($sqlValidacion2);
				$rowEspacio = $resultVal2->fetch_assoc();
				$newSpace = $rowEspacio['espacios'];
				$newSpace--;
				$fechaR = date("Y-m-d");

				if ($resultVal->num_rows > 0) { // Si se encuentra el numero de control entonces cerrar el paso
					if ($resultVal2->num_rows > 0) { // Verifico el espacio en taller
					    $sql = "INSERT INTO participan (idParticipante, idTaller, idCodigo, fechaRegistro, asistencia)
							VALUES ('$idParts', '$idT', '$idC','$fechaR','')";
						// reducir en 1 el espacio del taller cuando se inscribe
			        	$sqlEspacio = "UPDATE talleres SET espacios='$newSpace' WHERE slug='$taller'";
			        	// inhabilitar el codigo usado
			        	$sqlCode = "UPDATE codigos SET valido='NO' WHERE clave='$code'";
						if (getConnection()->query($sql) === TRUE && getConnection()->query($sqlEspacio) === TRUE && getConnection()->query($sqlCode) === TRUE) {
			        		$data['success'] = true;
			        		$data['message'] = 'Datos recibidos y almacenados correctamente';
						} else {
						    $data['success']  = false;
				        	$data['errores']  = getConnection()->errno;
						}
					}else{
						$data['success']  = false;
		        		$data['errores']  = "No hay espacio en el taller.";
					}
				} else { // Si no existe el codigo marcar error
					//error
					$data['success']  = false;
		        	$data['errores']  = "Codigo invalido.";
					//error
				}
				echo json_encode($data);
			} else if($value == 'URL_loginAdmin'){
				$user = sanitize($_POST['username']);
				$pass = sanitize($_POST['password']);
				$server = sanitize($_POST['servername']);

				$sqlValidacion = "SELECT Host, User, Password FROM mysql.user WHERE User='$user' AND Password=password('$pass') AND Host='$server'";
				$resultVal = getConnection()->query($sqlValidacion);
				if ($resultVal->num_rows > 0) {
					session_start();
					$_SESSION['login_admin'] = $user;  // Initializing Session with value of PHP Variable
					echo "<script>location.href='../page-dashboard.php';</script>";
				}else{
					echo "<script>location.href='../page-login.php';</script>";
				}
			} else if($value == 'URL_createAdmin'){
				$dbName =  $_POST['db'];
				$pass =  $_POST['pass'];
				$user =  $_POST['user'];
				$server =  $_POST['server'];
				//transaction
				getConnection()-> autocommit(false);
				try{					
					$sql = "CREATE USER '" . $user . "'@'" . $server . "' IDENTIFIED BY '" . $pass . "'";
					if (getConnection()->query($sql) === TRUE) {
						echo "Usuario creado";
					} else {
					    echo "Error al crear usuario: " . $sql . "<br>" . getConnection()->errno;
					}
					
					$permisos = "";
					foreach($_POST['permissions'] as $value){
						$permisos .= "".$value.",";
					}
					$permisos = substr($permisos,0,-1);  //eliminar ultima ,
					
					//permiso general
					
					$sql = "GRANT ".$permisos." ON  * . * TO '" .$user. "'@'" . $server . "'";
					if (getConnection()->query($sql) === TRUE) {
					    echo "Privilegios asignados correctamente.";
					} else {
					    echo "Error al dar privilegios: " . $sql2 . "<br>" . getConnection()->errno;
					}

					
					$sql = "GRANT ".$permisos." ON " .$dbName. " . * TO '" .$user. "'@'" . $server . "'";
					if (getConnection()->query($sql) === TRUE) {
					    echo "Privilegios asignados correctamente.";
					} else {
					    echo "Error al dar privilegios: " . $sql . "<br>" . getConnection()->errno;
					}
					getConnection()->commit();
				} catch(Exception $e){
					getConnection()->rollback();
					echo $e->getMessage();
				}
			} else if($value == 'URL_deleteAdmin'){
				$user =  $_POST['user'];
				$server =  $_POST['server'];
				$sql = "DROP USER '". $user . "'@'". $server ."'";
				//transaction
				getConnection()-> autocommit(false);
				try{
					if (getConnection()->query($sql) === TRUE) {
						echo "Usuario eliminado";
					} else {
					    echo "Error al eliminar usuario: " . $sql . "<br>" . getConnection()->errno;
					}
					getConnection()->commit();
				} catch(Exception $e){
					getConnection()->rollback();
					echo  $e->getMessage();
				}
			} else if($value == 'URL_consultaAsistentes'){
				$idTaller = $_POST['idTaller'];
		        $sql = "SELECT * FROM participan WHERE idTaller='$idTaller'";
		        $result = getConnection()->query($sql);

		        if ($result->num_rows > 0) {
		            while($row = mysqli_fetch_assoc($result)){
		            	$c = $row['idParticipante'];
		                $sql2 = "SELECT * FROM participantes WHERE idParticipante='$c'";
		                $result2 = getConnection()->query($sql2);
		                if ($result2->num_rows > 0) {
		                    while($alumnos = mysqli_fetch_assoc($result2)){
		                        echo $alumnos['nombre'] . " \n<br>";
		                    }
		                }
		                //$test[] = $row; 
		            }

		        } else {
		        	echo "Sin ningun registro. ";
		        }
			} else if($value == 'URL_generateBK'){
				$date_string = date('d-m-Y');
				if($_POST['id'] == 1){ //BACKUP
					$comand = PATH_MySQL . 'mysqldump --opt -h'. SERVERNAME.' -u'.USERNAME.' -p'.PASSWORD.' '.DBNAME.' > ' . DIRECTORIO_DB . $date_string .'_'.DBNAME.'.sql 2>&1';
					echo $comand;
					exec($comand);
				} else if($_POST['id'] == 2){ //Restore
					$file = $_POST['file'];
					$comand = PATH_MySQL . 'mysql -h'.SERVERNAME.' -u'.USERNAME.' -p'.PASSWORD.' '.DBNAME.' < '. DIRECTORIO_DB. $file.'';
					echo $comand;
					exec($comand);
				} else{
					echo 'Ocurrio un error. Comando no identificado.';
				}
			} else if($value == 'URL_controlsParticipantes'){
				if(isset($_POST['editarAsistente'])){
					echo 'Editar:'.$_POST['editarAsistente'];
				}else if(isset($_POST['eliminarAsistente'])){
					$id = $_POST['eliminarAsistente'];
					$sql = 'DELETE FROM participantes WHERE idParticipante="'.$id.'"';
					if (getConnection()->query($sql) === TRUE) {
					    echo "Eliminado correctamente";
					} else {
					    echo "Error al eliminar: " . getConnection()->errno;
					}
				}
			} else if($value == 'URL_createActivity'){
				$title = sanitize($_POST['title']);
				$slug = sanitize($_POST['slug']);
				$description = sanitize($_POST['txtDescription']);
				$url = sanitize($_POST['txtURL']);
				$espacios = sanitize($_POST['txtEspacio']);
				$image = sanitize($_POST['image']);
				//transaction
				getConnection()-> autocommit(false);
				try{
					$sql = "INSERT INTO talleres (nombre, slug, descripcion, espacios, image, blog) VALUES ('$title', '$slug', '$description', '$espacios', '$image', '$url')";
					if (getConnection()->query($sql) === false){
						echo "error";
					} else {
						echo "exito";
					}
					getConnection()->commit();
				} catch(Exception $e){
					getConnection()->rollback();
					echo $e->getMessage();
				}
			} else if($value == 'URL_controlsCodigos'){
				if(isset($_POST['eliminarCodigo'])){
					$id = $_POST['eliminarCodigo'];
					$sql = 'DELETE FROM codigos WHERE idCodigo="'.$id.'"';
					if (getConnection()->query($sql) === TRUE) {
					    echo "Eliminado correctamente";
					} else {
					    echo "Error al eliminar: " . getConnection()->errno;
					}
				}
			} else if($value == 'URL_controlsActividades'){
				if(isset($_POST['eliminarActividad'])){
					$id = $_POST['eliminarActividad'];
					$sql = 'DELETE FROM talleres WHERE idTaller="'.$id.'"';
					if (getConnection()->query($sql) === TRUE) {
					    echo "Eliminado correctamente";
					} else {
					    echo "Error al eliminar: " . getConnection()->errno;
					}
				}
			} else if($value == 'URL_createCode'){
				$codes = trim($_POST['viewCodes']);
				$description = sanitize($_POST['description']);
				$textAr = explode("\n", $codes);
				$textAr = array_filter($textAr, 'trim'); // remove any extra \r chars
				$id = 0;
				//Aplicado al 100
				getConnection()->autocommit(false);
				$sqlBase = "INSERT INTO codigos (clave, nota, valido) VALUES ";
				foreach ($textAr as $code) {
					$code = sanitize($code);
					$sqlBase .= " ('".$code."', '".$description."', 'SI'),";
				} 
				$sqlBase = substr_replace($sqlBase, "", -1); //eliminar ultima , 
				if(!(getConnection()->query($sqlBase))){
					getConnection()->rollback();
					echo "<script>alert('Ocurrio un error. Ningun codigo se guardo.');</script>";
				}else {getConnection()->rollback();
					echo "<script>alert('Agregados correctamente.');</script>";}
				/*echo $id;
				if($id > 0) { getConnection()->rollback(); </script>";}
				else{ getConnection()->commit(); echo "<script>alert('success');</script>";}
				*/
			} else { //cuando no hay una url de identificacion
				//si name o value isempty
				echo "<script>location.href='http://geektyper.com/shield/';</script>";
			}
		} //if toUrl
		else if($name == 'testProcedures') {
			if($value == 'URL_getAllRegisters'){
				//participantes
				if (!getConnection()->query("DROP PROCEDURE IF EXISTS getAllParticipantes") || !getConnection()->query("CREATE PROCEDURE getAllParticipantes() BEGIN SELECT nombre FROM participantes ; END;")) {
				    echo "Falló CREATE: (" . getConnection()->errno . ") " . getConnection()->errno;
				}
				if (!($res = getConnection()->query("CALL getAllParticipantes()"))) {
				    echo "Falló CALL: (" . getConnection()->errno . ") " . getConnection()->errno;
				}else {
					echo "<h1>Participantes</h1>";
					while ($row = $res->fetch_array(MYSQLI_ASSOC))
						echo $row["nombre"] .'<br>';
				}
				//end participantes
				//codes
				if (!getConnection()->query("DROP PROCEDURE IF EXISTS getAllCodes") || !getConnection()->query("CREATE PROCEDURE getAllCodes() BEGIN SELECT clave FROM codigos ; END;")) {
				    echo "Falló CREATE: (" . getConnection()->errno . ") " . getConnection()->errno;
				}
				if (!($res = getConnection()->query("CALL getAllCodes()"))) {
				    echo "Falló CALL: (" . getConnection()->errno . ") " . getConnection()->errno;
				}else {
					echo "<h1>Codigos</h1>";
					while ($row = $res->fetch_array(MYSQLI_ASSOC))
						echo $row["clave"] .'<br>';
				}
				//end codes
				//codes
				if (!getConnection()->query("DROP PROCEDURE IF EXISTS getAllWorkshops") || !getConnection()->query("CREATE PROCEDURE getAllWorkshops() BEGIN SELECT nombre FROM talleres ; END;")) {
				    echo "Falló CREATE: (" . getConnection()->errno . ") " . getConnection()->errno;
				}
				if (!($res = getConnection()->query("CALL getAllWorkshops()"))) {
				    echo "Falló CALL: (" . getConnection()->errno . ") " . getConnection()->errno;
				}else {
					echo "<h1>Talleres</h1>";
					while ($row = $res->fetch_array(MYSQLI_ASSOC))
						echo $row["nombre"] .'<br>';
				}
				//end codes
			}
		} else if($name == 'testTriggers'){
			$sql = "DELIMITER $$
CREATE TRIGGER 'after_participante_delete' AFTER DELETE ON 'participantes' 
FOR EACH ROW 
BEGIN
    INSERT INTO history_log (description, date_created) VALUES (old.nombre, CURRENT_DATE());
END
$$
DELIMITER ;";

$sql2 = "DELIMITER $$
CREATE TRIGGER after_codes_delete AFTER DELETE ON codigos
FOR EACH ROW 
BEGIN
    INSERT INTO history_log (description, date_created) VALUES (old.clave, CURRENT_DATE());
END
$$";

$sql3 = "DELIMITER $$
CREATE TRIGGER after_workshops_delete AFTER DELETE ON talleres
FOR EACH ROW 
BEGIN
    INSERT INTO history_log (description, date_created) VALUES (old.nombre, CURRENT_DATE());
END
$$";
			getConnection()->query($sql);
			getConnection()->query($sql2);
			getConnection()->query($sql3);
		}
		closeConnection(getConnection());
	} //foreach

	function sanitize($cadena) {
		$cadena = utf8_encode($cadena);
		$cadena = mysqli_real_escape_string(getConnection(), utf8_encode($cadena));
		$cadena = trim($cadena);
		$cadena = stripslashes($cadena);
		$cadena = htmlentities($cadena, ENT_QUOTES,'UTF-8');
		return $cadena;
	}

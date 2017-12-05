<!DOCTYPE html>
<html>
<head>

<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/css?family=Raleway:700,800);

html, body { margin: 0; }

body {
  background: #006699;
  color: #fff;
  font-family: 'Raleway', sans-serif;
  -webkit-font-smoothing: antialiased;
}

#wrapper, label, #arrow, button span { -webkit-transition: all .5s cubic-bezier(.6,0,.4,1); transition: all .5s cubic-bezier(.6,0,.4,1); }

#wrapper { overflow: hidden; }

#signin:checked ~ #wrapper { height: 178px; }
#signin:checked ~ #wrapper #arrow { left: 32px; }
#signin:checked ~ button span { -webkit-transform: translate3d(0,-72px,0); transform: translate3d(0,-72px,0); }



form {
  width: 450px;
  height: 370px;
  margin: -185px -225px;
  position: absolute;
  left: 50%;
  top: 50%;
}

input[type=radio] { display: none; }

label {
  cursor: pointer;
  display: inline-block;
  font-size: 22px;
  font-weight: 800;
  opacity: .5;
  margin-bottom: 30px;
  text-transform: uppercase;
}
label:hover {
  -webkit-transition: all .3s cubic-bezier(.6,0,.4,1);
  transition: all .3s cubic-bezier(.6,0,.4,1);
  opacity: 1;
}

input[type=text],
input[type=password] {
  background: #fff;
  border: none;
  border-radius: 8px;
  font-size: 22px;
  font-family: 'Raleway', sans-serif;
  height: 42px;
  width: 99.5%;
  margin-bottom: 10px;
  opacity: 1;
  text-indent: 20px;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}
button {
  background: #079BCF;
  border: none;
  border-radius: 8px;
  color: #fff;
  cursor: pointer;
  font-family: 'Raleway', sans-serif;
  font-size: 27px;
  height: 72px;
  width: 100%;
  margin-bottom: 10px;
  overflow: hidden;
  -webkit-transition: all .3s cubic-bezier(.6,0,.4,1);
  transition: all .3s cubic-bezier(.6,0,.4,1);
}
button span {
  display: block;
  line-height: 72px;
  position: relative;
  top: -2px;
  -webkit-transform: translate3d(0,0,0);
          transform: translate3d(0,0,0);
}
button:hover {
  background: #007BA5;
}

</style>
</head>
<body>
<?php 
  if (!file_exists("config.php")) {
      echo "<script>location.href='wizard.php';</script>";
  }
  ?>
<form action="php/postData.php" method="post">
  <input checked id='signin' type='radio' value='Iniciar sesion'>
  <label for='signin'>Iniciar sesion</label>
  <div id='wrapper'>
    <input id='username' name='username' value="root" type='text'>
    <input id='password' name="password" placeholder='12345' type='password'>
    <input id='servername' name="servername" value="localhost" type='text'>
    <input type="hidden" name="toUrl" value="URL_loginAdmin">
  </div>
  <button type='submit'>
    <span>
      <br>
      Ingresar
    </span>
  </button>
</form>
</body>
</html>
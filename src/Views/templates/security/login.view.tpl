<link rel="stylesheet" type="text/css" href="/{{BASE_DIR}}/public/css/login.css">

<div class="ContenedorLogin" style="display:flex;justify-content:center;align-items:center;height:100vh;">
  <div class="ContenedorFormulario">
    <form method="post" action="index.php?page=sec_login{{if redirto}}&redirto={{redirto}}{{endif redirto}}">
      <div class="Box">
        <h1>CineMagico</h1>
        <p>El cine es el arte de hacer posible lo imposible.</p>
        <div class="Formulario">
          <label for="txtEmail" style="color: #ffffff;">Correo</label><br>
          <input class="TextBox" type="email" id="txtEmail" name="txtEmail" value="{{txtEmail}}"><br>
          {{if errorEmail}}
          <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorEmail}}</div>
          {{endif errorEmail}}


          <label for="txtPswd" style="color: #ffffff;">Contraseña</label><br>
          <input type="password" class="TextBox" autocomplete="off" id="txtPswd" name="txtPswd" value="{{txtPswd}}"><br>
          {{if errorPswd}}
          <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswd}}</div>
          {{endif errorPswd}}
          {{if generalError}}
          <div class="row">
            {{generalError}}
          </div>
          {{endif generalError}}
          <a style="color: rgb(255, 255, 255);" href="#">Olvidaste la contraseña?</a>
        </div>
  
        <input type="submit" class="Boton" id="btnLogin" value="Entrar">
        <hr>
    </form>
    <p style="color: rgb(255, 255, 255);">¿No tienes una cuenta? <a style="color: #ffffff; text-decoration:underline;" id='Crear'
        onclick="Registro()">Registrate</a></p>
  </div>
</div>
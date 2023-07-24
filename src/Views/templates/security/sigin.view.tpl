<link rel="stylesheet" type="text/css" href="/{{BASE_DIR}}/public/css/signin.css">
  <div class="Box25">
    <form method="post" action="index.php?page=sec_register" class="Form2">
      <div class="Formulario2">
        <h1>CREA CUENTA</h1>
        <p>Ven a vivir tus sueños en nuestra pantalla</p>
        <label for="Correo" style="color: #1a1a40;">Correo</label><br>
        <input class="TextBox" type="email" id="txtEmail2" name="txtEmail2" value="{{txtEmail}}"><br>
        {{if errorEmail}}
        <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorEmail}}</div>
        {{endif errorEmail}}

        <label for="Nombre Usuario" style="color: #1a1a40;">Nombre de usuario</label><br>
        <input class="TextBox" type="text" id="txtUsuario" name="txtUsuario" value="{{txtUsuario}}"><br>

        <label for="Contraseña" style="color: #1a1a40;">Contraseña</label><br>
        <input type="password" class="TextBox" autocomplete="off" id="txtPswd2" name="txtPswd2" value="{{txtPswd}}"><br>

        {{if errorPswd}}
        <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswd}}</div>
        {{endif errorPswd}}

        <input type="submit" class="Boton2" id="btnCrearCuenta" value="Crear Cuenta">
        <input type="button" class="Boton3" id="btnCancelar" value="Cancelar" onclick="IrAtras()">
      </div>
    </form>
  </div>
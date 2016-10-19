<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
    <form action="<?= base_url(); ?>DAOUsuarioIMPL/actionLogin" method="post" id="login">
          <div class="loginform">
          <div class="contenido" align="center">
            <div class="form-label"><label for="p1">Usuario</label></div>
            <div class="form-input">
              <input type="text" name="p1" id="p1" size="15" value="" placeholder="Ingrese Usuario"/>
            </div>
            <br />
            <div class="clearer"><!-- --></div>
            <div class="form-label"><label for="p2">Contraseña</label></div>
            <div class="form-input">
              <input type="password" name="p2" id="p2" size="15" value="" placeholder="*************"/>
            </div>
            <br />
          <input type="submit" id="loginbtn" value="Enviar" />
          </div>
          </div>
        </form>
</body>
</html>
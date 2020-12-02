<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>ADMINISTRACION DE USUARIOS- Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">

<!------Funcion para mostrar contraseña----->
<script>
  function mostrarContraseña(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
<!------------------------------------------------>
</head>



<body class="container-fluid bg-info">
    
<img src="/SISTEMA EXPEDIENTES/View/images/users.png" alt="" class="offset-lg-4 mb-2">
<!--Formulario de  que se recarga al oprimir el boton para ejecutar codigo php del encabezado--->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    
    <table class="container-fluid bg-info">
        <tr>
            <td><h3 class="display-5 text-white offset-lg-5">ADMINISTRACÍON</h3></td>
        </tr>


        <tr>
            <td><input type="number" name="user" id="" placeholder="Ingrese su usuario" min="10000000" max="99000000" required  class="form-control col-lg-2 offset-lg-5"></td>
        </tr> 
        
        <tr>
            <td><input type="password" name="password_access" id="password"  title="La contraseña no cumple con el formato solicitado" placeholder="Ingrese su contraseña" required class="form-control col-lg-2 offset-lg-5 mt-2"></td>
        </tr>

        <tr>
            <td><!---Checkbox para mostrar ocultar contraseña llamando al javascript del head-->
                <label for="" class="display-6 text-white offset-lg-5 mt-2">Mostrar Contraseña</label> 
                <input type="checkbox" name="" id="" class="" onclick="mostrarContraseña();">
            </td>
        </tr>



        <tr>
            <td>
                <input type="submit" name="access" value="Ingresar" id="" class="btn btn-warning col-lg-2 offset-lg-5 mb-2 mt-2 " >
            </td>
        </tr>

    </table>

</form>

</body>

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
<?php
//Esta zona php detecta si existe una cookie y se almacenara en DNI y password para luego insertarse en los cuadros dni y contraseña del form
if(isset($_COOKIE["SGE-DNI"])){
    $DNI=$_COOKIE["SGE-DNI"];
    $PASSWORD=$_COOKIE["SGE-PAS"];
    //Sino se encuentra la cookie las variables se cargan vacias por lo cual el value de los cuadros de textos estaran vacios 
}else{
    $DNI;
    $PASSWORD="";
}
?>
<!--Formulario de inicio de sesion que se recarga al oprimir el boton--->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    
    <table class="container col-lg-12 bg-primary">
        <tr>
            <td><h3 class="display-5 text-white offset-lg-5">Inicio de Sesíon</h3></td>
        </tr>


        <tr>
            <td><input type="number" name="dni" id="" placeholder="Ingrese su DNI" min="10000000" max="99000000" required  class="form-control col-lg-2 offset-lg-5" value="<?php echo $DNI;?>"></td>
        </tr> 
        
        <tr>
            <td><input type="password" name="password" id="password" pattern="[A-Za-z0-9]{8,10}" title="La contraseña no cumple con el formato solicitado" placeholder="Ingrese su contraseña" required class="form-control col-lg-2 offset-lg-5" value="<?php echo $PASSWORD;?>"></td>
    
        </tr>
        <tr>
           
        </tr>
            <td>
                <input type="checkbox" name="" onclick="mostrarContraseña();" class="offset-lg-5"><label for="" class="text-white">Mostrar Contraseña</label>
            </td>

        <tr>
            <td><input type="checkbox" name="remember" id="remember" class="offset-lg-5"><label for="" class="text-white">Recordar usuario</label></td>
       
        </tr>
     

        <tr>
            <td>
                <input type="submit" name="enter" value="Ingresar" id="enter" class="btn btn-warning btn-lg  col-lg-2 offset-lg-5 mb-2 " >
            </td>
        </tr>
        <tr>
            <td>
                <hr style="color: #0056b2;" size=30 width="15%" color="gray" />
            </td>
        </tr>

        <tr>
            <td>
                <a href="/SISTEMA EXPEDIENTES/Controller/admin/user_access_registrer.php" target="blank"><input type="" name="" value="Administracíon" id="" class="btn btn-danger btn-sm col-lg-2 mb-2 offset-lg-5"></a>
                
            </td>
        </tr>
    </table>

</form>

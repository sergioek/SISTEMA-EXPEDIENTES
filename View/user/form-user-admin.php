    
<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="table container col-lg-8 offset-lg-3">

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="name" id="name" maxlength="50" pattern="[A-Z-Ñ ]{8,50}" title="Use mayusculas hasta 50 caracteres" placeholder="Ingrese sus nombres y apellidos completos en MAYUSCULAS" required></td>
            </tr>


            <tr>
                <td><input class="form-control col-lg-8" type="number" name="dni" id="dni" min="10000000" max="99000000" title="Use numeros hasta 8 caracteres" required placeholder="Ingrese su DNI"></td>
            </tr>

            <td class="display-6 text-muted">Seleccione fecha de nacimiento:</td>
            <tr>
            <?php 
            //Determinando la fecha max para asegurar que se registren mayores de edad
            $mes=date('m');
            $dia=date('d');
            $fechamax=date('Y')-18 ."-"."$mes"."-"."$dia";
            ?>
                <td><input class="form-control col-lg-8" type="date" name="date" id="date" min="1940-01-01" max="<?php echo $fechamax;?>" placeholder="Seleccione una fecha" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="home" id="home" maxlength="50" placeholder="Su domicilio actual" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" placeholder="Su telefono en 10 digitos" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="email" name="email" id="email" placeholder="Su correo electronico" required></td>
            </tr>

            <tr>
                <td>
                    <select name="area" id="area" class="form-control col-lg-8" title="Seleccione el área a la cual pertenecerá el usuario a registrar">
                        <!--Bucle foreach para insertar las areas de la bd obtenida a partir de new user search area-->
                        <?php
                        foreach ($registro as $areas) :?>
                            <option name="area=<?php echo $areas->NOMBRE;?>"><?php echo $areas->NOMBRE;?></option>
                        <?php
                        endforeach;
                        ?>

                    </select required>
                </td>
            </tr>

        

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="charge" id="charge" maxlength="50" placeholder="Ingrese su cargo" required></td>
            </tr>
            
            <tr>
                <td>
                    <select name="rol" id="rol" class="form-control col-lg-8" title="Elegir rol de usuario a registrar">
                        <option name="rol" title="Usuario con provilegios de administracíon y control para poder crear operarios y controlar su desempeño">ADMINISTRADOR DE ÁREA</option>
                        <option name="rol" title="Usuario sin provilegios de administracíon y control">OPERARIO DE ÁREA</option>
                    </select required>
                </td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="password" name="password" id="password" pattern="[A-Za-z0-9]{8,10}" title="Solo letras mayusculas, minusculas y numeros de 8 a 10 caracteres" placeholder="Contraseña en 10 caracteres" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="password" name="password_verify" id="password_verify" pattern="[A-Za-z0-9]{8,10}" title="Solo letras mayusculas, minusculas y numeros de 8 a 10 caracteres" placeholder="Repita la contraseña" required></td>
            </tr>

            <tr class="container row">
                <td class="col-lg-4 text-danger"><label for="">*Una vez completados los campos, presione:</label></td><td class="col-lg-4"><input class="btn btn-primary col-lg-12" type="submit" name="submit" value="Registrarse"></td>
            </tr>

        </table>



    </form>
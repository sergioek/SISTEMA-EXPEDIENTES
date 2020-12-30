    
<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="table container col-lg-8 offset-lg-3">

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="name" id="name" maxlength="50" pattern="[A-Z-Ñ ]{8,50}" title="Use MAYÚSCULAS hasta 50 caracteres" placeholder="Ingrese el nombre del área en letras MAYÚSCULAS" required></td>
            </tr>


            <tr>
                <td>
                    <textarea name="description" id="description" cols="30" rows="10" style="resize:none;" maxlength="200" placeholder="Descripcíon del área" class="form-control col-lg-8" required></textarea>
                </td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="chief" id="chief" maxlength="50" pattern="[A-Z-Ñ-. ]{8,50}" placeholder="Apellido y Nombre del jefe o encargado del área en MAYÚSCULAS" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" placeholder="Teléfono en 10 digitos" required></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="email" name="email" id="email" placeholder="Correo electrónico"></td>
            </tr>


            <tr class="container row">
                <td class="col-lg-4 text-danger"><label for="">*Una vez completados los campos, presione:</label></td><td class="col-lg-4"><input class="btn btn-primary col-lg-12" type="submit" name="save" value="Crear área"></td>
            </tr>

        </table>

    </form>

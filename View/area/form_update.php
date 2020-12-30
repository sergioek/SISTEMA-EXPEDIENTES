<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="table container col-lg-8 offset-lg-3">

            <tr>
                <td>
                    <select name="name" id="name"class="form-control col-lg-8">
                        <option name="name=<?php echo $name_area;?>"><?php echo $name_area;?></option>
                    </select>
                </td>
            </tr>


            <tr>
                <td>
                    <textarea name="description" id="description" cols="30" rows="10" style="resize:none;" maxlength="200" placeholder="Descripcíon del área" class="form-control col-lg-8" required><?php echo $description_area;?></textarea>
                </td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="chief" id="chief" maxlength="50" pattern="[A-Z-Ñ-. ]{8,50}" placeholder="Apellido y Nombre del jefe o encargado del área en MAYÚSCULAS" required value="<?php echo $chief_area;?>"></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" placeholder="Teléfono en 10 digitos" required value="<?php echo $telephone_area;?>"></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="email" name="email" id="email" placeholder="Correo electrónico" value="<?php echo $email_area;?>"></td>
            </tr>


            <tr class="container row">
                <td class="col-lg-4 text-warning"><label for="">*Una vez actualizados los campos, presione:</label></td><td class="col-lg-4"><input class="btn btn-success col-lg-12" type="submit" name="update" value="Actualizar"></td>
            </tr>

        </table>

    </form>

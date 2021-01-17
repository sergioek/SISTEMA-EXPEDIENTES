<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="table container col-lg-8 offset-lg-3">

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="name" id="name" maxlength="50" pattern="[A-Z-Ñ ]{8,50}" title="Use MAYÚSCULAS hasta 50 caracteres" placeholder="Ingrese el nombre del tramite en letras MAYÚSCULAS" required></td>
            </tr>

            <tr>
                <td>
                    <select name="area" id="id"class="form-control col-lg-8" title="Seleccione el área">
                        <option name="area=<?php echo $_SESSION["area"];?>"><?php echo $_SESSION["area"];?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <textarea name="requeriments" id="requeriments" cols="30" rows="10" style="resize:none;" maxlength="300" placeholder="Requisitos para el trámite" class="form-control col-lg-8" required></textarea>
                </td>
            </tr>
   
            <tr class="container row">
                <td class="col-lg-4 text-danger"><label for="">*Una vez completados los campos, presione:</label></td><td class="col-lg-4"><input class="btn btn-primary col-lg-12" type="submit" name="save" value="Crear trámite"></td>
            </tr>

        </table>

    </form>

<!----Comienza formulario con los campos se usa una tabla para su formato-------->
    <!--echo SERVER para que al pulsar el boton y recargar la pagina se ejecute de nuevo el codigo-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="table container col-lg-8 offset-lg-3">


            <tr>
                <td>
                    <select name="id" id="id"class="form-control col-lg-8" title="id del trámite">
                        <option name="name=<?php echo $id;?>"><?php echo $id;?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="text" name="name" id="name" value="<?php echo $name; ?>"required title="No pueden existir dos trámites con el mismo nombre"></td>
            </tr>


            <tr>
                <td><input class="form-control col-lg-8" type="date" name="date" id="date" value="<?php echo $date; ?>"required readonly title="Ultima modificacíon del trámite"></td>
            </tr>

            <tr>
                <td>
                    <select name="area" id="area"class="form-control col-lg-8" title="Área del trámite">
                        <option value=<?php echo $_SESSION["area"];?>><?php echo $_SESSION["area"];?></option>
                    </select>
                </td>
            </tr>



            <tr>
                <td>
                    <textarea name="requeriments" id="requeriments" cols="30" rows="10" style="resize:none;" maxlength="300" placeholder="Requisitos para el trámite" class="form-control col-lg-8" required><?php echo $requeriments?></textarea>
                </td>
            </tr>

            <tr class="container row">
                <td class="col-lg-4 text-warning"><label for="">*Una vez actualizados los campos, presione:</label></td><td class="col-lg-4"><input class="btn btn-success col-lg-12" type="submit" name="update" value="Actualizar"></td>
            </tr>

        </table>

    </form>

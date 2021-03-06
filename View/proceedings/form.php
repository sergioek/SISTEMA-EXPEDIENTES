
 <!--formulario para completar el inicio del expediente----------------------------------------------->
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table class="table container col-lg-8 offset-lg-3">
            <td class="display-6 text-muted font-weight-bold">DATOS DEL SOLICITANTE:</td>
            <tr>
                <td>
                    <select name="name" id="name" class="form-control col-lg-8" maxlength="50" required>
                            <option name="name=<?php echo $name_petitioner;?>"><?php echo $name_petitioner; ?>
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                <select name="dni" id="" class="form-control col-lg-8" min="10000000" max="99000000">
                    <option name="dni=<?php echo $dni;?>"><?php echo $dni; ?>
                </option>
                    </select>
                </td>
            </tr>

            <tr> 
                <td>
                    <select name="estado" id="estado" class="form-control col-lg-8" required>
                        <option name="estado" value="1">INICIO DE TRÁMITE</option >
                    </select>
                </td>
            </tr>

            <tr> 
                <td>
                    <select name="tramite" id="tramite" class="form-control col-lg-8" required title="Trámite a realizar" >
                        <option value="<?php echo $id;?>"><?php echo $name; ?></option >
                    </select>
                </td>
            </tr>

            
            <td class="display-6 text-muted">Fecha de inicio del trámite:</td>
            <?php $date_value=date('Y-m-d'); $year_value=date('Y');?>
            <tr>
                <td><input class="form-control col-lg-8" type="date" name="date" id="date" max="<?php echo $date_value;?>" required></td>
            </tr>

            <td class="display-6 text-muted">Número de Expediente:</td>
            <tr>
                <td><input class="form-control col-lg-8" type="number" name="number_proceedings" id="number" required placeholder="Ingrese el número de expediente" title="Ingresar el número de expediente"></td>
            </tr>

            <td class="display-6 text-muted">Año de Expediente:</td>
            <tr>
                <td><input class="form-control col-lg-8" type="number" name="year_proceedings" id="number" max="<?php echo $year_value;?>" value="<?php echo $year_value;?>" required placeholder="Ingrese el año de expediente" title="Ingresar el año de expediente"></td>
            </tr>

            <tr>
                <td><input class="form-control col-lg-8" type="number" name="folios" id="folios" pattern="[0-9]{3}" min="1" max="999" placeholder="Numero de folios" title="Se permiten solo tres dígitos" required></td>
            </tr>

            <tr>
                <td><textarea class="form-control col-lg-8" name="documentacion" id="documentacion" cols="30" rows="5" placeholder="Documentacíon presentada" maxlength="300" required style="resize: none;"><?php echo $requeriments;?></textarea></td>
            </tr>

            <tr>
                <td class="display-6 text-muted">Documentacíon digital:
                    <input type="file" name="file" id="" class="form-control-file col-lg-8" required>
                
                </td>
            </tr>

            <tr>
                <td class="col-lg-2 text-dark"><label for="">Declaro que la documentacíon esta completa:</label>
                <input type="checkbox" name="full_documentation" id="full_documentation" class=".form-check" required   title="Indique si la documentacíon esta completa, para poder iniciar un expediente"></td>
            </tr>

            <tr class="container row">
                <td class="col-lg-4 text-danger">
                    <label for="">*Una vez completados los campos, presione:</label>
                </td><td class="col-lg-4"><input class="btn btn-primary col-lg-12" type="submit" name="registrar" value="Iniciar Expediente"></td>
            </tr>

            <tr class="container row">
                <td class="col-lg-4"></td>
                <td class="col-lg-4">
                    <a href="/SISTEMA EXPEDIENTES/View/proceedings/new_proceedings.php">
                        <input class="btn btn-danger col-lg-12" type="button" value="Borrar Formulario">
                    </a>
                </td>
                
            </tr>

        </table>

    </form>

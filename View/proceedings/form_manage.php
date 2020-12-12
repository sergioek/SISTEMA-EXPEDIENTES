
<?php
//Incorpora un archivo sql para obtener las areas y mostrarlas dentro del archivo en la lista desplegable
require($_SERVER['DOCUMENT_ROOT'] . '/SISTEMA EXPEDIENTES/Controller/user/user_search_area.php');
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="table container col-lg-8 offset-lg-3">
            <td class="display-6 text-warning font-weight-bold" style="font-size: 30px;">DATOS DEL EXPEDIENTE</td>

            <tr>
                <td class="display-6 text-muted">N° Expediente:
                    <select name="number" id="number"class="form-control col-lg-8">
                        <option name="number=<?php echo $number;?>"><?php echo $number;?></option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="display-6 text-muted">Fecha de inicio:
                    <input class="form-control col-lg-8" type="date" name="" id="" required  value="<?php echo $date;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="display-6 text-muted">Solicitante:
                    <input class="form-control col-lg-8" type="text" name="" id="" required  value="<?php echo $name_petitioner;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="display-6 text-muted">DNI solicitante:
                    <input class="form-control col-lg-8" type="number" name="" id="" required  value="<?php echo $dni_petitioner;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="display-6 text-muted">Trámite:
                    <input class="form-control col-lg-8" type="text" name="" id="" required  value="<?php echo $procedure;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="display-6 text-muted">Folios iniciales:
                    <input class="form-control col-lg-8" type="number" name="" id="" required  value="<?php echo $folios_iniciales;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="display-6 text-muted">Documentacion inicial:
                   <textarea name="" id="" cols="30" rows="5" class="form-control col-lg-8" disabled><?php echo $documentation;?>
                   </textarea>
                </td>
            </tr>

            <tr>
                <td class="display-6 text-muted">Área de inicio de trámite:
                    <input class="form-control col-lg-8" type="text" name="" id="" required  value="<?php echo $area_inicio;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="text-muted font-weight-bold" style="font-size: 20px;">Estado actual:
                    <input class="form-control col-lg-8 bg-warning" type="text" name="" id="" required  value="<?php echo $state;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="text-muted font-weight-bold" style="font-size: 20px;">Ultima modificacíon:
                    <input class="form-control col-lg-8 bg-warning" type="text" name="" id="" required  value="<?php echo $datetime_transfer;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="text-muted font-weight-bold" style="font-size: 20px;">Modificacíon:
                    <textarea name="" id="" cols="30" rows="5" style="resize: none;" class="form-control col-lg-8 bg-warning" disabled><?php echo $reason;?></textarea>
                </td>
            </tr>

            <tr>
                <td class="text-muted font-weight-bold" style="font-size: 20px;">Folios:
                    <input class="form-control col-lg-8 bg-warning" type="number" name="" id="" required  value="<?php echo $folios_current;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="text-muted font-weight-bold" style="font-size: 20px;">Con pase a:
                    <input class="form-control col-lg-8 bg-warning" type="text" name="" id="" required  value="<?php echo $transfer;?>" disabled>
                </td>
            </tr>

            <tr>
                <td class="text-muted font-weight-bold" style="font-size: 20px;">Motivo del pase:
                    <textarea name="" id="" cols="30" rows="5"  class="form-control col-lg-8 bg-warning" disabled style="resize: none;"><?php echo $reason_transfer;?>
                   </textarea>
                </td>
            </tr>

<!---------------------------------------------------------------------------->
            <td class="display-6 text-success font-weight-bold" style="font-size: 30px;">NUEVA GESTÍON</td>

            <tr> 
                
                <td class="display-6 text-muted">Estado:
                    <select name="estado" id="estado" class="form-control col-lg-8" required>
                        <option name="estado" value="EN TRÁMITE">EN TRÁMITE</option>
                        <option name="estado" value="PARA ARCHIVAR">FINALIZADO -PARA ARCHIVAR</option>
                    </select>
                </td>
            </tr>

            <tr> 
                <td>
                    <textarea class="form-control col-lg-8" name="tramite" id="tramite" cols="30" rows="3" placeholder="Descripcíon del tramite realizado" maxlength="150" required style="resize: none;"></textarea>
                </td>
            </tr>

            <tr>
                <td class="display-6 text-muted">Folios actuales:
                    <input class="form-control col-lg-8" type="number" name="folios" id="folios" pattern="[0-9]{3}" min="1" max="999" placeholder="Numero de folios actuales" title="Se permiten solo tres dígitos" required value="<?php echo $folios_current; ?>"></td>
                </tr>

            <tr>
                <td class="display-6 text-muted">Area a la que deriva el trámite:
                    <select name="area" id="area" class="form-control col-lg-8">
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
                <td>  <textarea class="form-control col-lg-8" name="motivo_pase" id="motivo_pase" cols="30" rows="5" placeholder="Motivo o acciones que debe realizar el area al cual deriva el tramite" maxlength="150" required style="resize: none;"></textarea></td>
            </tr>
<!------------------------------------------------------------------------>
            <tr class="container row">
                <td class="col-lg-4 text-danger">
                    <label for="">*Una vez completados los campos, presione:</label>
                </td><td class="col-lg-4"><input class="btn btn-primary col-lg-12" type="submit" name="gestionar" value="Guardar Gestíon"></td>
            </tr>

            <tr class="container row">
                <td class="col-lg-4"></td>
                <td class="col-lg-4">
                    <a href="/SISTEMA EXPEDIENTES/View/proceedings/manage_proceedings.php">
                        <input class="btn btn-danger col-lg-12" type="button" value="Borrar Formulario">
                    </a>
                </td>
                
            </tr>

        </table>

    </form>
<!--Escript para hacer scroll hasta cierta parte del formulario--->
<script>
    window.scroll(0,1400)
</script>

<!---Formulario de nuevo solicitante ---->
<form action="" method="post">
    <table class="table container col-lg-8 offset-lg-3">

        <tr>
            <td>
            <input class="form-control col-lg-8" type="text" name="name" id="name" maxlength="50" pattern="[A-Z-Ñ ]{8,50}" title="Use mayusculas hasta 50 caracteres sin simbolos extraños" placeholder="Nombres y apellidos completos" required>
            </td>
        </tr>

    <tr>
        <td>
            <input class="form-control col-lg-8" type="number" name="dni" id="dni" min="10000000" max="99000000"required placeholder="DNI" value="<?php echo $dni;?>" >
        </td>
    </tr>

    <td class="display-6 text-dark">Seleccione fecha de nacimiento:</td>
    <tr>
        <td>
            <input class="form-control col-lg-8" type="date" name="date" id="date" min="1920-01-01" max="<?php echo $fechamax=date('Y-m-d');?>"  placeholder="Seleccione una fecha"required>
        </td>
    </tr>

    <tr>
        <td>
            <input class="form-control col-lg-8" type="text" name="home" id="home" maxlength="50" placeholder="Domicilio actual" required></td>
    </tr>

    <tr>
        <td>
            <input class="form-control col-lg-8" type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" placeholder="Telefono en 10 digitos" required>
        </td>
    </tr>

    <tr>
        <td>
            <input class="form-control col-lg-8" type="email" name="email" id="email" placeholder="Correo electronico" required>
        </td>
    </tr>

    <tr>
        <td><input class='btn btn-primary col-lg-8' type='submit' name='save'value='Guardar'></td>
    </tr>

</table>
</form>    
<!---Formulario de solicitante ---->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table class="table container col-lg-8 offset-lg-3">
    <tr>
        <td>
            <input class="form-control col-lg-8" type="text" name="name" id="name" maxlength="50" pattern="[A-Z-Ñ ]{8,50}" title="Use mayusculas hasta 50 caracteres sin simbolos extraños" placeholder="Nombres y apellidos completos" value="<?php echo $name_petitioner;?>" required>
        </td>
    </tr>

    <tr>
        <td>
            <input class="form-control col-lg-8" type="number" name="dni" id="dni" min="10000000" max="99000000" value="<?php echo $dni;?>" required placeholder="DNI" readonly>
        </td>
    </tr>

    <td class="display-6 text-dark">Seleccione fecha de nacimiento:</td>
    <tr>
        <td>
            <input class="form-control col-lg-8" type="date" name="date" id="date" min="1920-01-01" max="<?php echo $fechamax=date('Y-m-d');?>"  placeholder="Seleccione una fecha" value="<?php echo $date;?>" required readonly>
        </td>
    </tr>

    <tr>
        <td><input class="form-control col-lg-8" type="text" name="home" id="home" maxlength="50" placeholder="Domicilio actual"value="<?php echo $home;?>" required></td>
    </tr>

    <tr>
        <td><input class="form-control col-lg-8" type="tel" name="telephone" id="telephone" pattern="[0-9]{10}" placeholder="Telefono en 10 digitos" value="<?php echo $telephone;?>"  required></td>
    </tr>

    <tr>
         <td><input class="form-control col-lg-8" type="email" name="email" id="email" placeholder="Correo electronico"  value="<?php echo $email;?>" required></td>
    </tr>


    <tr>
        <td><input class='btn btn-success col-lg-8' type='submit' name='update'value='Actualizar'></td>
    </tr>

    <tr>
        <td><input class='btn btn-warning col-lg-8' type='submit' name='delete'value='Eliminar'></td>
    </tr>
    
</table>
</form>
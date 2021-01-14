<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sergio Khairallah">
    <meta name="keywords" content="Municipalidad de Fernandez,Registro de usuarios,Sistema de Expedientes">
    <title>Reporte de Expedientes - Sistema de Expedientes Municipales</title>
    <!--Incorporando Bootstrap-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
    <!--Incorporando un stylo css-->
    <link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/new_user.css">
    <!--Incorporando un icono en la pagina-->
    <link rel="icon" href="/SISTEMA EXPEDIENTES/View/images/favicon.ico" type="image/png">

</head>

<body>

<!----Encabezado de la pagina-------------------------------------->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/SISTEMA EXPEDIENTES/View/styles/header.php");?>
<!-------------------------------------------------------------------->

<!---------------Texto--------------------------------->
    <div class="container col-lg-9 offset-lg-3 mt-lg-5">
            <h6 class="bg-transparent display-4  text-dark mt-2 font-weight-bold">Reporte Exp. N°:<label for="" class="text-primary"> <?php echo $number;?></label></h6> 
    </div>
<!------------------------------------------------------->
    <div class="container-fluid col-lg-9 offset-lg-3 mb-lg-5">
        <label for="" class="container row text-dark font-weight-bold">Año: <label class="text-primary"><?php echo $YEAR;?></label></label>

        <label for=""class="container row text-dark font-weight-bold">Fecha de Inicio:<label class="text-primary"><?php echo $DATE;?></label></label>

        <label for=""class="container row text-dark font-weight-bold">Solicitante:<label class="text-primary"><?php echo $PETITIONER;?></label></label>

        <label for=""class="container row text-dark font-weight-bold">Trámite:<label class="text-primary"><?php echo $PROCEDURE;?></label></label>

        <label for=""class="container row text-dark font-weight-bold">Folios Iniciales:<label class="text-primary"><?php echo $FOLIOS;?></label></label>

        <label for=""class="container row text-dark  font-weight-bold">Área de Inicio:<label class="text-primary"><?php echo $AREA;?></label></label>
    </div>

    <table class="table table-bordered table-responsive-lg">
    <thead class="thead-dark">
    <tr>
        <th>
            Fecha y Hora
        </th>
    
        <th>
            Área
        </th>

        <th>
            Motivo
        </th>

        <th>
            Folios
        </th>

        <th>
            Estado
        </th>

        <th>
            Pase a
        </th>

        <th>
            Motivo del pase
        </th>
    </tr>
    </thead>
<!---Bucle------------------------------------------------------->
<?php foreach ($registro as $gestiones) :?>
    <tr>
        <td>
            <?php echo $gestiones->FECHA_HORA;?>
        </td>

        <td>
        
            <?php echo $gestiones->AREA;?>

        </td>

        <td>
            <?php echo $gestiones->MOTIVO;?>

        </td>

        <td>
            <?php echo $gestiones->FOLIOS;?>

        </td>

        <td>
            <?php echo $gestiones->ESTADO;?>

        </td>

        <td>
            <?php echo $gestiones->CON_PASE_A;?>
        </td>

        <td>
            <?php echo $gestiones->MOTIVO_PASE;?>

        </td>

    </tr>
    <?php endforeach;?>

<!-----Boton imprimir ------->
        <input class="btn btn-success col-lg-2 offset-lg-3 mb-lg-4" type="button" value="Imprimir" onclick="javascript:window.print()"/>
    
    </table>

</body>

</html>

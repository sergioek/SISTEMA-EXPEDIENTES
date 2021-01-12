
    <table class="table table-bordered table-responsive-lg col-lg-8 offset-lg-2">
    <h5 class="display-5 text-primary offset-lg-2">
        <?php 
            if($filter=="EXPEDIENTES INICIADOS"){
                echo "EXPEDIENTES INICIADOS ENTRE $date_initial y $date_end por $area";

            }

            if($filter=="EXPEDIENTES GESTIONADOS"){
                echo "EXPEDIENTES GESTIONADOS ENTRE $date_initial y $date_end por $area";

            }
                
        ?>
    </h5>  
        
    </thead>
    <thead class="thead-dark">
    <tr>
        <th>
            Número de Expediente
        </th>
    
        <th>
            Fecha 
        </th>
    
        <th>
            Área
        </th>

        <th>
            DNI Operador
        </th>
    </tr>
    </thead>
<!---Bucle------------------------------------------------------->
<?php foreach ($expedientes as $busqueda) :?>
    <tr>
        <td>
            <?php 
            if(isset($busqueda->NUMERO)){
                echo $busqueda->NUMERO;
            }else{
                echo $busqueda->NUMERO_ID;
            }
            ?>
        </td>

        <td>
        
            <?php echo $busqueda->FECHA;?>

        </td>

        <td>
            <?php echo $busqueda->AREA;?>

        </td>


        <td>
            <?php 
            if(isset($busqueda->DNI_OPERADOR)){
                echo $busqueda->DNI_OPERADOR;
            }else{
                echo $busqueda->OPERADOR;
            }
            ?>

        </td>

    </tr>
    <?php endforeach;?>

    
    </table>

    <!-----Boton imprimir ------->
    <input class="btn btn-success col-lg-1 offset-lg-9 mb-lg-4" type="button" value="Imprimir" onclick="javascript:window.print()"/>
</body>

</html>

<!--Form proceedings sirve es el formulario de busqueda de expedientes y dos link a otros servicios que esta presente en el index -->
<head>
<link rel="stylesheet" href="/SISTEMA EXPEDIENTES/View/styles/bootstrap/css/bootstrap.min.css">
</head>

<div class="container row col-lg-12 offset-lg-0 mb-0">
    
    <section class="bg-dark col-lg-4">
        <a href="">
            <article class="container offset-lg-2">
                <label for=""class=" display-5 text-white font-weight-bold offset-lg-2 mt-4">REQUISITOS PARA TRÁMITES</label>
            
                <img class="offset-lg-3" src="/SISTEMA EXPEDIENTES/View/images/requisito_tramite.png" alt="" width="160" height="150">
            </article>
        </a>
    </section>

    <section class="bg-light col-lg-4">
        <form action="/SISTEMA EXPEDIENTES/Controller/proceedings/report/search_report.php" class="form-column" method="get" target="blank">
            <table class="mt-lg-2 offset-lg-2">
                <tr>
                    <td class="">
                        <label for="" class="display-5 text-dark font-weight-bold">BUSQUEDA DE EXPEDIENTES:</label>

                        <img src="/SISTEMA EXPEDIENTES/View/images/busqueda-expedientes.png" alt="" width="100" height="80">

                        <input type="number" name="proceedings" id="" class="form form-control mt-2" pattern="[0-9]" placeholder="N° DE EXPEDIENTE" required>

                        
                        <input type="number" name="year" id="" class="form form-control mt-2" pattern="[0-9]" placeholder="AÑO" required value="<?php echo date('Y');?>">

                        <input type="submit" value="Buscar" name="search" class="form-control btn btn-success mt-2 mb-2">
                    </td>
                  
                </tr>

            </table>
        </form>
        
        
    </section>


    

    <section class="bg-success col-lg-4">
         <a href=""><article>
        <label for=""class=" display-5 text-white font-weight-bold offset-lg-3 mt-4">AYUDA Y ASISTENCIA TÉCNICA</label>
           
            <img src="/SISTEMA EXPEDIENTES/View/images/ayuda-asistencia.png" alt="" width="300" height="150" class="offset-lg-2">
            
        </article></a>

    </section>

</div>







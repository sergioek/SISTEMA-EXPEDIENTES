<?php
//Parte grafica de la caratula con los estilos css
$caratula='<body style="">


<header>
 
   
       <h1 style="color:orangered;
       background-color:white;
       font-size: 3em;
       text-align: center;
       margin: 10px auto;
       height: 60px;
       font-family: serif;">Sistema de Expedientes (SGE)</h1>
   
       <h3 style="    color:green;
       font-size: 2.0em;
       margin: 10px;
       text-align:center;
       font-family: monospace;">Municipalidad de Fernández</h3>

          
       <figure>
       <img style="margin-left:270px;" src="/SISTEMA EXPEDIENTES/View/images/logo-removebg.png" width=120 heigth=120>
      </figure>
 

</header style="">


           <h5 style=" color:black;
           padding-top: 20px;
           font-size: 1.4em;
           margin-left:5%;
           font-weight: bold;
           font-style: oblique;
           text-align:left;">CARÁTULA EXPEDIENTE N°:'.$number_id.'</h5>
   

<table style="border-collapse: collapse; border-spacing: 0; border:2px solid black;border-collapse: collapse;
width: 50%; 
margin-left:5%;">

<tr style="">
   
   <th style="text-align:left;
   padding:10px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   border:2px solid black;
   border-collapse: collapse;
   height: 40px;
   background-color:white;
   color:black;">AÑO:</th>

   <td style="border:2px solid black;
   border-collapse: collapse;
   text-align:left;
   height: 10px;
   background-color:white;
   padding:10px;">'.$year.'</td>
  
</tr>

<tr>
   <th style="text-align:left;
   padding:10px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   border:2px solid black;
   border-collapse: collapse;
   height: 40px;
   background-color:white;
   color:black;">FECHA DE INICIO:</th>

   <td style="border:2px solid black;
   border-collapse: collapse;
   text-align:left;
   height: 10px;
   background-color:white;
   padding:10px;">'.$date.'</td>
</tr>


<tr>
   <th style="text-align:left;
   padding:10px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   border:2px solid black;
   border-collapse: collapse;
   height: 40px;
   background-color:white;
   color:black;">SOLICITANTE:</th>

   <td style="border:2px solid black;
   border-collapse: collapse;
   text-align:left;
   height: 10px;
   background-color:white;
   padding:10px;">'.$name_petitioner.'</td>
</tr>

<tr>
   <th style="text-align:left;
   padding:10px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   border:2px solid black;
   border-collapse: collapse;
   height: 40px;
   background-color:white;
   color:black;">TRÁMITE:</th>

   <td style="border:2px solid black;
   border-collapse: collapse;
   text-align:left;
   height: 10px;
   background-color:white;
   padding:10px;">'.$procedure.'</td>
</tr>

<tr>
   <th style="text-align:left;
   padding:10px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   border:2px solid black;
   border-collapse: collapse;
   height: 40px;
   background-color:white;
   color:black;">FOLIOS INICIALES:</th>

   <td style="border:2px solid black;
   border-collapse: collapse;
   text-align:left;
   height: 10px;
   background-color:white;
   padding:10px;">'.$folios.'</td>
</tr>

<tr>
   <th style="text-align:left;
   padding:10px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   border:2px solid black;
   border-collapse: collapse;
   height: 40px;
   background-color:white;
   color:black;">DOCUMENTACÍON:</th>

   <td style="border:2px solid black;
   border-collapse: collapse;
   text-align:left;
   height: 10px;
   background-color:white;
   padding:10px;">'.$documentation.'</td>
</tr>

<tr>
   <th style="text-align:left;
   padding:10px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   border:2px solid black;
   border-collapse: collapse;
   height: 40px;
   background-color:white;
   color:black;">AREA QUE REGISTRA:</th>

   <td style="border:2px solid black;
   border-collapse: collapse;
   text-align:left;
   height: 10px;
   background-color:white;
   padding:10px;">'.$area.'</td>
</tr>

<tr>
   <th style="text-align:left;
   padding:10px;
   font-family: Arial, Helvetica, sans-serif;
   font-weight: bold;
   border:2px solid black;
   border-collapse: collapse;
   height: 40px;
   background-color:white;
   color:black;">OPERADOR:</th>

   <td style="border:2px solid black;
   border-collapse: collapse;
   text-align:left;
   height: 10px;
   background-color:white;
   padding:10px;">'.$name_petitioner.'</td>
</tr>  
</table>


<body>';

?>






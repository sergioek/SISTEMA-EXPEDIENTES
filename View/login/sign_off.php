<nav class="col-lg-3 offset-lg-9">

    <ul class="container row mt-lg-2">
        <li class="offset-1" style="list-style:none;"><label class="text-success font-weight-bold">Usuario: </label><label for=""><?php echo $_SESSION["user"]; ?></label></li>
        <!--El label trae una zona php para mostar el usuario de sesion-->
    </ul>

    <ul class="container row mt-lg-2">
        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/index.php"><input type="button" value="<-INICIO" class="btn btn-info"></a></li>

        <li class=" offset-1" style="list-style: none;"><a href="/SISTEMA EXPEDIENTES/Controller/login/login_destroy.php"><input type="button" value="Cerrar Sesíon" class="btn btn-danger"></a></li>
    </ul>

</nav>

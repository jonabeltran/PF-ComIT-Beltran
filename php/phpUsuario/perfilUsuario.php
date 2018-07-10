
<!DOCTYPE html>
<html lang="en">
<head>

 <link rel="stylesheet" href="css/cssUsuario/estilosPerfil.css">
   
</head>
<body>
    
        <form class="form-horizontal" method="post">
            <fieldset>
                <legend class="text-center header">Tus Datos</legend>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="mi_icono fas fa-user"></i></span>
                    <div class="col-md-8">
                        <label for="nom">Usuario</label>
                        <input type="text" class="form-control" id="nom">
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="mi_icono fas fa-at"></i></span>
                    <div class="col-md-8">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-phone"></i></span>
                    <div class="col-md-8">
                        <label for="tel">Telefono</label>
                        <input id="tel" type="tel" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-address-card"></i></span>
                    <div class="col-md-8">
                        <label for="dire">Direccion</label>
                        <input id="text" type="text" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-unlock-alt"></i></span>
                    <div class="col-md-8">
                        <label for="pass">Contraseña</label>
                        <input id="pass" type="password" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="mi_boton btn btn-primary btn-lg">Modificar</button>
                    </div>
                </div>
            </fieldset>
        </form>
</body>
</html>



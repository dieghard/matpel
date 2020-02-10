<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="XUA-Compatible" content="IE-edge">
        <meta name="title" content="MATPEL 51-03">
        <meta name="description" content="Apliación para MATEPEL">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">
        <link rel="stylesheet" href="vistas/css/loguin.css">
    
    </head>

<body>
    <div class="container">
        
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="vistas/images/logo.jpg" />
            <h3 id="pRecursos" style="margin-left: 30%; margin-top: 5%">Ingreso a Matpel </h3>
            <p id="profile-name" class="profile-name-card"></p>
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Mail" required autofocus>
                <div id="divUsuario"></div>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="divPass"></div>
                <div id="comboCuarteles"></div>
                <div id="remember" class="checkbox"> <label><input type="checkbox" value="remember-me">Recordame</label></div>
                <button type="submit" class="btn-primary btn-signin" name="btn-login"  id="btn-login" >Ingresar</button>
                <a href="vistas\recuperarpass.php" class="forgot-password">olvidaste el password?</a>
        </div><!-- /card-container -->      
    </div><!-- /container -->
         <!-- ESTO ES JQUERY!!!!!! -->
        <script src="vistas/js/jquery-3.3.1.min.js"></script>
          <!-- FIN JQUERY!!!!!! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vistas/js/loguin.js"></script> 
</body>
</html>

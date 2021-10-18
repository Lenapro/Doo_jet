<?php
 session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername; dbname=doo_jet", $username, $password);
if(isset($_POST['valider'])){
    if(!empty($_POST['login']) AND !empty($_POST['password'])){
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

        $recupclient = $conn->prepare('SELECT * FROM client WHERE email= ? AND password = ?');
        $recupclient ->execute(array($login, $password));
        
        if($recupclient->rowcount()>0){
            $_SESSION['login']=$login;
            $_SESSION['password']=$password;
            $_SESSION['prenom']=$recupclient->fetch()['prenom_client'];
            header('Location: client.php');
        }else{
            echo "Email ou Mot de passe incorrects!";
        }

    }else{
        echo "Compléter tous les champs!";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doo-Jet</title>
    <link rel="stylesheet" href="./CSS/personnel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>

<body >
    
    <div class="container-fluid register">
        <div class="row">
            <div class="col-md-5  register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h2>Bienvenue!!</h2>
            </div>
            <div class="col-md-6 register-right card card-container shadow">
                <img id="profile-img" class="profile-img-card" src="../imgs/photo-avatar-profil.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" action="" method="POST">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="inputEmail" class="form-control" name="login" placeholder="Email" required autofocus>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Se souvenir de moi
                        </label>
                    </div>
                    <button class="btn btn-primary" type="submit" name="valider">Connexion</button>
                </form>
                <a href="#" class="forgot-password">
                    Mot de passe oublié?
                </a>
                <a href="./inscription.php" class="inscription"> Créer un compte</a>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="../JS/login.js"></script>
</body>

</html>
<?php
 session_start();

 // création des variables de connexion

$servername = "localhost";
$username = "root";
$password = "";

// connexion à la bdd

$conn = new PDO("mysql:host=$servername; dbname=doo_jet", $username, $password);

//inscription d'un client

if(isset($_POST['envoi'])){ // si on appuie sur le bouton inscription
    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['datenaiss']) AND !empty($_POST['login']) AND !empty($_POST['password'])){ // on vérifie que les champs concernés ne sont pas vides
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $datenaiss = htmlspecialchars($_POST['datenaiss']);
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

// on vérifie si l'utilisateur existe

        $check = $conn->prepare('SELECT email FROM client WHERE email = ?');
        $check->execute(array($login));
        $row = $check->rowCount();

        $login = strtolower($login); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 

        if($row == 0){
            if(filter_var($login, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
            // on insère dans la base de donnée
                $insertclient = $conn->prepare('INSERT INTO client(prenom_client, nom_client, datenaiss, email, password) VALUES(?, ?, ?, ?,?)');
                $insertclient ->execute(array($prenom, $nom, $datenaiss, $login, $password));
                $_SESSION['login']=$login;
                $_SESSION['password']=$password;
                $_SESSION['prenom']=$prenom;

                header('Location: client.php?reg_err=success');
            }
            else{
                header('Location: inscription.php?reg_err=email');
                die();
            }
        }
            
        else{
            header('Location: inscription.php?reg_err=clientexiste');
            die();
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
    <link rel="stylesheet" href="./CSS/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel= "stylesheet" href= "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>

<body>

    <div class="container-fluid register">
        <div class="row">
            <div class="col-md-5  register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h2>Bienvenue!!</h2>
            </div>
            <div class="col-md-6 register-right card card-container shadow">
                <form class="form-signin" action="" method="POST">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="inputprenom" class="form-control">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="inputnom" class="form-control">
                    <label for="datenaiss">Date de naissance</label>
                    <input type="date" name="datenaiss" id="" class="form-control">
                    <span id="reauth-email" class="reauth-email"></span>
                    <label for="email">Email</label>
                    <input type="email" id="inputEmail" class="form-control" name="login" placeholder="ex: h@gmail.com" required autofocus autocomplete="off">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required autocomplete="off">
                    <button class="btn btn-primary" type="submit" name="envoi">Inscription</button>
                </form>
               
            </div>
        </div>

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</body>

</html>
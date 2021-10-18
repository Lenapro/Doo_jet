<?php
session_start();
if(!$_SESSION['password']){ // si l'utilisateur ne saisi pas de mot de passe
    header('Location: login.php');
}
echo $_SESSION['prenom'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doo-Jet</title>
    <link rel="stylesheet" href="./CSS/client.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
                <div class="user-logo">
                    <div class="img" style="background-image: url(images/logo.jpg);"></div>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#"><span class="fa fa-home mr-3"></span>Accueil</a>
                </li>
                <li>
                    <a href="#" style="color:white"><span class="fa fa-cog mr-3"></span> Paramètres</a>
                </li>
                <li>
                    <a href="#" style="color:white"><span class="fa fa-cart-arrow-down mr-3"></span>Mes réservations</a>
                </li>
                <li>
                    <a href="deconnexion.php" style="color:white"><span class="fa fa-sign-out mr-3"></span>
                    <button class="btn " type="submit" name="envoi" style="color:white">Déconnexion</button></a>
                </li>

            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content" class="p-3">
            <nav class="navbar navbar-expand-lg navbar-light  fixed bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" style="border: none;">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <a class="navbar-brand" href="#!" style="margin-left: 7px;">
                        <h2> <i>Doo-Jet</i> </h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-2">
                            <li class="nav-item" style="margin-left: 10%;"><a class="nav-link active"
                                    aria-current="page" href="home.html">Accueil</a></li>
                            <li class="nav-item" style="margin-left: 10%;"><a class="nav-link active"
                                    href="#offre">Offres</a>
                            </li>
                            <div class="collapse navbar-collapse" id="dropdownMenu2" style="margin-left: 10%;">
                                <ul class="navbar-nav">
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdownMenu2" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 114px;">
                                       Réservations
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenu2">
                                      <li>
                                          <a class="dropdown-item" >
                                            <button class="bg-light nav-item" style="border: none;" onclick="loadDoc()"
                                            type="button">Nouvelle réservation</button>
                                          </a>
                                        </li>
                                      <li><a class="dropdown-item" href="#">Consulter/Modifier/Annuler</a></li>
                                      <li><a class="dropdown-item" href="#">Mes réservations</a></li>
                                    </ul>
                                  </li>
                                </ul>
                              </div>
                            <li class="nav-item" style="margin-left: 10%;"><a class="nav-link active"
                                    href="#contact"></a>
                            </li>
                        </ul>
                        <div>
                            <img src="../imgs/image.jpg" alt="" style="width: 60px; height: 50px;"
                                class="rounded-circle">
                        </div>
                                
                    </div>
                </div>
            </nav>
            <div class="pt-5" id="demo">
                <div style="margin: auto; width: 65%;">
                    <h2 class="text-center" style="color:whitesmoke;">Trouvez un créneau disponible pour la location de
                        scooters des mers
                    </h2>
                </div>
                <div class="shadow py-5 px-lg-5  container " id="mainclass">
                    <form action="./client.html" method="POST" style="margin: auto; width: 95% ;">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="user"> PRISE DE SCOOTER :</label><br>
                                <input type="date" id="user" style="height: 40px; width: 138px;">
                                <input type="time" value="14:00" style="height: 40px;">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="user"> REPRISE DE SCOOTER :</label><br>
                                <input type="date" id="user" style="height: 40px; width: 138px;">
                                <input type="time" value="14:00" style="height: 40px;">
                            </div>
                            <div class="form-group col-sm-4">
                                <button class="btn btn-primary " type="submit" value="Submit Button"
                                    style="margin-top: 8%; margin-left: 20%;">
                                    Rechercher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>

        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                document.getElementById("demo").innerHTML = this.responseText;
            }
            xhttp.open("GET", "réservation.html");
            xhttp.send();
        }
    </script>
    <script src="../JS/client.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


</body>

</html>
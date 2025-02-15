<?php
session_start();
include("../bdd/bdd.php");
include("../class/user.php");

// $id_utilisateur = $_SESSION['id_utilisateur'];
$login = $_SESSION['id_utilisateur'];
$isAdmin = $_SESSION['isAdmin'];

// L'exit est rajouté à chaque fin de "if" pour éviter que le reste de code ne s'exécute intentionnellement si la condition
// n'est pas remplie.

// Vérifier si l'utilisateur est connecté via la session
if (!isset($_SESSION['id_utilisateur'])) {
    header('location: ../index.php');
    exit;
}

// Si l'utilisateur souhaite se déconnecter
if (isset($_POST['deconnexion'])) {
    User::Deconnexion(); // Appel de la fonction "Deconnexion" dans la Class User
    header('location: ../index.php'); // Redirection vers la page de connexion
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PROJET GPS - Accueil</title>

    <!-- Custom fonts for this template-->
    <link href="../assets//vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets//css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CSS POUR LINTERFACE CUSTOM-->
    <link href="../assets//css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="accueil.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PROJET <sup>GPS</sup></div>
            </a>
            
            <!-- Nav Item - Accueil -->
            <li class="nav-item active">
                <a class="nav-link" href="accueil.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Accueil</span></a>
            </li>

            <!-- Condition pour afficher la partie "Nav Item - Admin" uniquement si isAdmin est égal à 1 -->
            <?php if ($isAdmin == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Espace Admin</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <!-- On affiche le nom de l'user -->
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $login; ?></span>

                                <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="parametres.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Paramètres
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="">
                                    <button type="submit" name="deconnexion" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <p id="status">Status : Aucun</p>

                <fieldset sty>
                    <label for="r">R</label>
                    <input type="range" min="0" max="255" id="r" step="1" value="0">
                    <output for="r" id="r_out">0</output>
                </fieldset>  
                
                <fieldset>
                    <label for="g">G</label>
                    <input type="range" min="0" max="255" id="g" step="1" value="0">
                    <output for="g" id="g_out">0</output>
                </fieldset>
                
                <fieldset>
                    <label for="b">B</label>
                    <input type="range" min="0" max="255" id="b" step="1" value="0">
                    <output for="b" id="b_out">0</output>
                </fieldset>

                <fieldset>
                    <label for="w">W</label>
                    <input type="range" min="0" max="255" id="w" step="1" value="0">
                    <output for="w" id="w_out">0</output>
                </fieldset>

                <fieldset>
                    <input type="checkbox" id="changementAuto" name="changementAuto">
                    <label for="changementAuto">Changement automatique</label>
                </fieldset>

                <fieldset id="adressLum">
                    <label for="adress">Adresse Lumière</label>
                    <input type="range" min="0" max="510" id="adress" step="1" value="0">
                    <output for="adress" id="adress_out">0</output>
                </fieldset>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PROJET GPS</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets//vendor/jquery/jquery.min.js"></script>
    <script src="../assets//vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets//vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets//js/sb-admin-2.min.js"></script>
    
    <script src="../assets/js/websocket.js"></script>
</body>

</html>
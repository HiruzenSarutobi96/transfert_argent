<div class="container">

<div class="row">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" datta-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="main.php">
                <div class="row">
                    <div class="col-md-12 nom">
                        <?php
                            echo $_SESSION['nom'].' '.$_SESSION['prenom'];
                        ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="navbar-collapse collapse navbar-right elementMenu" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="main.php"><i class="glyphicon glyphicon-home"></i>Accueil</a></li>
                <li><a href="operation.php"><i class="glyphicon glyphicon-book"></i>Operation</a></li>
                <?php
                    if($_SESSION['type_user'] == "ADMINISTRATEUR"){
                        echo "<li><a href='rechargement.php'><i class='glyphicon glyphicon-book'></i>Rechargement</a></li>";
                        echo "<li><a href='operateur.php'><i class='glyphicon glyphicon-book'></i>Operateur</a></li>";
                        echo "<li><a href='user.php'><i class='glyphicon glyphicon-user'></i>Ajouter</a></li>";
                        echo "<li><a href='type_operation.php'><i class='glyphicon glyphicon-user'></i>Type Operation</a></li>";
                    }
                ?>
                <li><a href='deconexion.php'><i class='glyphicon glyphicon-off'></i>Deconexion</a></li>
                <!--li><a href="bilan.php"><i class="glyphicon glyphicon-book"></i>Bilan</a></li-->
            </ul>
        </div>
    </nav>
</div>
</div>
<?php
    
    session_start();
    
?>

<html>
    <head>
        <title>Operation</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"-->
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/style2.css">
        <!--script src="Jquery/jquery.min.js"></script-->
        <!--script src="bootstrap/js/bootsrap.min.js"></script-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
    </head>

    <body> 

    <?php
        require("menu.php");
    ?>

      <div class="container">
      <div class="row">
            <div class="col-xs-12 col-md-12">
            <h2 class="titrePage">NOUVEAU TYPE OPERATION</h2>
                <div class="jumbotron text-center cadre">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-xs-offset-3 col-md-offset-3">
                            <form class="form-horizontal" role="form" method="post" action="" id="connection-form">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="type">TYPE OPERATION</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="text" class="form-control" name="type" id="type">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <button type="submit" name="typer" class="btn btn-success" id="typer">EFFECTUER</button>
                                <button type="reset" name="reset" class="btn btn-danger">ANNULER</button>
                            </form>
                        </div>
                    </div>
                    <?php

                        if(isset($_POST['typer'])){
                            
                            require("connexion.php");
                            $type = verifyInput($_POST["type"]);
                            $db = DataBase::connect();
                            $requette = $db->prepare("INSERT INTO type_operation(nomType)VALUES(?)");
                            $verif = $requette->execute(array($type));
                            if($verif){
                                echo '<div class="bg-success text-center"><h2>Enregistrement Reussie</h2></div>';
                            }else{
                                echo '<div class="bg-danger text-center error"><h2>Erreur Pendant l\'enregistrement</h2> </div>';
                            }

                        }

                        function verifyInput($var){
                    
                            $var = trim($var);
                            $var = stripslashes($var);
                            $var = htmlspecialchars($var);
                            return $var;
                    
                        }
                    ?>
                </div>
            </div>
      </div>

      <div class="container pied">
        <div class="row">
            
        </div>
      </div>

    </body>
</html>
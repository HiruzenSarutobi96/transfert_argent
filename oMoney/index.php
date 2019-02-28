<?php
    
    session_start();
    
?>

<html>
    <head>
        <title>Connexion</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"-->
        <link rel="stylesheet" href="style/style.css">
        <!--script src="Jquery/jquery.min.js"></script-->
        <!--script src="bootstrap/js/bootsrap.min.js"></script-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="container accueil">

            <div class="row">
                <div class="col-xs-12 col-md-12 text-center presentation">
                    <h1>BIENVENUE SUR MOMO DU QUARTIER</h1>
                </div>
            </div>

            <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="jumbotron text-center cadre">
                    <h2>Connexion</h2>
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-xs-offset-3 col-md-offset-3">
                            <form role="form" method="post" action="" id="connection-form">
                                <div class="form-group">
                                    <label for="pseudo">PSEUDONYME</label>
                                    <input type="text" class="form-control" name="pseudo" id="pseudo">
                                    <span class="control"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">MOT DE PASSE</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <span class="control"></span>
                                </div>
                                <button type="submit" name="login" class="btn btn-success" id="login">Valider</button>
                                <button type="reset" name="reset" class="btn btn-danger">Effacer</button>
                            </form>
                        </div>
                    </div>
                    
                    <?php

                        require("connexion.php");
                        $db = DataBase::connect();
                        if(isset($_POST["login"])){
                            
                            $pseudo = verifyInput($_POST["pseudo"]);
                            $password = $_POST["password"];
                            $password = md5($password);
                    
                            $sql = $db->prepare("SELECT idUser FROM user WHERE pseudo = ?");
                            $sql->execute(array($pseudo));
                            $user = $sql->fetchAll(PDO::FETCH_ASSOC);

                            if ($user){

                              $sql2 = $db->prepare("SELECT idUser FROM user WHERE passwordUser= ?");
                              $sql2->execute(array($password));
                              $user2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

                              if ($user2){

                                foreach ($user2 as $res){

                                  $code = $res['idUser'];

                                }

                                $sql3 = $db->prepare("SELECT nomUser,prenUser,nomTypeUser FROM user,type_user WHERE idUser = ? AND type_user.codeTypeUser = user.codeTypeUser");
                                $sql3->execute(array($code));
                                $id = $sql3->fetchAll(PDO::FETCH_ASSOC);

                                if ($id){

                                  foreach ($id as $res1){

                                    $_SESSION['code'] = $code;
                                    $_SESSION['nom'] = $res1['nomUser'];
                                    $_SESSION['prenom'] = $res1['prenUser'];
                                    $_SESSION['type_user'] = $res1['nomTypeUser'];

                                  }

                                  header('location:main.php');

                                }
                              }else{

                                echo '<div class="bg-danger text-center error"><h2>MOT DE PASSE INCORRECTE </h2></div>';

                              }

                            }else{

                              echo '<div class="bg-danger text-center error"><h2>COMPTE INEXISTANT</h2> </div>';

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
    </body>
</html>
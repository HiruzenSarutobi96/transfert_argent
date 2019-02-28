<?php
    
    session_start();
    
?>

<html>
    <head>
        <title>USER</title>
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
            <h2 class="titrePage">NOUVEL UTILISATEUR</h2>
                <div class="jumbotron text-center cadre">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-xs-offset-3 col-md-offset-3">
                            <form class="form-horizontal" role="form" method="post" action="" id="connection-form">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="nom">NOM</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="text" class="form-control" name="nom" id="nom">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="prenom">PRENOM</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="text" class="form-control" name="prenom" id="prenom">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="contact">CONTACT</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="text" class="form-control" name="contact" id="contact">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="pseudo">PSEUDO</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="text" class="form-control" name="pseudo" id="pseudo">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="mdp">MOT DE PASSE</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="password" class="form-control" name="mdp" id="mdp">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="confmdp">CONFIRMATION</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="password" class="form-control" name="confmdp" id="confmdp">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="type_user">TYPE USER</label>
                                    <select class="col-md-9 col-sm-9 col-xs-9" name="type_user" id="type_user">
                                    <?php
                                        require("connexion.php");
                                        $db = DataBase::connect();
                                        $requette = $db->query("SELECT codeTypeUser,nomTypeUser FROM type_user");
                                        $donne = $requette->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($donne as $resultat){
                                            echo '<option value="'.$resultat['codeTypeUser'].'">'.$resultat['nomTypeUser'].'</option>';
                                        }
                                    ?>
                                    </select>
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <button type="submit" name="inscrire" class="btn btn-success" id="inscrire">EFFECTUER</button>
                                <button type="reset" name="reset" class="btn btn-danger">ANNULER</button>
                            </form>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST["inscrire"])){
                            $db = DataBase::connect();
                            $nom = verifyInput($_POST["nom"]);
                            $prenom = verifyInput($_POST["prenom"]);
                            $contact = verifyInput($_POST["contact"]);
                            $pseudo = verifyInput($_POST["pseudo"]);
                            $mdp = $_POST["mdp"];
                            $type_user = $_POST["type_user"];
                            $mdp = md5($mdp);
                            
                            $Requetteinsertion = $db->prepare("INSERT INTO user(nomUser,prenUser,contUser,pseudo,passwordUser,codeTypeUser)VALUES(?,?,?,?,?,?)");
                            $verifins = $Requetteinsertion->execute(array($nom,$prenom,$contact,$pseudo,$mdp,$type_user));
                            if($verifins){
                                echo '<div class="bg-success text-center"><h2>Insertion Reussie</h2> </div>';
                            }else{
                                echo '<div class="bg-success text-center error"><h2>Echec de l insertion</h2> </div>';
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
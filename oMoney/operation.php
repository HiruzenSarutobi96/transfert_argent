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
            <h2 class="titrePage">NOUVELLE OPERATION</h2>
                <div class="jumbotron text-center cadre">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-xs-offset-3 col-md-offset-3">
                            <form class="form-horizontal" role="form" method="post" action="" id="connection-form">
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="numero">NUMERO</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="text" class="form-control" name="numero" id="numero">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="montant">MONTANT</label>
                                    <input class="col-md-9 col-sm-9 col-xs-9" type="text" class="form-control" name="montant" id="montant">
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="operation">OPERATION</label>
                                    <select class="col-md-9 col-sm-9 col-xs-9" name="operation" id="operation">
                                    <?php
                                        require("connexion.php");
                                        $db = DataBase::connect();
                                        $requette = $db->query("SELECT codeType,nomType FROM type_operation");
                                        $donne = $requette->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($donne as $resultat){
                                            echo '<option value="'.$resultat['codeType'].'">'.$resultat['nomType'].'</option>';
                                        }
                                    ?>
                                    </select>
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-3" for="operateur">OPERATEUR</label>
                                    <select class="col-md-9 col-sm-9 col-xs-9" name="operateur" id="operateur">
                                    <?php
                                            $db = DataBase::connect();
                                            $requette = $db->query("SELECT codeOperateur,nomOperateur FROM operateur");
                                            $donne = $requette->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($donne as $resultat){
                                                echo '<option value="'.$resultat['codeOperateur'].'">'.$resultat['nomOperateur'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <span class="col-md-12 col-sm-12 col-xs-12 control"></span>
                                </div>
                                <button type="submit" name="valider" class="btn btn-success" id="valider">EFFECTUER</button>
                                <button type="reset" name="reset" class="btn btn-danger">ANNULER</button>
                            </form>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST["valider"])){
                            $num = verifyInput($_POST["numero"]);
                            $montant = verifyInput($_POST["montant"]);
                            $operation = verifyInput($_POST["operation"]);
                            $operateur = verifyInput($_POST["operateur"]);
                            $date = date("Y-m-d");
                            $heure = date("H:i:s");
                            $recupData = $db->prepare("SELECT montDispo FROM operateur WHERE codeOperateur = ?");
                            $verifData = $recupData->execute(array($operateur));
                            if($verifData){
                                $donne = $recupData->fetchAll(PDO::FETCH_ASSOC);
                                foreach($donne as $resultat){
                                    $mont = $resultat['montDispo'];
                                }

                                if($mont < $montant){

                                    echo '<div class="bg-danger text-center error"><h2>SOLDE INSUFFISANT</h2> </div>';

                                }else{
                                    $mont -= $montant;
                                    $requetteIns = $db->prepare("INSERT INTO operation(montantOpe,numero,dateOpe,heureOpe,codeType,codeOperateur)VALUES(?,?,?,?,?,?)");
                                    $verif = $requetteIns->execute(array($montant,$num,$date,$heure,$operation,$operateur));
                                    if($verif){
                                    
                                        $modifData = $db->prepare("UPDATE operateur SET montDispo = ? WHERE codeOperateur = ?");
                                        $verifModifData = $modifData->execute(array($mont,$operateur));
                                        if($verifModifData){
                                            
                                            echo '<div class="bg-success text-center"><h2>OPERATION EFFECTUE AVEC SUCCES</h2> </div>';

                                        }else{

                                            echo '<div class="bg-danger text-center error"><h2>ERREUR LORS DE LA MODIFICATION</h2> </div>';

                                        }

                                    }
                                }
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
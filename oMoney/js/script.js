$(function(){
    $("#login").click(function() {
      valid = true;
      if($("#pseudo").val() == ""){
        $("#pseudo").css("border-color","red");
        $("#pseudo").next(".control").fadeIn().text("Veuillez entrer votre identifant");
        valid = false;
      }
      else{
        $("#pseudo").next(".control").fadeOut();
        $("#pseudo").css("border-color","black");
      }
      if ($("#password").val() == ""){
        $("#password").css("border-color","red");
        $("#password").next(".control").fadeIn().text("Veuillez entrer votre mot de passe");
      valid = false;
    }
    else{
      $("#password").next(".control").fadeOut();
      $("#password").css("border-color","black");
    }
    return valid;
  });
});


$(function(){

  $("#creer").click(function(){
    valid = true;
    if($("#nom").val() == ""){
      $("#nom").css("border-color","red");
      $("#nom").next(".control").fadeIn().text("Veuillez entrer le Nom de L'operateur");
      valid = false;
    }else if(!$("#nom").val().match(/^[a-z]/i)){
      $("#nom").css("border-color","red");
      $("#nom").next(".control").fadeIn().text("Veuillez entrer un nom Valide");
      valid = false;
    }else{
      $("#nom").next(".control").fadeOut();
      $("#nom").css("border-color","green");
    }
    if($("#montant").val() == ""){
      $("#montant").css("border-color","red");
      $("#montant").next(".control").fadeIn().text("Veuillez Entrer le Montant de la Recharge");
      valid = false;
    }else if(!$("#montant").val().match(/^[0-9]/)){
      $("#montant").css("border-color","red");
      $("#montant").next(".control").fadeIn().text("Seulement des chiffres pour ce champ");
      valid = false;
    }else{
      $("#montant").next(".control").fadeOut();
      $("#montant").css("border-color","green");
    }
    return valid;

  });

});

$(function(){
  $("#recharger").click(function(){
    valid = true;

    if($("#montant").val() == ""){
      $("#montant").css("border-color","red");
      $("#montant").next(".control").fadeIn().text("Veuillez Entrer le Montant de la Recharge");
      valid = false;
    }else if(!$("#montant").val().match(/^[0-9]/)){
      $("#montant").css("border-color","red");
      $("#montant").next(".control").fadeIn().text("Seulement des chiffres pour ce champ");
      valid = false;
    }else{
      $("#montant").next(".control").fadeOut();
      $("#montant").css("border-color","green");
    }

    return valid;
  });
});


$(function(){
  $("#typer").click(function(){
    valid = true;

    if($("#type").val() == ""){
      $("#type").css("border-color","red");
      $("#type").next(".control").fadeIn().text("Veuillez Entrer le type SVP");
      valid = false;
    }else if(!$("#type").val().match(/^[a-z]/i)){
      $("#type").css("border-color","red");
      $("#type").next(".control").fadeIn().text("Veuillez entrer un nom Correcte SVP");
      valid = false;
    }else{
      $("#type").next(".control").fadeOut();
      $("#type").css("border-color","green");
    }

    return valid;
  });
});


$(function(){
  $("#valider").click(function(){
    valid = true;

    if($("#montant").val() == ""){
      $("#montant").css("border-color","red");
      $("#montant").next(".control").fadeIn().text("Veuillez Entrer le Montant de la Recharge");
      valid = false;
    }else if(!$("#montant").val().match(/^[0-9]/)){
      $("#montant").css("border-color","red");
      $("#montant").next(".control").fadeIn().text("Seulement des chiffres pour ce champ");
      valid = false;
    }else{
      $("#montant").next(".control").fadeOut();
      $("#montant").css("border-color","green");
    }

    if($("#numero").val() == ""){
      $("#numero").css("border-color","red");
      $("#numero").next(".control").fadeIn().text("Veuillez Entrer le Montant de la Recharge");
      valid = false;
    }else if(!$("#numero").val().match(/^[0-9]/)){
      $("#numero").css("border-color","red");
      $("#numero").next(".control").fadeIn().text("Seulement des chiffres pour ce champ");
      valid = false;
    }else{
      $("#numero").next(".control").fadeOut();
      $("#numero").css("border-color","green");
    }

    return valid;
  });
});


$(function(){
  $("#inscrire").click(function(){
    valid = true;

    if($("#nom").val() == ""){
      $("#nom").css("border-color","red");
      $("#nom").next(".control").fadeIn().text("Veuillez Entrer le Nom de l'utilisateur");
      valid = false;
    }else if(!$("#nom").val().match(/^[a-z]/i)){
      $("#nom").css("border-color","red");
      $("#nom").next(".control").fadeIn().text("Veuillez Entrer un nom Valide");
      valid = false;
    }else{
      $("#nom").next(".control").fadeOut();
      $("#nom").css("border-color","green");
    }

    if($("#prenom").val() == ""){
      $("#prenom").css("border-color","red");
      $("#prenom").next(".control").fadeIn().text("Veuillez Entrer le Prenom de l'utilisateur");
      valid = false;
    }else if(!$("#prenom").val().match(/^[a-z]/i)){
      $("#prenom").css("border-color","red");
      $("#prenom").next(".control").fadeIn().text("Veuillez Entrer un prenom valide");
      valid = false;
    }else{
      $("#prenom").next(".control").fadeOut();
      $("#prenom").css("border-color","green");
    }

    if($("#contact").val() == ""){
      $("#contact").css("border-color","red");
      $("#contact").next(".control").fadeIn().text("Veuillez Entrer le Numero de l'utilisateur ");
      valid = false;
    }else if(!$("#contact").val().match(/^[0-9]/)){
      $("#contact").css("border-color","red");
      $("#contact").next(".control").fadeIn().text("Seulement des chiffres pour ce champ");
      valid = false;
    }else{
      $("#contact").next(".control").fadeOut();
      $("#contact").css("border-color","green");
    }

    if($("#pseudo").val() == ""){
      $("#pseudo").css("border-color","red");
      $("#pseudo").next(".control").fadeIn().text("Veuillez Entrer Votre Pseudonyme (identifiant de connexion)");
      valid = false;
    }else{
      $("#pseudo").next(".control").fadeOut();
      $("#pseudo").css("border-color","green");
    }

    if($("#mdp").val() == ""){
      $("#mdp").css("border-color","red");
      $("#mdp").next(".control").fadeIn().text("Veuillez Saisir le Mot de passe ");
      valid = false;
    }else{
      $("#mdp").next(".control").fadeOut();
      $("#mdp").css("border-color","green");
    }

    if($("#confmdp").val() == ""){
      $("#confmdp").css("border-color","red");
      $("#confmdp").next(".control").fadeIn().text("Veuillez Resaisir Votre mot de Passe ");
      valid = false;
    }else if($("#confmdp").val() != $("#mdp").val()){
      $("#confmdp").css("border-color","red");
      $("#confmdp").next(".control").fadeIn().text("Echec Confirmation Mot de Passe");
      valid = false;
    }else{
      $("#confmdp").next(".control").fadeOut();
      $("#confmdp").css("border-color","green");
    }

    return valid;
  });
});

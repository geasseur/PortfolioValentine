$(document).ready(function(){
  $('.editer').click(function(){
    alert('merde');
  });
    $(".editer").click(function(){
        $('.informations').hide();
        $('.edition').show();
    });

    $(".annuler").click(function(){
        $('.informations').show();
        $('.edition').hide();
    });
});

// var form = document.forms.namedItem("ajoutVideo");
// form.addEventListener('submit', function(ev) {
//
//   var oOutput = document.querySelector("div"),
//       oData = new FormData(form);
//
//   oData.append("CustomField", "Données supplémentaires");
//
//   var oReq = new XMLHttpRequest();
//   oReq.open("POST", "stash.php", true);
//   oReq.onload = function(oEvent) {
//     if (oReq.status == 200) {
//       oOutput.innerHTML = "Envoyé !";
//     } else {
//       oOutput.innerHTML = "Erreur " + oReq.status + " lors de la tentative d’envoi du fichier.<br \/>";
//     }
//   };
//
//   oReq.send(oData);
//   ev.preventDefault();
// }, false);

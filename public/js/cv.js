var cv;
var elementCV = document.getElementsByClassName('test');
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function chargementCV(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var json = this.responseText;
      cv = JSON.parse(json);
      console.log(cv);
      var generation = new creerCV(cv);
      generation.genererCV(cv);
    }
  }
  xmlhttp.open("GET", "cv.json", true);
  xmlhttp.send();
}

function creerCV(cv){
  this.cv = cv;

  this.genererCV = function(cv){
    elementCV[0].innerHTML = cv.mail;
  }
  this
}

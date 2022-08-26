document.getElementById("confirm-password").onkeyup = function(e) {
  if (document.getElementById("password").value != document.getElementById("confirm-password").value) {
    console.log("alo");
    document.getElementsById("alert-retype-pass").style.display = "block";
  } else {
    document.getElementsById("alert-retype-pass").style.display = "none";
  }
}



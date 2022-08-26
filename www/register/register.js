var userNameRegex = /^[A-Za-z0-9]{8,15}$/;
var passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,20}$/;
var lengthRegex = /^.{5,}$/;

document.getElementById("username").onkeyup = function(e) {
  if (!document.getElementById("username").value.match(userNameRegex)) {
    document.getElementById("alert-username").style.display = "block";
  } else {
    document.getElementById("alert-username").style.display = "none";
  }
}

document.getElementById("password").onkeyup = function(e) {
  if (!document.getElementById("password").value.match(passRegex)) {
    document.getElementById("alert-pass").style.display = "block";
  } else {
    document.getElementById("alert-pass").style.display = "none";
  }
}

document.getElementById("name").onkeyup = function(e) {
  if (!document.getElementById("name").value.match(lengthRegex)) {
    document.getElementById("alert-name").style.display = "block";
  } else {
    document.getElementById("alert-name").style.display = "none";
  }
}

document.getElementById("address").onkeyup = function(e) {
  if (!document.getElementById("address").value.match(lengthRegex)) {
    document.getElementById("alert-address").style.display = "block";
  } else {
    document.getElementById("alert-address").style.display = "none";
  }
}

document.getElementById("confirm-password").onkeyup = function(e) {
  if (document.getElementById("password").value != document.getElementById("confirm-password").value) {
    document.getElementById("alert-retype-pass").style.display = "block";
  } else {
    document.getElementById("alert-retype-pass").style.display = "none";
  }
}

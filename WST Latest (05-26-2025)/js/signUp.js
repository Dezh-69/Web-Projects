"use strict";

// SIGN UP STUDENT

let passError = 0;
let confPassError = 0;

let passWarning = document.querySelector(".pass");
let confWarning = document.querySelector(".conf-pass");

function checkValidPassword() {
  const passwordPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  let password = document.getElementById("password").value;

  if (passwordPattern.test(password)) {
    console.log("Password is valid!");
    passWarning.textContent = "Password: Strong";
    passWarning.style.color = "green";
    passError = 0;
  } else {
    console.log("Password is invalid!");
    passWarning.textContent = "Password: Weak";
    passWarning.style.color = "red";
    passError = 1;
  }
}

const ageInput = document.getElementById("age");
ageInput.addEventListener("keydown", function (e) {
  if (e.key.toLowerCase() === "e") {
    e.preventDefault();
  }
});

function checkConfPassword() {
  const password = document.getElementById("password").value;
  const confPassword = document.getElementById("conf-password").value;
  if (password !== confPassword) {
    console.log("Password not match!");
    confWarning.textContent = "Password not match!";
    confWarning.style.color = "red";
    confPassError = 1;
  } else {
    console.log("Password match!");
    confWarning.textContent = "Password match!";
    confWarning.style.color = "green";
    confPassError = 0;
  }
}

function signUp() {
  checkValidPassword();
  checkConfPassword();
  if (passError === 1) {
    alert(
      "Password must be 8+ characters with uppercase, lowercase, number, and symbol."
    );
    return false;
  } else if (confPassError === 1) {
    alert("Passwords do not match. Please try again.");
    return false;
  } else {
    alert("Sign-up successful!");
    return true;
  }
}

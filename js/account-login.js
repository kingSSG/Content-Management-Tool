let email_ = "admin@gmail.com";
let password_ = "0000";

console.log("login");

let signInBtn = document.getElementById("signInBtn");
let rememberMe = document.getElementById("rememberme");
let createAccSlideBtn = document.getElementById("createAccSlideBtn");
let forgotPwdSlideBtn = document.getElementById("forgottenPwd");

createAccSlideBtn.addEventListener("click", () => {
  document.cookie = "cms_ca=true";
  window.open("./account-signup", "_self");
});

forgotPwdSlideBtn.addEventListener("click", () => {
  document.cookie = "cms_ca=false";
  window.open("./email-verify", "_self");
});

signInBtn.addEventListener("click", () => {
  let usrname = document.getElementById("username");
  let pwd = document.getElementById("password");

  if (
    (usrname.value.length <= 5 || pwd.value.length < 4) &&
    !validateEmail(usrname.value)
  ) {
    alert(
      "Invalid email or password!\nIf you forget your password then go to forgot password."
    );
    return;
  }

  document.cookie = "cms_username=" + usrname.value;
  document.cookie = "cms_password=" + pwd.value;
  window.localStorage.setItem("cms_passwordRem", "false");
  window.localStorage.setItem("cms_username", usrname.value);
  window.localStorage.setItem("cms_password", "");
  if (rememberMe.checked) {
    document.cookie = "cms_passwordRem=true";
    window.localStorage.setItem("cms_password", pwd.value);
    window.localStorage.setItem("cms_passwordRem", "true");
  }
  document.cookie = "cms_passwordRem=false";
  window.open("account-login-confirm", "_self");
});

function validateEmail(input) {
  var validRegex =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  return input.match(validRegex) ? true : false;
}

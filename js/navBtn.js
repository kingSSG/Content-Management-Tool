let expires = new Date(Date.now() + 86400 * 1000 * 30).toUTCString;

document.cookie = "cms_email=" + window.localStorage.getItem("cms_username");

let homePageBtn = document.getElementById("homePageBtn");
let createPageBtn = document.getElementById("createPageBtn");
let profilePageBtn = document.getElementById("profilePageBtn");

homePageBtn.addEventListener("click", goToHomePage);
createPageBtn.addEventListener("click", goToCreatePage);
profilePageBtn.addEventListener("click", goToProfilePage);

function goToHomePage() {
  btnValue = "home";
  window.localStorage.setItem("requestPage", btnValue);
  window.open("index", "_self");
}


let email = window.localStorage.getItem("cms_username");
let password = window.localStorage.getItem("cms_password");

function goToCreatePage() {
  btnValue = "create";
  window.localStorage.setItem("requestPage", btnValue);
  document.cookie = "requestPage=" + btnValue;
  if (email != null && password != null) {
    document.cookie =
      "cms_username=" +
      window.localStorage.getItem("cms_username") +
      "; expires=" +
      expires +
      "; path=/;";
    document.cookie =
      "cms_password=" +
      window.localStorage.getItem("cms_password") +
      "; expires=" +
      expires +
      "; path=/;";
    window.open("./account-login-confirm", "_self");
  } else window.open("account-login", "_self");
}

function goToProfilePage() {
  btnValue = "profile";
  document.cookie = "requestPage=" + btnValue;
  window.localStorage.setItem("requestPage", btnValue);
  if (email != null && password != null) {
    document.cookie =
      "cms_username=" +
      window.localStorage.getItem("cms_username") +
      "; expires=" +
      expires +
      "; path=/;";
    document.cookie =
      "cms_password=" +
      window.localStorage.getItem("cms_password") +
      "; expires=" +
      expires +
      "; path=/;";
    window.open("./profile", "_self");
  } else window.open("account-login", "_self");
}


let createPwd = document.getElementById("createPwd").value;
let confirmPwd = document.getElementById("confirmPwd").value;

let createPwdBtn = document.getElementById("createPwdBtn");
let ca = getCookie("cms_ca");

createPwdBtn.addEventListener("click", () => {
  createPwd = document.getElementById("createPwd").value;
  confirmPwd = document.getElementById("confirmPwd").value;
  if (createPwd.length < 4) {
    alert("Password must be atleast of 4 character!");
    return;
  }

  if (createPwd == confirmPwd) {
    document.cookie = "cms-create-pwd=" + createPwd;

    if (ca == "true") {
      alert("Account has been created successfully!");
    } else {
      alert("Password has been changed successfully!");
    }
    window.open("./confirmation", "_self");
  } else {
    alert("Both the password must be same!");
  }
});

function getCookie(name) {
  return (
    (name = (document.cookie + ";").match(new RegExp(name + "=.*;"))) &&
    name[0].split(/=|;/)[1]
  );
}

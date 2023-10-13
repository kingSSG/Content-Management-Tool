let logOutBtn = document.getElementById("logOutBtn");

let getPostID = document.getElementsByClassName("postID");
let PostID = "";
for (let i = 0; i < getPostID.length; i++) {
    getPostID[i].addEventListener("click", () => {
      PostID = getPostID[i].id;
      window.localStorage.setItem("cms_PID", PostID);
      document.cookie = "cms_PID=" + PostID;
      window.open("./viewPost.php", "_self");
  });
}

logOutBtn.addEventListener("click", () => {
  window.localStorage.setItem("cms_username", "");
  window.localStorage.removeItem("cms_password");
  window.localStorage.removeItem("cms_passwordRem");

  window.open("account-login", "_self");
  close("profile.php");
});


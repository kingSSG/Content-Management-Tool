let createBlogBtn = document.getElementById("createBlogBtn");

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

createBlogBtn.addEventListener("click", () => {
  btnValue = "create";
  window.localStorage.setItem("requestPage", btnValue);
  window.localStorage.setItem("hello", "opened");

  if (
    email == window.localStorage.getItem("cms_username") &&
    password == window.localStorage.getItem("cms_password")
  )
    window.open("createPost");
  else window.open("account-login");
});

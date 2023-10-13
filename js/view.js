let viewPostTitle = document.getElementById("viewPostTitle");

let file = getCookie("cms_cf");
let fileType = extCheck(file);
let imgView = document.getElementById("viewImage");
let videoView = document.getElementById("viewVideo");
let backBtn = document.getElementById("backBtn");

backBtn.addEventListener("click", () => {
  history.back();
});

function getCookie(name) {
  return (
    (name = (document.cookie + ";").match(new RegExp(name + "=.*;"))) &&
    name[0].split(/=|;/)[1]
  );
}

function extCheck(fileName) {
  if ((fileName + "").length <= 0 || fileName.charAt(fileName.length-1) == '.') {
    console.log(fileName);
    return "-";
  }
  var ext = fileName.substr(fileName.lastIndexOf(".") + 1);
  let imageExt = ["jpg", "jpeg", "png", "gif"];
  for (let i = 0; i < imageExt.length; i++) {
    if (ext.toLowerCase() == imageExt[i]) {
      return "image";
    }
  }

  let vidExt = ["mov", "mp4", "3gp", "ogg"];
  for (let i = 0; i < vidExt.length; i++) {
    if (ext.toLowerCase() == imageExt[i]) {
      return "video";
    }
  }

  return "Non";
}

function setFile(viewFileType) {
  if (viewFileType == "image") {
    imgView.style.visibility = "visible";
    videoView.style.visibility = "hidden";
    videoView.style.width = "0";
  } else if (viewFileType == "video") {
    videoView.style.visibility = "visible";
    videoView.style.width = "75%";
    imgView.style.visibility = "hidden";
  } else {
    videoView.style.visibility = "hidden";
    imgView.style.visibility = "hidden";
  }
}

setFile(extCheck(file));
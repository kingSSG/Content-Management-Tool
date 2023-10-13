let confirmOTP = document.getElementById("confirmOTP");
let userOTP = document.getElementById("forgotPwdinput1");
let isValidMail = getCookie("cms_isValidMail");

let sentOTP = "";
let recieveOTP = "";
let myemail = "";

confirmOTP.addEventListener("click", () => {
  recieveOTP = userOTP.value;
  if (checkOTP()) {
    window.close("./otp-verification");
    window.open("./create-password", "_self");
  } else {
    userOTP.value = "";
    alert(
      "OTP has not matched!\nnote: try-again or refresh to re-generate the OTP!"
    );
  }
});

function getCookie(name) {
  return (
    (name = (document.cookie + ";").match(new RegExp(name + "=.*;"))) &&
    name[0].split(/=|;/)[1]
  );
}

if (isValidMail == "true") {
  myemail = getCookie("cms-v-email");
  sentOTP = generateOTP();
  sendOTP(sentOTP);
  alert(
    "OTP has been successfully sent to your email address.\nnote: please check SPAM section!"
  );
}

function generateOTP() {
  return Math.floor(Math.random() * 1000000);
}

function checkOTP() {
  return sentOTP + "" == recieveOTP + "" ? true : false;
}

function sendOTP(otp) {
  Email.send({
    SecureToken: "cea665f0-f786-4cee-b1b8-fd14858636d1",
    To: myemail,
    From: "prasantpoddar27@gmail.com",
    Subject: "CMS OTP verification",
    Body: "Your OTP is: " + otp,
  }).then((message) => alert(message));
}

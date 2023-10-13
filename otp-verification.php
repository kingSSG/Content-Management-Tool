<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/acc.css" />
  <?php require "./includes/links.php" ?>
  <title>OTP Verification | Account</title>
</head>

<body>
  <!-- navbar -->
  <?php require "./includes/db.php" ?>
  <?php require_once "./includes/nav.php" ?>
  <?php
  // echo "<script>window.open('./index.php', '_self')</script>";
  $vemail = $_COOKIE['cms-v-email'];
  $ca = $_COOKIE['cms_ca'];

  $query = "select * from users where email='" . $vemail . "';";
  $data = mysqli_query($con, $query);
  $exist = (mysqli_num_rows($data) == 0) ? "false" : "true";

  if ($ca == 'true' && $exist == 'false') {
    setcookie("cms_isValidMail", "true");
  } else if ($ca == 'false' && $exist == 'true') {
    setcookie("cms_isValidMail", "true");
  } else {
    if ($ca == 'true')
      echo "<script>alert('This email already exist!')</script>";
    else
      echo "<script>alert('No account with this email!')</script>";
    echo "<script>window.open('./email-verify', '_self')</script>";
    setcookie("cms_isValidMail", "false");
  }
  ?>

  <div id="container">
    <div id="forgotPwdContainer" class="container-2">
      <label id="forgotPwdTitle" class="containerTitle">OTP Verification</label>
      <div id="forgotPwdForm" class="containerForm containerForm2">
        <label id="forgotPwdMsg" class="msg">OTP sent!<br>Please enter the OTP.</label> <br />
        <input id="forgotPwdinput1" type="text" placeholder="Enter the OTP" />
        <br />
        <button id="confirmOTP" class="confirmOTPBtn">Confirm OTP</button>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php require_once "./includes/footer.php" ?>
</body>
<script src="./js/navBtn.js"></script>
<script src="./js/account-otp-verification.js"></script>
<script src="./js/feedback.js"></script>
</html>
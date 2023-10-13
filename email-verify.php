<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/acc.css" />
  <?php require "./includes/links.php" ?>
  <title>Email Verification | Account</title>
</head>

<body>
  <!-- navbar -->
  <?php require_once "./includes/nav.php" ?>

  <div id="container">
    <div id="forgotPwdContainer" class="container-2">
      <label class="containerTitle">Email Verification</label>
      <div id="forgotPwdForm" class="containerForm containerForm2">
        <label class="msg">Enter your email address.</label> <br />
        <input id="email" class="text" type="text" placeholder="Enter email address" />
        <br />
        <button id="sendOTP">Send OTP</button>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php require_once "./includes/footer.php" ?>
</body>
<script src="./js/navBtn.js"></script>
<script src="./js/feedback.js"></script>
<script src="./js/account-email-verify.js"></script>
</html>
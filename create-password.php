<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/acc.css" />
  <?php require "./includes/links.php" ?>
  <title>Create Password | Account</title>
</head>

<body>
  <!-- navbar -->
  <?php require_once "./includes/nav.php" ?>

  <div id="container">
    <div id="forgotPwdContainer" class="container-2">
      <label id="forgotPwdTitle" class="containerTitle">Create Password</label>
      <div id="forgotPwdForm" class="containerForm containerForm2">
        <label id="createPwdMsg" class="msg">Email Verified successfully!<br>Create a Password.</label> <br />
        <input id="createPwd" type="text" placeholder="Create Password" />
        <br />
        <input id="confirmPwd" type="password" placeholder="Confirm password" />
        <br />
        <button id="createPwdBtn">Create Password</button>
      </div>
    </div>
  </div>

  <!-- footer -->
  <?php require_once "./includes/footer.php" ?>
</body>
<script src="./js/navBtn.js"></script>
<script src="./js/feedback.js"></script>
<script src="./js/account-create-pwd.js"></script>
</html>
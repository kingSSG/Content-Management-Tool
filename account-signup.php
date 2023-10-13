<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/acc.css" />
  <?php require "./includes/links.php" ?>
  <title>Sign Up | Dashboard</title>
</head>

<body>
  <?php require "./includes/nav.php" ?>

  <div id="container">
    <div id="signUpContainer" class="container">
      <div id="signUpTitle" class="containerTitle">Sign Up</div>
      <div id="signUpForm" class="containerForm">
        <div class="usernameTitle">Name</div>
        <input type="text" id="fullname" placeholder="email" />
        <div class="phoneTitleTitle">Phone</div>
        <input type="text" id="phone" placeholder="phone" /> <br />
        <br />
        <div class="btnContainer">
          <button type="submit" id="signUp" class="submitBtn">Proceed</button>
          <button type="submit" id="loginAccSlideBtn" class="nextBtn">Have an account?</button>
        </div>
      </div>
    </div>
  </div>

  <?php require "./includes/footer.php" ?>
</body>
<script src="./js/feedback.js"></script>
<script src="./js/account-signup.js"></script>
<script src="./js/navBtn.js"></script>
</html>
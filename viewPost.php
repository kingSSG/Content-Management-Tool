<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/viewPost.css" />
  <link rel="stylesheet" href="./css/editbtns.css" />
  <?php require "./includes/links.php" ?>
  <title>View Post</title>
</head>

<body>
  <?php require "includes/db.php" ?>
  <!-- navbar -->
  <?php require_once "./includes/nav.php" ?>

  <?php $PID = $_COOKIE['cms_PID'];
  echo $PID;
  $query = 'select * from posts where PID="' . $PID . '"';
  $result = mysqli_query($con, $query);
  if (!$result) {
    echo "could not find";
  } else {
    $row = mysqli_fetch_assoc($result);
    $topic = $row["category"];
    $user = $row["user"];
    $date = $row["date"];
    $time = $row["time"];
    $email = $row["email"];
    $thumbnail = $row["thumbnail"];
    $file = $row["file"];
    setcookie("cms_cf", $file, time() + 86400, "/");
    $content = $row["content"];
  }

  if(isset($_POST['editBtn'])) {
    echo "<script>
              window.open('editPost', '_self');
          </script>";
  }
  ?>

  <div id="viewPostTitle">
    <?php echo $topic ?>
  </div>

  <div id="viewPostContainer">
  <?php
    if ($email == $_COOKIE['cms_email']) {
      echo "<script>
        function goToEditPost() {
          window.open('editPost', '_self');
        }
      </script>";
      echo "
        <div class='fnBtnContainer'>
          <button type='submit' name='editBtn' id='editBtn' onclick='goToEditPost()'><i class='fa-solid fa-pen-to-square'></i> Edit</button>
        </div>";
    }
  ?>
    <div id="viewPostTopic">
      <?php echo $user ?>
    </div>
    <div id="viewDateandTime">Posted on
      <?php echo $date . " at " . substr($time, 0, 5) ?>
    </div>
    <img src=<?php echo $thumbnail ?> id="viewThumbnail" />
    <img src=<?php echo $file ?> alt="" id="viewImage">
    <video src="<?php echo $file ?>" id="viewVideo" controls></video>
    <br />
    <div id="viewPostContent">
      <?php echo $content ?>
    </div>
    <br />
    <button type="submit" id="backBtn">Back</button>
  </div>

  <!-- footer -->
  <footer id="footer">
    <div id="joinNowContainer">
      <div id="text">
        <span class="lineH">Manage your creativity!</span><br />
        <span class="lineF">Explore the latest trends and innovations in tech, one byte at a
          time.</span>
      </div>
      <button type="submit" id="joinNowBtn" onclick="location.href='./account-login'">
        Join Now
      </button>
    </div>
    <div id="slideContainer">
      <div id="slide1">
        <div id="desc">
          <div id="title">CMS (Content Management System)</div>
          <div id="details">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut
            voluptates, suscipit cupiditate temporibus.
          </div>
        </div>
        <div id="socialBtnContainer">
          <a href="https://github.com/kingSSG"><i
              class="fa fa-github"></i></a>
          <a href="https://www.instagram.com/suvojit_sengupta/"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.linkedin.com/in/suvojit-sengupta-82115820a/"><i class="fa-brands fa-linkedin"></i></a>
        </div>
        <div id="feedbackBtnContainer">
          <button type="submit" id="feedbackBtn">Share your feedback!</button>
        </div>
      </div>

      <div id="slide2">
        <div id="feedbackFormContainer">
          <button id="feedbackBackBtn">
            <i class="fa-solid fa-backward"></i>
          </button>
          <div id="feedback">
            <div id="title">Write your Feedback!</div>
            <textarea id="feedbackContent" placeholder="Write here..."></textarea>
            <button id="shareFeedback" type="submit">Share</button>
          </div>
        </div>
      </div>
    </div>
    <div id="developed">developed by @prasant</div>
  </footer>
</body>
<script src="./js/navBtn.js"></script>
<script src="./js/feedback.js"></script>
<script src="./js/view.js"></script>
</html>
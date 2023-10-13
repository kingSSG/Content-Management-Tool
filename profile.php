<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/myProfile.css">
  <?php require "./includes/links.php" ?>
  <title>Profile</title>
</head>

<body>
  <?php require "includes/db.php" ?>
  <!-- navbar -->
  <?php require_once "./includes/nav.php" ?>

 

  <div id="main">
    <!--content -->
    <div id="container">
      <?php
      $cEmail = $_COOKIE['cms_username'];
      $query = 'select * from posts where email="' . $cEmail . '"order by PID desc;';
      $profileQuery = 'select * from users where email ="' . $cEmail . '"';
      $numberOfPostQuery = 'select count(*) as count from posts where email="' . $cEmail . '"';
      $data = mysqli_query($con, $query);
      if (mysqli_num_rows($data) == 0) {
        echo "<h2>No Post Yet</h2>";
      } else {
        while ($row = mysqli_fetch_assoc($data)) {
          $PID = $row["PID"];
          $topic = $row["category"];
          $user = $row["user"];
          $date = $row["date"];
          $time = $row["time"];
          $thumbnail = $row["thumbnail"];
          $content = $row["content"];
          ?>
          <ul class="postID" id=<?php echo $PID ?>>
            <li>
              <?php echo $topic ?>
            </li>
            <li>by
              <?php echo $user ?>
            </li>
            <li>Posted on
              <?php echo $date . " at " . substr($time, 0, 5) ?>
            </li>
            <li><img src=<?php echo $thumbnail ?> alt="" /></li>
            <li>
              <?php echo (strlen($content) > 200) ? substr($content, 0, 200) . "..." : $content ?>
            </li>
          </ul>
        <?php }
      }
      $result = mysqli_query($con, $profileQuery);
      if (!$result) {
        echo "could not find";
      } else {
        $row = mysqli_fetch_assoc($result);
        $userName = $row["name"];
        $userMail = $row["email"];
        $userPhone = $row["phone"];
      }

      $result = mysqli_query($con, $numberOfPostQuery);
      if (!$result) {
        echo "could not find";
      } else {
        $row = mysqli_fetch_assoc($result);
        $userPosts = $row['count'];
      }
      ?>
    </div>

    <!-- side bar -->
    <div id="sidebar">
      <!-- search box -->
      <div id="searchBox">
        <div id="searchBoxTitle">Your Profile</div>
        <div id="profileContainer">
          <div id="name">
            <?php echo $userName ?>
          </div>
          <div id="mobile">
            <?php echo $userPhone ?>
          </div>
          <div id="email">
            <?php echo $userMail ?>
          </div>
          <div id="totalBlogs">
            <?php echo ($userPosts > 1) ? $userPosts . " Blogs" : $userPosts . " Blog" ?>
          </div>
        </div>
      </div>
      <!-- create blog -->
      <button type="submit" id="logOutBtn">
        Log Out
      </button>
    </div>
  </div>
</body>
<script src="./js/navBtn.js"></script>
<script src="./js/myProfile.js"></script>
</html>
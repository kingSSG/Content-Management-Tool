<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <?php require "./includes/links.php" ?>
  <title>CMS Project</title>
</head>

<body>
  <?php require "includes/db.php" ?>
  <!-- navbar -->
  <?php require_once "./includes/nav.php" ?>

  <div id="main">
    <!--content -->
    <div id="container">
      <?php
      $rem = "<script>document.write(window.localStorage.getItem('cms_username'))</script>";
      setcookie("cms_email", "admin@gmail.com", time() + 86400, "/");

      if (isset($_GET['category'])) {
        $cat_id = $_GET['category'];
      }

      $query = "select category from posts where PID='$cat_id';";
      $data = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($data);
      $cat = $row['category'];

      $query = "select * from posts where category='$cat';";
      $data = mysqli_query($con, $query);
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
      <?php } ?>
    </div>


    <!-- side bar -->
    <div id="sidebar">
      <?php require_once "./includes/searchBar.php" ?>

      <!-- categories -->
      <?php require_once "./includes/category.php" ?>

      <!-- create blog -->
      <button type="submit" id="createBlogBtn">
        <i class="fa-solid fa-pen-to-square"></i>
        Write Your Creative Blog
      </button>
    </div>
  </div>
</body>
<script src="./js/navBtn.js"></script>
<!-- <script src="./js/working.js"></script> -->
<script src="./js/index.js"></script>

</html>
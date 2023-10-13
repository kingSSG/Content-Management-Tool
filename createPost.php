<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/createPost.css" />
  <?php require "./includes/links.php" ?>
  <title>Post</title>
</head>

<body>
  <!-- navbar -->
  <?php require "./includes/db.php" ?>
  <?php require "./includes/nav.php" ?>

  <?php
  echo "<script>
          const date = new Date();
          let year = date.getFullYear();
          let month = formatData(date.getMonth() + 1);
          let day = formatData(date.getDate());
          let hour = formatData(date.getHours());
          let mins = formatData(date.getMinutes());
          let secs = formatData(date.getSeconds());
          let ms = formatMillisecond(date.getMilliseconds());
          
          function formatData(num) {
            return num < 10 ? '0' + num : num + '';
          }
          
          function formatMillisecond(num) {
            if (num < 10) return '00' + num;
            if (num < 100) return '0' + num;
            return num + '';
          }
          
          let time = hour + ':' + mins;
          let PID = 'PID' + year + month + day + hour + mins + secs + ms;
          document.cookie = 'cms_create_PID='+PID;
          document.cookie = 'cms_currentTime='+time;
      </script>";

  if (isset($_POST['saveBtn'])) {
    $PID = $_COOKIE['cms_create_PID'];

    $topic = $_POST['postTopic'];
    $postContent = $_POST['postContent'];

    $thumbnail = $_FILES['thumbnail']['name'];
    $array1 = explode('.', $thumbnail);
    $ext1 = end($array1);
    $thumbnail_store = "./thumbnail/" . $PID . "." . $ext1;
    $thumbnail_tmp_name = $_FILES['thumbnail']['tmp_name'];

    $file = $_FILES['file']['name'];
    $array2 = explode('.', $file);
    $ext2 = end($array2);
    $file_store = "./files/" . $PID . "." . $ext2;
    $file_tmp_name = $_FILES['file']['tmp_name'];

    $upload_file = move_uploaded_file($file_tmp_name, $file_store);
    $upload_thumbnail = move_uploaded_file($thumbnail_tmp_name, $thumbnail_store);
    echo $upload_file && $upload_thumbnail;

    date_default_timezone_set('Asia/Kolkata');
    $currentDate = date('l, F j, Y');
    $currentTime = $_COOKIE['cms_currentTime'];

    echo "<script>
    document.cookie = 'cms_username='+ localStorage.getItem('cms_username');
    </script>";
    $email = $_COOKIE['cms_username'];

    echo $currentDate . " : " . $PID . " " . $currentTime . " " . $upload;
    $query = "select name from users where email='" . $email . "';";
    $data = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($data);
    $name = $row['name'];

    if (strlen($topic) > 0 && strlen($postContent) > 0) {
      try {
        $query = "insert into posts values('$PID', '$email', '$name', '$topic', '$currentDate', '$currentTime', '$thumbnail_store', ' $file_store', '$postContent', 'Posted');";
        $execute = mysqli_query($con, $query);
      } catch (Exception $e) {
       }
    }

    if ($upload_file && $upload_thumbnail && $execute) {
      echo "<script>
                    alert('Post uploaded successfully!');
            </script>";
    } else {
      $query = "delete from posts where PID='$PID';";
      $execute = mysqli_query($con, $query);
      echo "<script>
                    alert('Post not uploaded!');
            </script>";
    }
      echo "<script>
                    let btnValue = 'home';
                    window.localStorage.setItem('requestPage', btnValue);
                    window.open('index', '_self');
            </script>";
  }
  ?>

  <div id="createPostTitle">Create Post</div>

  <div id="createPostContainer">
    <form action="?" method="post" enctype="multipart/form-data">
      <input type="text" id="postTopic" placeholder="Topic..." name="postTopic" /> <br />
      <br />
      <div id="thumbnailTitle">Thumbnail</div>
      <input type="file" id="thumbnail" accept="image/*" name="thumbnail" /> <br />

      <br />
      <div id="imgVideoTitle">Upload Image related to content</div>
      <input type="file" id="acceptImgVideo" accept="image/*" name="file" />
      <br />
      <br />
      <br />
      <textarea id="postContent" placeholder="Write your content here..." name="postContent"></textarea>
      <br />
      <br />
      <button type="submit" id="saveBtn" name="saveBtn">Post</button>
    </form>
  </div>

  <!-- footer -->
  <?php require "./includes/footer.php" ?>
</body>
<script src="./js/navBtn.js"></script>
<script src="./js/feedback.js"></script>
<script src="./js/createPost.js"></script>
</html>
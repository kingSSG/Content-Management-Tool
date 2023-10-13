<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/createPost.css" />
  <link rel="stylesheet" href="./css/editPost.css" />
  <?php require "./includes/links.php" ?>
  <title>Edit Post</title>
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

      if(isset($_POST['saveBtn'])) {
        $new_topic = $_POST['postTopic'];
        $new_content = $_POST['postContent'];

        if (strlen($new_topic) > 0 && strlen($new_content) > 0) {
          try {
            $query = 'update posts set category = "' . $new_topic . '", content = "' . $new_content . '", status = "Edited" where PID="' . $PID . '";';
            $execute = mysqli_query($con, $query);
          } catch (Exception $e) {
           }
        }

        if ($execute) {
          echo "<script>
                        alert('Post updated successfully!');
                        let btnValue = 'home';
                        window.localStorage.setItem('requestPage', btnValue);
                        window.open('viewPost', '_self');
                </script>";
        } else {
          echo "<script>
                        alert('Post not updated!');
                </script>";
        }
      }
      
  echo '<script> document.cookie = "cms_delpost=n"; 
            function confirmDel() {
              if(confirm("Are you sure you want to delete this post?")){
                  document.cookie = "cms_delpost=y";
              }
            }
            </script>';

  if(isset($_POST['deleteBtn'])) {

    if ($_COOKIE['cms_delpost'] == 'y') {
      echo '<script> document.cookie = "cms_delpost=n"; </script>';

      try {
        $query = 'delete from posts where PID="' . $PID . '";';
        $execute = mysqli_query($con, $query);
        unlink($file);
        unlink($thumbnail);
      } catch (Exception $e) {
      }
  
      if ($execute) {
        echo "<script>
                      alert('Post deleted successfully!');
                      let btnValue = 'home';
                      window.localStorage.setItem('requestPage', btnValue);
                      window.open('index', '_self');
              </script>";
      } else {
        echo "<script>
                      alert('Post not deleted!');
              </script>";
      }
    }
  }
  ?>

  <div id="createPostTitle">Edit Post</div>

  <div id="createPostContainer">
    <form action="?" method="post" enctype="multipart/form-data">
    <input type="text" name="postTopic" id="postTopic" placeholder="Topic..." value="<?php echo $topic ?>"/> <br />
    <div id="thumbnailTitle">Thumbnail</div>
    <img src=<?php echo $thumbnail ?> id="viewThumbnail"/> <br>

    <div id="thumbnailTitle">Image related to content</div>
    <img src=<?php echo $file ?> alt="" id="viewImage">
    <br />
    <textarea name="postContent" id="postContent" placeholder="Write your content here..."><?php echo $content ?></textarea>
    <br />
    <button type="submit" id="saveBtn" name="saveBtn">Save</button>
  </div>
  <button type="submit" id="deleteBtn" name='deleteBtn' onclick="confirmDel()">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
      <path
        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
    </svg>
  </button>
  </form>

  <!-- footer -->
  <?php require_once "./includes/footer.php" ?>
</body>
<script src="./js/navBtn.js"></script>
<script src="./js/feedback.js"></script>
</html>
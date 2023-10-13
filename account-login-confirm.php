<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/acc.css" />
    <?php require "./includes/links.php" ?>
    <title>Confirmation | Account</title>
</head>

<body>
    <?php require "./includes/nav.php" ?>
    <?php require "./includes/db.php" ?>

    <div id="container">
        <?php
        $email = $_COOKIE['cms_username'];
        $password = $_COOKIE['cms_password'];

        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);
        $query = "select * from users where email='$email' and password='$password';";
        $data = mysqli_query($con, $query);
        $exist = (mysqli_num_rows($data) == 0) ? "false" : "true";

        echo $exist;
        if ($exist == 'true') {
            $rem = "<script>document.write(localStorage.getItem('cms_passwordRem'));</script>";
            if ($rem == 'true') {
                echo "<script>
                            document.localStorage.setItem('cms_password', $password);
                        </script>";
            } else {
                echo "<script>
                            document.localStorage.remove('cms_password');
                    </script>";
            }

            $requestPage = $_COOKIE['requestPage'];
            if ($requestPage == 'create') {
                echo "<script>window.open('./createPost', '_self')</script>";
            } else if ($requestPage == 'profile') {
                echo "<script>window.open('./profile', '_self')</script>";
            }
        } else {
            echo '<script>alert("Invalid email or password!\nIf you forget your password then go to forgot password.")</script>';
            echo "<script>window.open('./account-login', '_self')</script>";
        }
        setcookie('cms_password', "", time() - 3600);
        ?>
        <div id="signInContainer" class="container">
            <div id="LogInTitle" class="containerTitle">ERROR</div>
        </div>
    </div>
</body>
<script src="./js/feedback.js"></script>
<script src="./js/navBtn.js"></script>
<script src="./js/account-login.js"></script>

</html>
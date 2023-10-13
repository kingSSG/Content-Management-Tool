<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/acc.css" />
    <?php require "./includes/links.php" ?>
    <style>
        body {
            height: 100vh !important;
        }
    </style>
    <title>Confirmation | Account</title>
</head>

<body>
    <?php require "./includes/nav.php" ?>
    <?php require "./includes/db.php" ?>

    <div id="container">
        <?php
        $ca = $_COOKIE['cms_ca'];
        $name = "-";
        $phone = "-";

        if ($ca == 'true') {
            $name = $_COOKIE['cms-create-name'];
            $phone = $_COOKIE['cms-create-phone'];
        }

        $email = $_COOKIE['cms-v-email'];
        $password = $_COOKIE['cms-create-pwd'];
        setcookie('cms-v-email', "", time() - 3600);
        setcookie('cms-create-pwd', "", time() - 3600);
        setcookie('cms-create-name', "", time() - 3600);
        setcookie('cms-create-phone', "", time() - 3600);
        setcookie('cms_isValidMail', "", time() - 3600);

        if ($ca == 'true') {
            $query = "insert into users values('$email', '$password', '$name', '$phone');";
            $execute = mysqli_query($con, $query);
            if ($execute) {
                echo "<script>
                    alert('Account created successfully!');
                    window.open('account-login','_self');
                    </script>";
            } else
                echo "Something Wrong!";
        } else {
            $query = "update users set password='$password' where email='$email';";
            $execute = mysqli_query($con, $query);
            if ($execute) {
                echo "<script>
                    alert('Password changed successfully!');
                    window.open('account-login','_self');
                    </script>";
            } else
                echo "Something Wrong!";
        }

        ?>
        <div id="signInContainer" class="container">
            <div id="LogInTitle" class="containerTitle">Done</div>
        </div>
    </div>
</body>
<script src="./js/feedback.js"></script>
<script src="./js/navBtn.js"></script>
</html>
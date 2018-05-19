<?php
    session_start();
    include 'connection.php';
    $connection = connectToDB();
    
    if(isset($_POST['login'])) {
        header("Location: login.php");
    }
    
    if(isset($_POST['user'])){
        header("Location: userAccess.php");
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <h1>Welcome To SoccerAccess!</h1>
        <style type="text/css">
            body {
                background-image:url("champions.jpg");
                background-size: cover;
                text-align: center;
                color: white;
            }
            h1{
                text-align: center;
                color: white;
                font-family: "Hoodson Sript", serif;
            }
            form{
                position: center;
            }
        </style>
    </head>
    <body>
         <form method="post" >
             <input type="submit" name="login" value="Admin Login"/>
             <input type="submit" name="user" value="User Access"/>
         </form>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
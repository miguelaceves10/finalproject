<!DOCTYPE html>
<html>
    <head>
        <h1>Admin Login Only</h1>
        <h2>Credentials required before submiting form.</h2>
        <p>Admin Username: <strong>admin</strong>. The password is <strong>admin</strong>.</p>
        
        <title>Login</title>
        <style type="text/css">
            body {
                background-image:url("champions.jpg");
                background-size: cover;
                text-align:center;
            }
            h1, h2, p{
                text-align: center;
                color: white;
                font-family: "Hoodson Sript", serif;
            }
        </style>
        
    </head>
    <body>
        <!--Form to enter credentials-->
        <form method="post" action="verifyAdmin.php">
            <input type="text" name="username" placeholder="Username"/><br />
            <input type="password" name="password" placeholder="Password" /><br />
            <input type="submit" name="submit" value="Login"/><br />
        </form>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
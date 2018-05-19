<?php
    include 'connection.php';
    $connection = connectToDB();
    
    if(isset($_POST['exit'])){
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
    $player_add2 = $_POST['add_p2'];
    $player_add3 = $_POST['add_p3'];
    $player_add4 = $_POST['add_p4'];
    $player_add5 = $_POST['add_p5'];
    $player_add6 = $_POST['add_p6'];
    $player_add7 = $_POST['add_p7'];
    $player_add8 = $_POST['add_p8'];
    $player_add9 = $_POST['add_p9'];
    $player_add10 = $_POST['add_p10'];
    $player_add11 = $_POST['add_p11'];
    
    $player_remove1 = $_POST['remove_p1'];
    $player_remove2 = $_POST['remove_p2'];
    
    $player_update = $_POST['update_p1'];
    $player_update2 = $_POST['update_p2'];

    if(isset($_POST['add'])){
        $sql = "INSERT INTO Real_madrid(position,kit_number,player_first_name,player_last_name,age,total_goals,total_shots,yellow_cards,red_cards, fouls_committed) 
                VALUES ('$player_add2','$player_add3','$player_add4','$player_add5','$player_add6','$player_add7','$player_add8','$player_add9','$player_add10','$player_add11')";
        $info = $connection->prepare($sql);
        $info->execute();
        
        echo '<script language="javascript">';
        echo 'alert("Player Succesfully Added")';
        echo '</script>';
        
    }
    if(isset($_POST['remove'])){
        $sql2 = "DELETE FROM Real_madrid WHERE player_last_name='$player_remove1' AND kit_number='$player_remove2'";
        $info = $connection->prepare($sql2);
        $info->execute();
         
        echo '<script language="javascript">';
        echo 'alert("Player Succesfully Removed")';
        echo '</script>';
        
    }
    
    if(isset($_POST['update'])){
        $sql3 = "UPDATE Real_madrid SET total_goals='$player_update' WHERE kit_number='$player_update2'";
         $info = $connection->prepare($sql3);
         $info->execute();
         
        echo '<script language="javascript">';
        echo 'alert("Player Succesfully Updated")';
        echo '</script>';
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
        <form method="post">
            <!--add-->
            <input type="text" name="add_p2" placeholder="Position"/>
            <input type="text" name="add_p3" placeholder="Kit Number"/>
            <input type="text" name="add_p4" placeholder="First Name"/>
            <input type="text" name="add_p5" placeholder="Last Name"/>
            <input type="text" name="add_p6" placeholder="Age"/>
            </br>
            <input type="text" name="add_p7" placeholder="Total Goals"/>
            <input type="text" name="add_p8" placeholder="Total Shots"/>
            <input type="text" name="add_p9" placeholder="Yellow Cards"/>
            <input type="text" name="add_p10" placeholder="Red Cards"/>
            <input type="text" name="add_p11" placeholder="Fouls Committed"/>
            </br>
            <input type="submit" name="add" value="Add Player"/> 
            </br> </br>
            <!--remove-->
            <input type="text" name="remove_p1" placeholder="Last Name"/>
            <input type="text" name="remove_p2" placeholder="Kit Number"/>
            <input type="submit" name="remove" value="Remove Player"/> 
            </br> </br>
            <input type="text" name="update_p1" placeholder="Total Goals"/>
            <input type="text" name="update_p2" placeholder="Kit Number"/>
            <input type="submit" name="update" value="Update Player"/> 
            </br> </br>
            <input type="submit" name="exit" value="Logout"/>
        </form>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
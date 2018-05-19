<?php
    
    include 'connection.php';
    
    $connection = connectToDB();
    
    $sql = "SELECT * FROM `Real_madrid`";
    $sql2 = "SELECT * FROM `Barcelona`";
    
    $info = $connection->prepare($sql);
    $info->execute();
    
    $info2 = $connection->prepare($sql2);
    $info2->execute();
    
    if(isset($_POST['backhome'])){
         header("Location:index.php");
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <h1>Welcome To SoccerAccess!</h1>
        <h2>Search a player by First Name, Last Name, or Kit Number</h2>
        <style type="text/css">
            body {
                background-image:url("champions.jpg");
                background-size: cover;
                text-align:center;
            }
            h1, h2{
                text-align: center;
                color: white;
                font-family: "Hoodson Sript", serif;
            }
            
            input[type=text] {
                width: 130px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }
          
        </style>
    </head>
    <body>
        <form method="post">
            <input type="text" name="search" placeholder="Search...">
            <input type="submit" name="submit" placeholder="Submit">
            <select id="avg">
                <option value="select">-- Select An Option --</option>
                <option value="rm_goals">Real Madrid Sort by Goals</option>
                <option value="rm_shots">Real Madrid Avg Shots</option>
                <option value="rm_fouls">Real Madrid Total Fouls</option>
                <option value="barca_goals">Barcelona Sort by Goals</option>
                <option value="barca_shots">Barcelona Avg Shots</option>
                <option value="barca_fouls">Barcelona Total Fouls</option>
            </select>
            <input type="submit" name="clear" value="Clear Results">
            <input type="submit" name="backhome" value="Home">
        </form>
        <br/>
        <table width:'600' style='background-color: white;' align:'center' id="generate"></table>
        <?php
        //Real
        $cheker = false;
        if($info->rowCount() > 0){
            while($info_row = $info->fetch(PDO::FETCH_ASSOC)){
                if(isset($_POST['submit']) && ($_POST['search'] == $info_row['player_first_name'] || $_POST['search'] == $info_row['player_last_name'] || $_POST['search'] == $info_row['kit_number'])){
                    echo "<p style='color: white;'> <strong> Team: Real Madrid </strong> </p>";
                    echo "<table id='firstTable;' width:'600' style='background-color: white;' align:'center'>";
                    echo "<tr>";
                    echo "<td style='width:10%'><strong>Position</strong></td>";
                    echo "<td style='width:10%'><strong>First Name</strong></td>";
                    echo "<td style='width:10%'><strong>Last Name</strong></td>";
                    echo "<td style='width:10%'><strong>Kit Number</strong></td>";
                    echo "<td style='width:10%'><strong>Age</strong></td>";
                    echo "<td style='width:10%'><strong>Total Goals</strong></td>";
                    echo "<td style='width:10%'><strong>Total Shots</strong></td>";
                    echo "<td style='width:10%'><strong>Yellow Cards</strong></td>";
                    echo "<td style='width:10%'><strong>Red Cards</strong></td>";
                    echo "<td style='width:10%'><strong>Fouls Committed</strong></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>".$info_row['position']."</td> ";
                    echo "<td>".$info_row['player_first_name']."</td> ";
                    echo "<td>".$info_row['player_last_name']."</td> ";
                    echo "<td>".$info_row['kit_number']."</td> ";
                    echo "<td>".$info_row['age']. "</td> ";
                    echo "<td>".$info_row['total_goals']."</td> ";
                    echo "<td>".$info_row['total_shots']."</td> ";
                    echo "<td>".$info_row['yellow_cards']. "</td> ";
                    echo "<td>".$info_row['red_cards']."</td> ";
                    echo "<td>".$info_row['fouls_committed']."</td>";
                    echo "</tr>";
                    echo "</table>";
                    $cheker = true;
                }
            }
            
        }
        //Barca
        if($info2->rowCount() > 0){
            while($info_row2 = $info2->fetch(PDO::FETCH_ASSOC)){
                if(isset($_POST['submit']) && ($_POST['search'] == $info_row2['player_first_name'] || $_POST['search'] == $info_row2['player_last_name'] || $_POST['search'] == $info_row2['kit_number'])){
                    echo "<p style='color: #D40000;'> <strong> Team: Barcelona </strong> </p>";
                    echo "<table width:'600' style='background-color: #D40000;' align:'center'>";
                    echo "<tr>";
                    echo "<td style='width:10%'><strong>Position</strong></td>";
                    echo "<td style='width:10%'><strong>First Name</strong></td>";
                    echo "<td style='width:10%'><strong>Last Name</strong></td>";
                    echo "<td style='width:10%'><strong>Kit Number</strong></td>";
                    echo "<td style='width:10%'><strong>Age</strong></td>";
                    echo "<td style='width:10%'><strong>Total Goals</strong></td>";
                    echo "<td style='width:10%'><strong>Total Shots</strong></td>";
                    echo "<td style='width:10%'><strong>Yellow Cards</strong></td>";
                    echo "<td style='width:10%'><strong>Red Cards</strong></td>";
                    echo "<td style='width:10%'><strong>Fouls Committed</strong></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>".$info_row2['position']."</td> ";
                    echo "<td>".$info_row2['player_first_name']."</td> ";
                    echo "<td>".$info_row2['player_last_name']."</td> ";
                    echo "<td>".$info_row2['kit_number']."</td> ";
                    echo "<td>".$info_row2['age']. "</td> ";
                    echo "<td>".$info_row2['total_goals']."</td> ";
                    echo "<td>".$info_row2['total_shots']."</td> ";
                    echo "<td>".$info_row2['yellow_cards']. "</td> ";
                    echo "<td>".$info_row2['red_cards']."</td> ";
                    echo "<td>".$info_row2['fouls_committed']."</td>";
                    echo "</tr>";
                    echo "</table>";
                    $cheker = true;
                }
            }
            
        }
        else if(!$cheker){
             echo "Sorry That Player Was Not Found!";
        }
        
        
        ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
    </body>
</html>
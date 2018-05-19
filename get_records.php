<?php
    include 'connection.php';
    
    $sql = $_POST['sql'];
    $con = connectToDB();
    
    $statement = $con->prepare($sql);
    $statement->execute();
    
    $records = $statement -> fetchAll();
    
    echo json_encode($records);
?>
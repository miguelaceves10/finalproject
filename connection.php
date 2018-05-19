<?php
    function connectToDB() {
        // mysql://b5dd1da4417257:ac3ed34b@us-cdbr-iron-east-05.cleardb.net/heroku_78ba798bee16f36?reconnect=true
        $host = 'us-cdbr-iron-east-04.cleardb.net';
        $db   =  'heroku_8fb6e45bb4ad286';
        $username = "b98f9ac50e9357"; 
        $password = "cb279941";
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $username, $password, $opt);
        return $pdo; 
    }
?>
<?php
        $dsn = 'mysql:host=localhost;dbname=gym';
        $username = 'root';
        $phash ='';
    
        try{
            $db = new PDO($dsn, $username, $phash);
        } catch (DPException $e){
            $error_message = $e->getMessage();
            exit();
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gym";
    ?>
        
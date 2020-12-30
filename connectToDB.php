<?php
    function makeConnection($servername, $username, $password, $db){
        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);
        // Check connection
        if ($conn->connect_error) echo "Connection failed: " . $conn->connect_error;
        else echo "Connection established Successfully!<br>";

        //Create database if not found
        $sql = "CREATE DATABASE IF NOT EXISTS magento241";
        if($conn->query($sql) === TRUE) echo "Database created successfully!<br>";
        else echo "Error creating database: ".$conn->error;

        //Use db if already exists
        $usedb = $conn->query("USE $db");

        
        //Create a table 6470exerciseusers if doesnt exists
        $table = "CREATE TABLE IF NOT EXISTS 6470exerciseusers (
            USERNAME VARCHAR(100) UNIQUE,
            PASSWORD_HASH CHAR(40),
            PHONE VARCHAR(10) NOT NULL
        )";
        
        $result = $conn->query($table);
        //Check table
        if ($result === TRUE) echo "Table got created successfully!<br>";
        else echo "Error creating the table: ".$conn->error;

        //Closing the connection
        $conn->close();
    }

    makeConnection("localhost","root","","magento241")
?>
<?php
include_once "config.php";
$conn = null;
// Create connection
function getConnection(){
    global $conn;
    global $server;
    global $username;
    global $password;
    global $database;
    $conn = new mysqli($server, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

function getData($sql){
    global $conn;
    getConnection();

    $result = $conn->query($sql);
    return $result;

}

function setData($sql){
    global $conn;
    getConnection();

    if ($conn->query($sql) === TRUE) {
        return true;
    } 
    else 
    {
        echo mysqli_error($conn);
        return false;
        $conn->close();
    }
    
}

// $conn->close();
?>
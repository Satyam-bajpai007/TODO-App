<?php
session_start();
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$operation = $_POST["operation"];
$id = $_POST["id"];

switch ($operation) {
    // Delete Function 
    case 'delete':
        $sql = "DELETE FROM `mytodo` WHERE `mytodo`.`ID` = '$id'";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;
    // Check Function 
    case 'check':
        $sql = "UPDATE `mytodo` SET `Type` = 'Completed' WHERE `mytodo`.`ID` = '$id'";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;
    // Uncheck Function 
    case 'uncheck':
        $sql = "UPDATE `mytodo` SET `Type` = 'TODO' WHERE `mytodo`.`ID` = '$id'";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;
    // Edit Function 
    case 'edit':
        $text = $_POST["text"];
        $sql = "UPDATE `mytodo` SET `Text` = '$text' WHERE `mytodo`.`ID` = '$id'";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;
        
    
    default:
        break;
}

?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['username'])){
        $Rusername = $_POST['username'];
        $servername = "";
        $username = "";
        $password = "";
        $dbname = "";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $sql = "SELECT * FROM chats WHERE Username='$Rusername'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['MSG'];
        }
        else{
            echo 'waiting on response ...';
        }
    } else {
    
        echo "Error: POST data not received.";
    }
}

?>

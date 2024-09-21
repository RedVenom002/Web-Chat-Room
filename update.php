<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $textareaContent = $_POST['textareaContent'];
    var_dump($textareaContent);
    $usernameclient = $_POST['username'];
    $passwordclient = $_POST['password'];

    
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM Users WHERE UName='$usernameclient' AND Password='$passwordclient'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        
        $sql = "SELECT * FROM chats WHERE username='$usernameclient'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            $sql = "UPDATE chats SET MSG='$textareaContent' WHERE username='$usernameclient'";
            echo "$textareaContent is this";
        } else {
            
            $sql = "INSERT INTO chats (username, MSG) VALUES ('$usernameclient', '$textareaContent')";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Record updated/inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid username or password.";
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}



?>

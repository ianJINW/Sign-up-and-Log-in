<?php
// db_test.php
$host = 'localhost';
$user = 'root';
$password = 'qweras12zx';
$database = 'php-blog';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$tableName = 'users';

// Check if the table already exists
$result = $conn->query("SHOW TABLES LIKE '$tableName'");
if ($result->num_rows > 0) {
  // If the table already exists, display a message and exit
  echo "Table $tableName already exists";
} else {
  $sql = "CREATE TABLE $tableName (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
  )";

  if (mysqli_query($conn, $sql)) {
    echo "Table $tableName created successfully";
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in and Login</title>
  <style>
  body {
    background: lightslategray;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    vertical-align: middle;
  }

  .wrapper {
    align-items: center;
    border: 1px solid grey;
    justify-content: space-evenly;
    width: 70vw;
    height: 70vh;
    display: flex;
    flex-direction: row;
  }

  form {
    display: flex;
    flex-direction: column;
    width: 35vw;
    height: 60vh;
    justify-content: space-evenly;
    align-items: center;
    gap: 2px;
    visibility: visible;
    opacity: 1;
    transform: translateY(0);
    transition: opacity 0.5s ease-in-out, transform 0.9s ease-in-out;
    position: relative;
    border-radius: 10px;
  }

  .wrap {
    visibility: hidden;
    background: lightblue;
    transform: scaleY(0.9);
  }

  form input {
    width: 30vw;
    border: 1px solid grey;
    background: black;
    color: red;
    border-radius: 7px;
    outline: none;
    height: 30px;
  }

  form input[type="submit"] {
    width: clamp(100px, 70px, 50px);
    background: green;
    outline: none;
    padding: 5px;
    cursor: pointer;
    border-radius: 7px;
  }

  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
    display: none;
  }

  a {
    position: absolute;
    top: 90%;
    text-decoration: none;
  }
  </style>

</head>

<body>
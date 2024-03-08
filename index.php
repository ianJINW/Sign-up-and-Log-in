<?php
require 'include/header.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Get user input from the form
  $user = trim($_POST['user']);
  $password = $_POST['password'];
  $email = trim($_POST['email']);

  // Check if the 'signup' button is clicked
  if (isset($_POST['signup'])) {
    // Check if all required fields are set and not empty
    if (!empty($user) && !empty($email) && !empty($password)) {
      // Hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Prepare SQL statement for user registration
      $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
      if ($stmt === false) {
        echo "Error preparing SQL statement: " . $conn->error;
        exit;
      }

      // Bind parameters to the statement
      $stmt->bind_param("sss", $user, $email, $hashed_password);

      // Execute the statement
      if ($stmt->execute()) {
        echo "Inserted successfully";
        // Redirect to the index page
        header("Location: /phpsandbox/Full%20b/index.php");
        exit();
      } else {
        echo "Error inserting into table: " . $stmt->error;
      }
    } else {
      echo "Please fill in all fields";
    }
  } elseif (isset($_POST['login'])) {
    // Prepare SQL statement for user login
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    if ($stmt === false) {
      echo "Error preparing SQL statement: " . $conn->error;
      exit;
    }

    // Bind parameters to the statement
    $stmt->bind_param("ss", $user, $email);

    // Execute the statement
    if ($stmt->execute()) {
      // Get the result of the statement
      $res = $stmt->get_result();

      // Check if there are any rows returned
      if ($res->num_rows > 0) {
        // Fetch the first row
        $row = $res->fetch_assoc();
        $dbpass = $row['password'];

        // Verify the password
        if (password_verify($password, $dbpass)) {
          echo "Login successful";
          // Redirect to the index page
          header("Location: /phpsandbox/Full%20b/index.php");
          exit();
        } else {
          // Debug: Output password hash for troubleshooting
          echo "Stored Password Hash: $dbpass<br>";
          echo "Input Password: $password<br>";
          echo 'Invalid password';
        }
      } else {
        echo 'No such user';
      }
    } else {
      echo "Error executing SQL statement: " . $stmt->error;
    }
  }
}

// Close the database connection
$conn->close();
?>

<div class="wrapper">
  <form id="signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" required name="user" placeholder="Username here">
    <input type="email" required name="email" id="email" placeholder='Email please'>
    <input type="password" required name="password" placeholder="Input your password">
    <input type="submit" value="Sign Up" name="signup">
    <p class="relocate">Already have an account</p>
  </form>

  <div class="overlay"></div>
  <form id="login" class="wrap" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" required name="user" placeholder="Username or email here">
    <input type="password" required name="password" placeholder="Input your password">
    <input type="submit" required name="login" value="Log in">
    <p class="relocate">Create an account</p>
  </form>
</div>
<?php require 'include/footer.php';

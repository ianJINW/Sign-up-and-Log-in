#User Authentication System
This PHP script provides a simple user authentication system that allows users to sign up and log in. It includes registration and login forms, password hashing, and database interactions.

Features
User Registration: Users can sign up by providing a username, email, and password. The password is securely hashed before storing it in the database.
User Login: Registered users can log in using their username or email and password. Password verification is performed using PHP's password_verify() function.
Database Interaction: The script interacts with a MySQL database to store user information securely.
Usage
Requirements: Ensure you have PHP and MySQL installed on your server.

Database Setup: Create a MySQL database and table to store user information. You can use the following SQL commands:

sql
Copy code
CREATE DATABASE IF NOT EXISTS your_database_name;
USE your_database_name;
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);
Replace your_database_name with your desired database name.

Database Configuration: Update the database connection details in the include/header.php file to match your MySQL server credentials.

File Structure:

include/header.php: Contains the database connection code. Update the database credentials accordingly.
include/footer.php: Include any footer content or scripts here.
index.php: The main script containing user registration and login forms, along with PHP logic for handling form submissions.
Running the Application: Place all files in your web server directory and access index.php from a web browser.

Security Considerations
Password Hashing: User passwords are hashed using PHP's password_hash() function with the `PASSWORD_DEFAULT

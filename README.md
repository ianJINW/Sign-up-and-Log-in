## User Authentication System

This PHP script implements a simple user authentication system using PHP and MySQL. It allows users to sign up by providing a username, email, and password. After signing up, users can log in using their username or email and password.

### Features

- **User Registration**: Users can sign up by providing a username, email, and password. The password is securely hashed before storing it in the database.
- **User Login**: Registered users can log in using their username or email and password combination.
- **Password Hashing**: Passwords are hashed using the `password_hash()` function with the `PASSWORD_DEFAULT` algorithm, providing secure password storage.
- **Password Verification**: Passwords are verified using the `password_verify()` function to ensure secure authentication.

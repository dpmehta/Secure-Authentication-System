# Secure Authentication System

Welcome to our Secure Authentication System! This system provides a robust and secure way for users to register, login, and access their accounts. It is built using HTML, CSS, and PHP, ensuring the highest standards of security.

## Features

- **User Registration**: Users can easily register by providing a unique username and a secure password. The system ensures that duplicate usernames are not allowed.
- **Password Security**: User passwords are securely hashed before storing in the database, ensuring that even if the database is compromised, passwords remain protected.
- **Login Authentication**: Users can securely log in using their registered username and password. Invalid login attempts trigger alerts to inform the user.
- **Session Management**: Sessions are used to keep track of logged-in users. Unauthorized access to sensitive pages is prevented by redirecting users to the login page.
- **Logout Functionality**: Users can securely log out of their accounts, terminating their session and ensuring no unauthorized access.
- **Responsive Design**: The system is designed to be responsive, providing an optimal viewing and interaction experience across a wide range of devices.

## How to Use

1. **Register**: Navigate to the registration page (`register.php`) and provide a unique username along with a secure password. If the username already exists, an alert will inform you.
2. **Login**: Once registered, navigate to the login page (`login.php`) and enter your credentials. If the credentials are invalid, an alert will notify you.
3. **Welcome Page**: After successful login, you will be redirected to the welcome page (`welcome.php`), where you can access your account information and perform various actions.
4. **Logout**: To log out, simply click on the logout button. You will be securely logged out of your account.

## Security Measures

- **Password Hashing**: User passwords are hashed using industry-standard hashing algorithms, ensuring that plain text passwords are never stored.
- **Preventing SQL Injection**: Prepared statements are used to prevent SQL injection attacks, making the system resistant to common security vulnerabilities.
- **Session Security**: Sessions are managed securely to prevent session hijacking and ensure that only authorized users can access their accounts.

## Future Enhancements

- **Email Verification**: Implement email verification during registration to enhance account security.
- **Two-Factor Authentication (2FA)**: Integrate two-factor authentication for an additional layer of security.
- **Password Strength Meter**: Provide visual feedback to users about the strength of their chosen password during registration.

## Contributors

- [Dev Mehta](https://github.com/dpmehta)


https://github.com/dpmehta/Secure-Authentication-System/assets/104881208/473c4024-b6f0-41f8-9cd6-48bff1844839




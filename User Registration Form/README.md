# URF - User registration form

## Introduction

This project is a Personal Information Form created with HTML, PHP and CSS.

The user can enter personal information and submit the form.

## Files

- `index.php`: Contains the personal information form and checks and validates the information entered by the user.
- `style.css`: Contains the design of the form.

## Form Fields

The form contains:

- Last Name
- First Name
- Date of Birth
- Place of Birth
- Address
- City
- Province
- Postal Code
- Phone Number
- Email
- Tax Code
- Password
- Password Confirmation
- Privacy Checkbox

## PHP Functions

- `trim()`: Removes extra spaces.
- `preg_match()`: Checks the format of the data.
- `filter_var()`: Checks the email address.
- `password_hash()`: Creates a password hash.
- `htmlspecialchars()`: Displays information safely.

## How to Run

1. Open XAMPP.
2. Start Apache.
3. Put the URF folder inside `htdocs`.
4. Open the browser.
5. Visit `http://localhost/URF/index.php`.

## Technologies

- HTML
- PHP
- CSS

## Author

**Hossain Md Jeshan**

## Conclusion

This project teaches how to create a form, receive data with PHP and validate user information.

No JavaScript is used.

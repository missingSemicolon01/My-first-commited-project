# My First Commited Project

A simple bilingual (English / Greek) contact form built with PHP and HTML.

## About

This project is a single-page contact form that allows users to submit their information through a clean, styled interface. The form supports two languages and includes input validation on the server side.

## Features

- **Bilingual support**: Switch between English and Greek with a single click
- **Form fields**: Name, Email, Age, Gender, Category, and Message
- **Server-side validation**:
  - Required fields check (Name, Email, Age, Message)
  - Email format validation
  - Age range validation (1–120)
- **Three result states**:
  - The form page (default)
  - A success page that displays the submitted data
  - An error page that lists what needs to be corrected
- **Styled UI** with green color theme and responsive layout
- **XSS protection** using `htmlspecialchars()` for all user input

## Technologies Used

- PHP
- HTML5
- CSS3

## How to Run

1. Make sure you have a local server with PHP installed (e.g. XAMPP, WAMP, or MAMP)
2. Place the `index.php` file inside your server's root directory (e.g. `htdocs` for XAMPP)
3. Start your local server
4. Open your browser and go to `http://localhost/index.php`

## How to Use

1. Choose your preferred language (English or Ελληνικά) from the top of the form
2. Fill in the required fields (marked with `*`)
3. Click the **Submit** button
4. If everything is correct, you will see a success page with your data
5. If there are errors, you will see a list of what needs to be fixed and a **Go Back** button to return to the form

## File Structure

```
.
└── index.php   # Main file containing the form, validation, and result pages
```

## Author

Created as a learning project for PHP form handling and validation.

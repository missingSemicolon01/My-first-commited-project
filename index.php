<?php
# Checking if the user set a language, if not we set a default.
$lang = $_GET["lang"] ?? "el";

# Labels in Every Language
if ($lang == "en") {
    $title = "Contact Us";
    $nameLabel = "Name:";
    $emailLabel = "Email:";
    $ageLabel = "Age:";
    $genderLabel = "Gender:";
    $categoryLabel = "Category:";
    $messageLabel = "Message:";
    $submitLabel = "Submit";
    $manLabel = "Man";
    $womanLabel = "Woman";
    $otherLabel = "Other";
    $complaintLabel = "Complaint";
    $questionLabel = "Question";
    $suggestLabel = "Suggestion";
    $reqfields = "Required fields.";

    $nameRequired = "Name is required.";
    $emailRequired = "Email is required.";
    $invalidEmail = "Invalid email address.";
    $ageRequired = "Age is required.";
    $invalidAge = "Age must be between 1 and 120.";
    $messageRequired = "A message is required.";

    $successTitle = "Submission Successful!";
    $errorTitle = "Please correct the following errors:";
} else {
    $title = "Επικοινωνήστε Μαζί Μας";
    $nameLabel = "Ονοματεπώνυμο:";
    $emailLabel = "Email:";
    $ageLabel = "Ηλικία:";
    $genderLabel = "Φύλο:";
    $categoryLabel = "Κατηγορία:";
    $messageLabel = "Μήνυμα:";
    $submitLabel = "Υποβολή";
    $manLabel = "Άνδρας";
    $womanLabel = "Γυναίκα";
    $otherLabel = "Άλλο";
    $complaintLabel = "Παράπονο";
    $questionLabel = "Ερώτηση";
    $suggestLabel = "Πρόταση";
    $reqfields = "Υποχρεωτικά Πεδία";

    $nameRequired = "Το όνομα είναι υποχρεωτικό.";
    $emailRequired = "Το email είναι υποχρεωτικό.";
    $invalidEmail = "Μη έγκυρο email.";
    $ageRequired = "Η ηλικία είναι υποχρεωτική.";
    $invalidAge = "Η ηλικία πρέπει να είναι από 1 έως 120.";
    $messageRequired = "Το μήνυμα είναι υποχρεωτικό.";

    $successTitle = "Επιτυχής Καταχώρηση!";
    $errorTitle = "Παρακαλώ διορθώστε τα παρακάτω λάθη:";

}

# Check if the form has been submitted
$formSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

# If submitted, process and validate the data
if ($formSubmitted) {
    $name = trim(htmlspecialchars($_POST["name"] ?? ""));
    $email = trim(htmlspecialchars($_POST["email"] ?? ""));
    $age = trim(htmlspecialchars($_POST["age"] ?? ""));
    $gender = $_POST["gender"] ?? "";
    $category = $_POST["category"] ?? "";
    $userMessage = trim(htmlspecialchars($_POST["userMessage"] ?? ""));

    # Errors array
    $errors = [];

    # Validation
    if (empty($name)) {
        $errors[] = $nameRequired;
    }

    if (empty($email)) {
        $errors[] = $emailRequired;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = $invalidEmail;
    }

    if (empty($age)) {
        $errors[] = $ageRequired;
    } elseif (!filter_var($age, FILTER_VALIDATE_INT) || $age < 1 || $age > 120) {
        $errors[] = $invalidAge;
    }

    if (empty($userMessage)) {
        $errors[] = $messageRequired;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- If the form is submitted check if there are errors or not to print the correct title,if it is not submitted we print the default title. -->
    <?php if ($formSubmitted) { ?>
        <title><?php echo !empty($errors) ? $errorTitle : $successTitle; ?></title>
    <?php } else { ?>
        <title><?php echo $title; ?></title>
    <?php } ?>
    <style>
        body {
            background-color: #14532d;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .form-container,
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
        }

        h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
        }

        /* Form styles */
        h1.form-title {
            color: #14532d;
            font-size: 24px;
            text-decoration: underline;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 4px;
            font-weight: bold;
            color: #333333;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 2px solid #14532d;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #16a34a;
        }

        input[name="age"] {
            width: 70px;
        }

        .radio-group {
            margin-top: 5px;
        }

        .radio-group label {
            display: inline;
            font-weight: normal;
            margin-left: 5px;
        }

        textarea {
            resize: none;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #14532d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #16a34a;
        }

        .req-note {
            margin-top: 10px;
            font-size: 13px;
            color: #131915;
        }

        /* Error styles */
        .error-title {
            color: #b91c1c;
            text-decoration: underline;
        }

        .error-list {
            background-color: #fee2e2;
            border: 1px solid #fca5a5;
            border-radius: 6px;
            padding: 10px 15px;
            list-style: none;
        }

        .error-list li {
            color: #b91c1c;
            font-size: 14px;
            padding: 5px 0;
            border-bottom: 1px solid #fca5a5;
        }

        .error-list li:last-child {
            border-bottom: none;
        }

        /* Success styles */
        .success-title {
            color: #14532d;
        }

        .data-box {
            background-color: #f0fdf4;
            border: 2px solid #14532d;
            border-radius: 6px;
            padding: 10px 15px;
        }

        .data-box p {
            font-size: 14px;
            margin: 6px 0;
            color: #333333;
            word-break: break-word;
        }

        .data-box p span {
            font-weight: bold;
            color: #14532d;
        }
    </style>
</head>

<body>
    <!-- If the form is not submitted we print the form page, if it is submittted we print the result page -->
    <?php if (!$formSubmitted) { ?>

        <!-- FORM PAGE -->
        <div class="form-container">
            <h1 class="form-title"><?php echo $title; ?></h1>

            <!-- We send all our submitted data in the same file via POST -->
            <form action="" method="POST">

                <!-- NAME -->
                <label><?php echo "* " . $nameLabel; ?></label>
                <input type="text" name="name"><br>

                <!-- EMAIL -->
                <label><?php echo "* " . $emailLabel; ?></label>
                <input type="text" name="email"><br>

                <!-- AGE -->
                <label><?php echo "* " . $ageLabel; ?></label>
                <input type="text" name="age"><br>

                <!-- GENDER -->
                <label><?php echo $genderLabel; ?></label>
                <div class="radio-group">
                    <input type="radio" name="gender" value="<?php echo $manLabel; ?>" checked>
                    <!--We put MAN as our bydefault choice -->
                    <label><?php echo $manLabel; ?></label><br>
                    <input type="radio" name="gender" value="<?php echo $womanLabel; ?>">
                    <label><?php echo $womanLabel; ?></label><br>
                    <input type="radio" name="gender" value="<?php echo $otherLabel; ?>">
                    <label><?php echo $otherLabel; ?></label>
                </div>

                <!-- CATEGORY -->
                <label><?php echo $categoryLabel; ?></label>
                <select name="category">
                    <option value="<?php echo $questionLabel; ?>"><?php echo $questionLabel; ?></option>
                    <option value="<?php echo $suggestLabel; ?>"><?php echo $suggestLabel; ?></option>
                    <option value="<?php echo $complaintLabel; ?>"><?php echo $complaintLabel; ?></option>
                </select>

                <!-- MESSAGE -->
                <label><?php echo "* " . $messageLabel; ?></label>
                <textarea rows="6" name="userMessage" placeholder="..."></textarea>

                <!-- SUBMIT -->
                <button type="submit"><?php echo $submitLabel; ?></button>

                <p class="req-note">* <?php echo $reqfields; ?></p>

            </form>
        </div>

    <?php } else { ?>

        <!-- RESULT PAGE (errors or success) -->
        <div class="container">
            <!-- If there are errors we print the error page with all the errors we got ,if not,we prin the success page with all the data the user submitted. -->
            <?php if (!empty($errors)) { ?>

                <!-- Error page -->
                <h1 class="error-title"><?php echo htmlspecialchars($errorTitle); ?></h1>
                <ul class="error-list">
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php } ?>
                </ul>

            <?php } else { ?>

                <!-- Success page -->
                <h1 class="success-title"><?php echo htmlspecialchars($successTitle); ?></h1>
                <div class="data-box">
                    <p><span><?php echo $nameLabel; ?></span> <?php echo htmlspecialchars($name); ?></p>
                    <p><span><?php echo $emailLabel; ?></span> <?php echo htmlspecialchars($email); ?></p>
                    <p><span><?php echo $ageLabel; ?></span> <?php echo htmlspecialchars($age); ?></p>
                    <p><span><?php echo $genderLabel; ?></span> <?php echo htmlspecialchars($gender); ?></p>
                    <p><span><?php echo $categoryLabel; ?></span> <?php echo htmlspecialchars($category); ?></p>
                    <p><span><?php echo $messageLabel; ?></span> <?php echo htmlspecialchars($userMessage); ?></p>
                </div>

            <?php } ?>
        </div>

    <?php } ?>

</body>

</html>
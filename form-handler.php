<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    // Validation: Ensure fields are not empty
    if (empty($name) || empty($email) || empty($phone)) {
        echo "All fields are required. Please go back and fill out the form.";
        exit;
    }

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please go back and try again.";
        exit;
    }

    // Define the recipient email address
    $to = "info@theglobalhub.net";  // The new recipient email address
    $subject = "New Registration from Cityscape Egypt";
    
    // Construct the email message
    $message = "You have received a new registration from Cityscape Egypt 2025.\n\n";
    $message .= "Details:\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";

    // Set the email headers
    $headers = "From: no-reply@cityscapeegypt.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for registering! We will contact you soon.";
    } else {
        echo "There was an issue sending your registration. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
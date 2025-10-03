<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $organization = strip_tags(trim($_POST["organization"]));
    $message = strip_tags(trim($_POST["message"]));

    // Where the email goes
    $to = "oduorbrandol@gmail.com";  // <-- change to your email
    $subject = "New Contact Form Submission";

    // Build the email content
    $body  = "You have received a new message from your website:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Organization: $organization\n\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
}
?>

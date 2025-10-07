<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize it
    $firstName = htmlspecialchars(trim($_POST['firstname']));
    $lastName = htmlspecialchars(trim($_POST['lastname']));
    $subject = htmlspecialchars(trim($_POST['subject']));

    // Email address to send to
    $to = "patryk.jagielski08@gmail.com";

    // Email subject
    $emailSubject = "New message from $firstName $lastName";

    // Email body
    $message = "You have received a new message from the contact form.\n\n";
    $message .= "First Name: $firstName\n";
    $message .= "Last Name: $lastName\n";
    $message .= "Subject:\n$subject\n";

    // Email headers
    $headers = "From: noreply@yourdomain.com\r\n";
    $headers .= "Reply-To: noreply@yourdomain.com\r\n";

    // Send email
    if (mail($to, $emailSubject, $message, $headers)) {
        echo "Thank you for contacting us, $firstName!";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>

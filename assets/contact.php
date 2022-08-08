<?php
if (isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "creationsmk2018@gmail.com";
    $email_subject = "Contact through Protfolio";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['contact-name']) ||
        !isset($_POST['contact-phone']) ||
        !isset($_POST['contact-email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['contact-message']) 
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $contact_name = $_POST['contact-name']; // required
    $contact_phone = $_POST['contact-phone']; // required
    $contact_email = $_POST['contact-email']; // required
    $subject = $_POST['subject']; // required
    $contact_message = $_POST['contact-message']; // required  

    // $error_message = "";
    // $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    // if (!preg_match($email_exp, $email)) {
    //     $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    // }

    // $string_exp = "/^[A-Za-z .'-]+$/";

    // if (!preg_match($string_exp, $name)) {
    //     $error_message .= 'The Name you entered does not appear to be valid.<br>';
    // }

    // if (strlen($message) < 2) {
    //     $error_message .= 'The Message you entered do not appear to be valid.<br>';
    // }

    // if (strlen($error_message) > 0) {
    //     problem($error_message);
    // }

    $email_message = "Customer details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($contact_name) . "\n";
    $email_message .= "Email: " . clean_string($contact_phone) . "\n";
    $email_message .= "Mobile Number: " . clean_string($contact_email) . "\n";
    $email_message .= "Address: " . clean_string($subject) . "\n";
    $email_message .= "City: " . clean_string($contact_message) . "\n";
   
    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    <script type="text/javascript">
        alert("Thank you for contacting us. We will be in touch with you very soon.");
        window.location.href = "index.html";
    </script>
    <!-- Thank you for contacting us. We will be in touch with you very soon. -->

<?php
}
?>

<?php

    $contacted = false;
    $spam = false;
    //MAIL FORM:
if(isset($_POST['Name'])){
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['message'];
    $response = $_POST['g-recaptcha-response'];

    //RECAPTCHA
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => '6Lcjc5QUAAAAAKlze1j3gmEBy537nf6P-2CRctax', 'response' => $_POST["g-recaptcha-response"]);
    $options = array('http' => array('method' => 'POST', 'content' => http_build_query($data)));
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    //END RECAPTCHA
    $MessageTo = "contact@shaneth.com";
    $MessageSubject = "Website contact form entry";
    $MessageContent = "You have received a form entry on your website. " . $name . " has written the following:\n \n " . $message . "\n \n Their email is: " . $email . "\n -Mailbot v1.2 (barely improved from 1.1) by SP.";
    $Headers = "From: shaneth.com: " . $email;

    if(!empty($name) && $captcha_success->success == TRUE) {
        mail($MessageTo, $MessageSubject, $MessageContent, $Headers);
        $contacted = true;
    } else if(isset($message)) {
        $spam = true;
    }
}
?>
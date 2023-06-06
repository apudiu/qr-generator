<?php

use Snebtaf\QrGenerator;

require_once 'vendor/autoload.php';

$g = new QrGenerator('http://google.com');
$g->generate();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#2553b8" />
    <title>Brosasia QR Code Generator</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<p id="logo">&#10045;</p>
<h1 id="title">QR Generator</h1>
<p id="description">Register and start tracking your personal fitness journey.</p>
<form id="survey-form" method="post" action=''>
    <fieldset>
        <h2>Information</h2>
        <label for="content" id="name-label">
            Name
            <input
                    id="content"
                    name="name"
                    type="text"
                    placeholder="Enter your name"
                    required
            />
        </label>
        <label for="filename" id="email-label">
            Email
            <input
                    id="filename"
                    name="email"
                    type="email"
                    placeholder="Enter your email"
                    required
            />
        </label>
    </fieldset>
    <fieldset>
        <h2>Where do you start?</h2>
        <p>How would you describe your skill level?</p>

    </fieldset>

    <input id="submit" type="submit" value="Submit" />
</form>
<p id="footer">Made with &#x2661; by Dev Team</p>
</body>
</html>

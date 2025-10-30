<?php

use Snebtaf\QrGenerator;

require_once 'vendor/autoload.php';

$qrContent = $_GET['content'] ?? null;
$qrFilename = $_GET['filename'] ?? null;

$filename = null;
if ($qrContent) {

    $g = $qrFilename
        ? new QrGenerator($qrContent, $qrFilename)
        : new QrGenerator($qrContent);

    $filename = $g->generate();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#ffd5c9" />
    <title>Brosasia QR Code Generator</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<p id="logo">
    <a href="/">&#10045;</a>
</p>
<h1 id="title">QR Generator</h1>
<p id="description">Start generating QR codes 🙂</p>
<form>
    <fieldset>
        <h2>Information</h2>
        <label for="content">
            Content*
            <input
                    id="content"
                    name="content"
                    type="text"
                    placeholder="Enter content"
                    required
            />
        </label>
        <label for="filename">
            Filename
            <input
                    id="filename"
                    name="filename"
                    type="text"
                    placeholder="Enter file name (without extension)"
            />
        </label>
    </fieldset>

    <input id="submit" type="submit" value="SUBMIT" />

    <?php if ($filename) { ?>
        <fieldset>
            <h2>Generated Image</h2>
            <p>For <code><?php echo $qrContent ?></code></p>
            <p>Right click & save image</p>

            <img
                    class="qr-img"
                    src="<?php echo $filename ?>"
                    alt="QR code for <?php echo $qrContent ?>"
            />
        </fieldset>
    <?php } ?>

</form>
<p id="footer">Made with ❤️ by DevTeam</p>
</body>
</html>

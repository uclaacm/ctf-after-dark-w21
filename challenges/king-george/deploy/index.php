<!DOCTYPE html>
<html>
<title> King George </title>
<head>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<h1>
Note to <king>King George</king>
</h1>
<p>
It's so hard being the King when your followers don't appreciate all you do for them. However, I know that some of you are bursting inside with love for me, so I have created a place where you can post all your heartfelt compliments for yours truly.
</p>
<p>
<a href=https://www.youtube.com/watch?v=-P_1RYVTjcA><img src = selfportrait.jpg></a>
</p>
<p>
Here are some examples of what you can post:
</p>
<p>
I LOVE KING GEORGE! <br>
that's MY KING right there &lt3 <br>
best king that i've ever had in my life <br>
All praise the mighty King George, and let us all be humbled by his presense should he ever decide to step out of his fabulous palace.
</p>
<p>
I'm pretty sure that all the inputs are sanitized. At least that's what my scribe told me. Sometimes he gets a little lazy, so I might need to chop his head off later. What a <i><comment>special character</comment></i>, am I right?
</p>
<p>
Oh, also, if you cause an error, I will kill your friends and family to remind you of my love. :)
</p>
</body>

<FORM NAME ="form1" METHOD = "POST" ACTION = "">
<INPUT TYPE = "Text" placeholder = "your love note here" NAME = "note">
<input type="submit" value="Submit" name="Submit1" class="btn">
</FORM>
<br>
<?php

function cleanup($x) {
    if (preg_match('/[^\x20-\x7e]/', $x)) {
        // remember to comment out the echo statements before publishing!!!
        // this is for debugging ONLY
        // I'll finish this sanitization later
        echo highlight_file(__FILE__, true);
        echo "<br>";
        throw new Exception('Bad Character.');
    }
    if (htmlspecialchars($x, ENT_QUOTES, 'UTF-8') != $x) {
        echo "<comment>Nice try, but no XSS injections for you.</comment> <br>";
    }
    return htmlspecialchars($x, ENT_QUOTES, 'UTF-8');
}

function hashbrown($x) {
    return hash("sha256", $x);
}

if (isset($_POST['Submit1'])) {
    try {
        echo cleanup($_POST["note"]);
        echo "<br>";
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    if (strlen($_POST["note"]) == 32 &&
        hashbrown(substr($_POST["note"], 0, 4) == "807d0fbcae7c4b20518d4d85664f6820aafdf936104122c5073e7744c46c4b87") &&
        substr($_POST["note"], 4, 1) == "{" &&
        hashbrown(substr($_POST["note"], 5, 5) == "076c8572e5b5c4c8501a73ccad6f6ef573d07d31ddf592e971534e261edb6638") &&
        substr($_POST["note"], 10, 1) == "_" &&
        hashbrown(substr($_POST["note"], 11, 2) == "46599c5bb5c33101f80cea8438e2228085513dbbb19b2f5ce97bd68494d3344d") &&
        substr($_POST["note"], 13, 1) == "_" &&
        hashbrown(substr($_POST["note"], 14, 4) == "3c482346f375027677fa8a0d6830a32714d4f13f9e94c2d9e215e0ac205ad4e5") &&
        substr($_POST["note"], 18, 1) == "_" &&
        hashbrown(substr($_POST["note"], 19, 4) == "c6c1c9a9c8543f1e4cd980064cf1625eeb61a90703b2464fff039f21682508b3") &&
        substr($_POST["note"], 23, 1) == "_" &&
        hashbrown(substr($_POST["note"], 24, 7) == "16b60e9de6072d0e93d3b4555da4219695af891e2cf30a54e931eb1e44587b83") && 
        substr($_POST["note"], 31, 1) == "}" ){
        echo "<br>Hey you're not supposed to be able to see this!<br>";
    }
}
?>
</html>

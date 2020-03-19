<?php
/**
 * Test script for Cryptopost PHP class
 */
session_start();

require_once './Cryptopost.class.php';
$crypto = new Cryptopost(1024, './openssl.cnf'); // Session MUST be started.


// Check for FORM encrypted data
if (isset($_POST['cryptoPost'])) {
    $cryptedPost = $_POST;              // Save crypted data for debug
    $formId = $crypto->decodeForm();    // Decrypt $_POST contents

    // Do stuff here (database record, etc). 
    // Dont forget to secure filter $_POST values.
    //
    // DON'T USE received $_POST values in the HTML code! This will transmit
    // data as clear text to the browser: Use javascript 'cryptoPost.decrypt()' 
    // method to fill your form, so data is decrypted locally at client's browser.
    if (isset($_POST['data1'])) {
        $data['data1'] = filter_var($_POST['data1'], FILTER_VALIDATE_INT);
        /* ... etc ... */
    }

    // Encrypt processed data if you need to fill form again:
    $encrypted = $crypto->encodeData($_POST, $formId);
}
?>
<!DOCTYPE html>
<html lang="en-EN">
<head>
    <meta charset="UTF-8">
    <title>PC314 - LOGIN<</title>
    <meta name="sessionkey" content="<?php echo $_SESSION['RSA_Public_key']; ?>">
    <script src="./javascript/rsa_jsbn.js"></script>
    <script src="./javascript/gibberish-aes.js"></script>
    <script src="./javascript/cryptopost.js"></script>
</head>
<body>
<a href="index.php">
    <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
</a>

<form id="form1" method="POST" action="login.php" onsubmit="return cryptoPost.encrypt('form1')">
    <fieldset>
        <legend>User Log In</legend>
        <ul>
            <li>
                <label>User Name:</label>
                <input type="text" name="username">
            </li>
            <li>
                <label>Password:</label>
                <input type="password" name="password">
            </li>
            <li>
                <label> </label>
                <input type="checkbox" name="remember" value="yes">Auto log in for 7 days
            </li>
            <li>
                <label> </label>
                <input type="submit" name="login" value="login">
            </li>
        </ul>
    </fieldset>
</form>
<!-- Fill form input fields -->
<?php if (isset($encrypted)) { ?>
    <script>cryptoPost.decrypt('<?php echo $encrypted;?>');</script>
<?php } ?>
<br/>
<br/>
<?php

if (isset($cryptedPost)) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $_name = "admin";
    $_pswd = "";
    $db = fopen("resource/database.txt", "r") or die("File wrong!");
    while (!feof($db)) {
        $_pswd = fgets($db);
    }
    fclose($db);

    // judge the correctness
    if (($username == '') || ($password == '')) {
        // if null, then alert the warning and return to log in page after 3 seconds
        header('refresh:3; url=login.php');
        echo "The username and password cannot left blank, this page will refresh after 3s, please fill the info correctly.";
        exit;
    } elseif (($username != $_name) || ($password != $_pswd)) {
        # wrong password
        header('refresh:3; url=login.php');
        echo "The username or password is wrong, this page will refresh after 3s, please fill the info correctly.";
        exit;
    } elseif (($username = $_name) && ($password = $_pswd)) {
        # All correct then save the user info into session
        $_SESSION['username'] = $username;
        $_SESSION['islogin'] = 1;
        // if the auto log in is checked, then save the cookie for seven days
        if ($_POST['remember'] == "yes") {
            setcookie('username', $username, time() + 7 * 24 * 60 * 60);
            setcookie('code', md5($username . md5($password)), time() + 7 * 24 * 60 * 60);
        } else {
            // if not then delete the cookie
            setcookie('username', '', time() - 999);
            setcookie('code', '', time() - 999);
        }
        // jump to the user page after processing
        header('location:users.php');
    }
}
?>
</body>
</html>

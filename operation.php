<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC314 - USERS</title>
</head>

<body>
<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<?php
header('Content-type:text/html; charset=utf-8');
// open Session
session_start();

// check if the cookie remembered the user info
if (isset($_COOKIE['username'])) {
    // if so, passed to session directory
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
}
if (isset($_SESSION['islogin'])) {
    // if already logged in
//    echo "Hello! " . $_SESSION['username'] . ' ,Welcome to the user page!<br>';
//    echo "<div>
//    Current users:<br>
//    <uo>
//        <li>Mary Smith</li>
//        <li>John Wang</li>
//        <li>Alex Bington</li>
//    </uo>
//</div>";
    $servername = "localhost";
    $username = "root";
    $password = "271828ppp";
    $dbname = "pc314";

    echo "

<form action=\"operation.php\" method=\"post\">
		<fieldset>
			<legend>Add or Search</legend>
			<ul>
				<li>
					<label>FirstName:</label>
					<input type=\"text\" name=\"firstname\">
				</li>
				<li>
					<label>LastName:</label>
					<input type=\"text\" name=\"lastname\">
				</li>
				<li>
					<label>Email:</label>
					<input type=\"email\" name=\"email\">
				</li>
				<li>
					<label>HomeAddr:</label>
					<input type=\"text\" name=\"addr\">
				</li>
				<li>
					<label>HomePhone:</label>
					<input type=\"tel\" name=\"hphone\">
				</li>
				<li>
					<label>CellPhone:</label>
					<input type=\"tel\" name=\"cphone\">
				</li>
				</ul>


              <input type=\"radio\" id=\"add\" name=\"op\" value=\"add\">
              <label for=\"add\">ADD</label><br>
              <input type=\"radio\" id=\"search\" name=\"op\" value=\"search\">
              <label for=\"search\">SEARCH</label><br>

					<label> </label>
					<input type=\"submit\" name=\"submit\" value=\"Go!\">

		</fieldset>
	</form>
";

} else {
    // not logged in
    echo "You haven't logged in, please<a href='login.php'>log in</a>";
}

if (isset($_SESSION['islogin']) && $_POST) {
# accept form data
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $hphone = $_POST['hphone'];
    $cphone = $_POST['cphone'];
    $opr = $_POST['op'];
//    echo "Current operation is " . $opr . "<br>";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "";
    if ($opr == "add") {
        $sql = "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('"
            . $fname . "','" . $lname . "','" . $email . "','" . $addr . "','" . $hphone . "','" . $cphone . "');";
    } else
        $sql = "SELECT * FROM Users WHERE (firstname = '" . $fname . "' OR lastname = '" . $lname . "') OR email = '"
            . $email
            . "' OR homeaddr = '" . $addr . "' or homephone = '" . $hphone . "' or cellphone = '" . $cphone . "';";
    $result = $conn->query($sql);

    if ($opr == "add") {
        echo "Record successfully added";
    } elseif ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " <br> Name: " . $row["firstname"] . " " . $row["lastname"] . " <br> Email: " .
                $row["email"] . " <br> ADDR: " . $row["homeaddr"] . " <br> PHONE: " . $row["homephone"] . "<br>";
        }
    } else {
        echo "0 results<br>";
    }

    $conn->close();
}
echo "<a href='logout.php'>Log out</a><br>";
?>

</body>

</html>
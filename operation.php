<?php
header('Content-type:text/html; charset=utf-8');
session_start();

echo "
<div>
    <a href=\"index.php\">
        <img src=\"resource/logo.png\" alt=\"LOGO\" style=\"float: left\" width=\"196\" height=\"70\"/>
    </a><br><br><br><br>
</div>

";

// check if the cookie remembered the user info
if (isset($_COOKIE['username'])) {
    // if so, passed to session directory
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
}
if (isset($_SESSION['islogin'])) {

    $servername = "127.0.0.1";
    $username = "root";
    $password = "271828ppp";
    $dbname = "pc314";


    if ($_POST) {

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
//            echo $sql . "<br>";
        } else {
            $sql = "SELECT * FROM Users WHERE firstname = '" . $fname . "' OR lastname = '" . $lname . "' OR email = '"
                . $email
                . "' OR homeaddr = '" . $addr . "' OR homephone = '" . $hphone . "' OR cellphone = '" . $cphone . "';";
//            echo $sql . "<br>";
        }

        $result = $conn->query($sql);

        if ($opr == "add") {
            echo "Record successfully added<br>";
        } elseif ($result->num_rows > 0) {
            // output data of each row
            echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Home Address</th><th>Home Phone</th><th>Cell Phone</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['firstname'] . "</td>";
                echo "<td>" . $row['lastname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['homeaddr'] . "</td>";
                echo "<td>" . $row['homephone'] . "</td>";
                echo "<td>" . $row['cellphone'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        $conn->close();
    }
    echo "<a href='operation.html'>Return</a><br>";
    echo "<a href='logout.php'>Log out</a><br>";


} else {
// not logged in
    echo "You haven't logged in, please<a href='login.html'>log in</a>";
}

?>
</body>

</html>
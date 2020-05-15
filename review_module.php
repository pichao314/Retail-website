<!DOCTYPE html>

<h2>Reviews</h2>
<table border='1'>
    <tr>
        <th>Email</th>
        <th>Score</th>
        <th>Review</th>
    </tr>
    <?php
    include "db_connect.php";

    $find = "SELECT * FROM Reviews WHERE item='" . $item . "'";
    $result = $conn->query($find);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $conn->close();
    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['score'] . "</td>";
        echo "<td>" . $row['review'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php

if (isset($_SESSION['islogin'])) {
// if already logged in
    echo $_SESSION['username'] . " please rate this product:";
    ?>

    <div>
        <form action="review.php" method="post">
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 1) echo "checked"; ?>
                   value=1>1
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 2) echo "checked"; ?>
                   value=2>2
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 3) echo "checked"; ?>
                   value=3>3
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 4) echo "checked"; ?>
                   value=4>4
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 5) echo "checked"; ?>
                   value=5>5
            <input type="hidden" name="item" value="<?php echo $item ?>">
            <br>Write your review here:<br>
            <textarea name="content"></textarea>
            <div><input type="submit" value="Submit Review"/></div>
        </form>
    </div>


    <?php
} else {
    // not logged in
    echo "Want to write review? Please <a href='login.html'>log in</a><br>";
}
?>
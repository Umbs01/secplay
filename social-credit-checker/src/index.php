<?php include("include/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gbk">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Credit Checker: 社会信用检查器</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Seeing your Social Credit Score never been easier!</h1>
    <div id="container">
        <p>Enter your name to check your social credit score.</p>
        <p>检查您的社会信用评分从未如此简单</p>
        <form method="GET" action="">
            <label for="name">Name (姓名)</label>
            <br>
            <input type="text" name="name" required>
            <input type="submit" value="Check Score">
        </form>
    </div>
    <div id="result">
        <?php
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            $escaped_name = mysql_real_escape_string($name);
            $stmt = "SELECT score FROM social_credit WHERE name='$escaped_name'";
            $result = mysql_query($stmt);

            if (!$result) {
                die("Query failed: " . mysql_error());
            }
            if (mysql_num_rows($result) > 0) {
                while($row = mysql_fetch_assoc($result)) {
                    $score = $row["score"];
                    echo $score;
                }
            } else {
                $score = rand(-999999999, getrandmax());
                $stmt = "INSERT INTO social_credit (name, score) VALUES ('$escaped_name', '$score')";
                if (mysql_query($stmt) === TRUE) {
                    echo $score;
                }
            }
        }
        ?>
    </div>
    <br>
    <?php
    if ($score > 0) {
        echo '<img src="https://img.itch.zone/aW1nLzExOTUzODE1LnBuZw==/original/sEBjV4.png" alt="good credit" width="300">';
    } else {
        echo '<img src="https://i.pinimg.com/736x/3e/93/df/3e93df19c2a27b3b1fe3d482d47e2940.jpg" alt="bad credit" width="300">';
    }
    ?>
</body>
</html>
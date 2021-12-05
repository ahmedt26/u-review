<?php
//SET DATABASE CONNECTION
$host = "www.mysite.com";
$username = "marqusG";
$pwd = "12Ab34cD";
$db = "mydatabase";
$dbconn = mysqli_connect($host, $username, $pwd, $db);
if (mysqli_connect_errno()) {
    echo "Connection to the database failed with the following error: " . mysqli_connect_error();
}

//CHECK IF FORM HAS BEEN SUBMITTED USING FILTER_HAS_VAR (http://www.php.net/manual/en/function.filter-has-var.php)
if (filter_has_var(INPUT_POST, 'nickname')) {
    //GET VALUES FROM THE $_POST ARRAY USING FILTER_INPUT (http://www.php.net/manual/en/function.filter-input.php)
    $nickname = filter_input(INPUT_POST, 'nickname');
    $language = filter_input(INPUT_POST, 'language');
    $level = filter_input(INPUT_POST, 'level');
    if (!mysqli_query($dbconn, $query)) {
        $output = "Error inserting data into database: " . mysqli_error($dbconn) . "<br />";
        $output .= "Please, retry.<br />";
        $output .= <<<FRM
		<form method="post">
		NickName: <input type="text" name="nickname" />
		Language: <input type="text" name="language" />
		Level: <input type="text" name="level" />
		<input type="submit" />
		</form>
FRM;
    } else {
        $output = "Data inserted successfully!";
        $ouput .= "Following data have been added to your database:<br />";
        $ouput .= "NickName: $nickname<br />";
        $ouput .= "Language: $language<br />";
        $ouput .= "Level: $level<br />";
    }
} else {
    $ouput = "Please, insert your data in the form below:<br />";
    $output .= <<<FRM
	<form method="post">
	NickName: <input type="text" name="nickname" />
	Language: <input type="text" name="language" />
	Level: <input type="text" name="level" />
	<input type="submit" />
	</form>
FRM;
    mysqli_close($dbconn);
}
?>
<html>

<body>
    <?php echo $output; ?>
</body>

</html>
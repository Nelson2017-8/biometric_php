<?php

$type = isset($_GET['type']) ? $_GET['type'] : null;
$document = isset($_GET['document']) ? $_GET['document'] : null;
echo json_encode($_GET);

// your code here...

// redirect

//header("Location: ./home.php");


echo "<br><a href='home.php'>Home</a>";

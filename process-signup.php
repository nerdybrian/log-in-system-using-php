<?php 
/*
if(empty($_POST["name"])){
   die("name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ){
    die("valid email is required");
}

if (strlen($_POST["password"]) < 8 ) {
    die("password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i" , $_POST["password"])) {
    die("password must contain at least one letter");
}
if ( ! preg_match("/[0-9]/i" , $_POST["password"])) {
    die("password must contain at least one letter");
}

if ($_POST["password"] !==$_POST["password_confirmation"]) {
    die("passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_dEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
       VALUES(?, ? , ?)" ;


// if ( ! $stmt = $mysqli->stmt_init() ){
//     die("SQL error:" . $mysqli -> error);
// }

if ( ! $stmt = $mysqli->prepare($sql) ){
    die("SQL error:" . $mysqli -> error);
}

$stmt-> bind_param( "sss",
                     $_POST["name"],
                     $_POST["email"],
                     $password_hash );

if ($stmt->execute()){

  header("location:signup-successful.html");
   exit;
}else{
   
    if($mysqli->errno ===1062) {
         die("email already taken");
    }

   die($mysqli->error. " " . $mysql ->errno);
    
}
//$stmt ->prepare($sql);
$stmt->close();






print_r($_POST); 
var_dump($password_hash);
*/


//chatgpt gen 


if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password-confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";

if (!$stmt = $mysqli->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
    header("location: signup-successful.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    }

    die($mysqli->error . " " . $mysqli->errno);
}

// Close the statement
$stmt->close();

print_r($_POST);
var_dump($password_hash);

?>



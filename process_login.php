<head>
<?php 
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

echo "<h2>You attempted to login with " . $username . " and " . $password . "</h2>";

$stmt = $mysqli->prepare("SELECT id,user_name,password FROM users WHERE user_name = ?");
$stmt->bind_param("s",$username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid,$uname,$pw);

if($stmt->num_rows ==1){
    echo "found one person with that username <br>";
    $stmt->fetch();
    if(password_verify($password,$pw)){
        echo "login successful";
        $_SESSION ['username'] = $uname;
        $_SESSION['userid'] = $userid;
        exit;
    }
    else {
        $_SESSION =  [];
        session_destroy();
    }
}
else{
    $_SESSION =  [];
    session_destroy();
}
echo "login failed<br>";


// $sql = "SELECT id,user_name,password FROM users WHERE user_name = '$username' AND password = '$password'";

// echo "SQL = " . $sql . "<br>";

// $result = $mysqli->query($sql);
// echo"<pre>";

// print_r($result);

// echo "</pre>";

// $result = $mysqli->query($sql);

// if($stmt->num_rows>0){
//     $row = $stmt->fetch();
//     $userid = $row['id'];
//     echo "login successful";
//     // $_SESSION ['username'] = $username;
//     // $_SESSION['userid'] = $userid;
//      $_SESSION ['username'] = $uname;
//      $_SESSION['userid'] = $userid;

//     echo"<div></div>";
// } else {
//     echo "0 results. Not logged in<br>";
//     $_SESSION =  [];
//     session_destroy();
// }
// echo "Session variable = ";
// print_r($_SESSION);
// echo "<br>";
// echo "<a href='index.php'>Return to main page</a>"; 
// 


// if($result->num_rows>0){
//     $row = $result -> fetch_assoc();
//     $userid = $row['id'];
//     echo "login successful";
//     // $_SESSION ['username'] = $username;
//     // $_SESSION['userid'] = $userid;
//      $_SESSION ['username'] = $uname;
//      $_SESSION['userid'] = $userid;

//     echo"<div></div>";
// } else {
//     echo "0 results. Not logged in<br>";
//     $_SESSION =  [];
//     session_destroy();
// }

echo "Session variable = ";
print_r($_SESSION);
echo "<br>";
echo "<a href='index.php'>Return to main page</a>"; 

?>
<?php
include_once('config.php');

//variables
/*$userID = htmlspecialchars(trim($_POST['myIDpass']));
$oldPassword = htmlspecialchars(trim($_POST['oldPassword']));
$newPassword = htmlspecialchars(trim($_POST['newPassword']));
$newPassword2 = htmlspecialchars(trim($_POST['newPassword2']));
*/
$passwordError = "";
$passwordError2 = "";
$error_count = 0;


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitPassword']))
{
//variables
$userID = htmlspecialchars(trim($_POST['myIDpass']));
$oldPassword = htmlspecialchars(trim($_POST['oldPassword']));
$newPassword = htmlspecialchars(trim($_POST['newPassword']));
$newPassword2 = htmlspecialchars(trim($_POST['newPassword2']));
$passwordError = "";
$passwordError2 = "";
$error_count = 0;

//Error checking
if (empty($oldPassword || empty($newPassword) || empty($newPassword2)))
{
    $passwordError = "<p style=\"color:red;\">Please fill in the all fields to change your password.</p>";
    $error_count++;
}
if (strlen($newPassword) < 8)
{
    $passwordError = "<p style=\"color:red;\">Passwords must be atleast 8 characters long</p>";
    $error_count++;
}
if ($error_count == 0)
{
    if ($newPassword === $newPassword2)
    {

        //Attempt to connect to the database
        $db = mysqli_connect($servername,$username,$password,$dbname);

        // Check connection
        if (mysqli_connect_errno())
        {
                echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
        }
        else
        {

            //SQL Querry to Database
            $sql = "SELECT *
            FROM customers
           WHERE id = '$userID'";
        

           if(!$result = $db->query($sql))
            {
                echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p>";
            }  
            else
            {

                while($row = $result->fetch_assoc())
                {
                    $returnPassword = $row["password"];

                    if ($oldPassword == $returnPassword)
                    {
                        $sql = "UPDATE `customers` SET `password`='$newPassword' WHERE id = $userID";

                        if(!$result = $db->query($sql)){
                            echo "<p>There was an error running the query [" . mysqli_error($db) . "]</p><br><p>$sql</p>";
                        }  
                        else {
                            // destroy everything in this session  
                            unset($_SESSION);

                            if (ini_get("session.use_cookies"))
                            {
                                $params = session_get_cookie_params();
                                setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
                            }
  
                            if(session_destroy())
                            {
                            //redirect to login
                            header('Location: password_change_confirmation.php');
                            exit;
                            }
                        }

                    }
                    else
                    {
                        $passwordError2 = '<p style="color:red;">The Password you entered is incorrect.</p>';
                    }
                }
            }
        }
    }
    else
    {
        $passwordError2 = "<p style=\"color:red;\">Both passwords must be matching.</p>";
    }
}
}
?>
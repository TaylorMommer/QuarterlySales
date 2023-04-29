<?PHP
//FORM CONFIRMATION
session_start();

$_SESSION['name']=filter_input(INPUT_POST, 'name');
$_SESSION['date']=filter_input(INPUT_POST, 'date');
$_SESSION['service']=filter_input(INPUT_POST, 'service');
$_SESSION['status']=filter_input(INPUT_POST, 'status');

?>

<!doctype html>
<html>
<head>
    <title>Request form Confirmation</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <header>
        <h1>Request Confirmation</h1>
    </header>
    <main>
        <?php

            if(isset($_SESSION['name'])){
                echo "<p>Thank you ";
                echo $_SESSION['name'];
                echo "<p>! You request has been submitted.";
                echo "</hr>";
                echo "Request Details: >";
                echo "<strong>Request ID: </strong>";
                echo $_SESSION['request_id'];
                echo "<br>";
                echo "<strong>Phone: </strong>";
                echo $_SESSION['phone'];
                echo "<br>";
                echo "<strong>Meal: </strong>";
                echo $_SESSION['meal'];
                echo "<br>";
                echo "<strong>Drink: </strong>";
                echo $_SESSION['drink'];
                echo "<br>";


                echo"</p>";
            }

            if(isset($_SESSION['date'])){
                echo "<p><a href='home.php'>Return to your homepage</a></p>";
            } else {
                echo "<p>Request information is incomplete.";
                echo "<a href='request.html'>Click here</a> to return to the requestform.</p>";
            }

        ?>
    </main>

</body>
</html>
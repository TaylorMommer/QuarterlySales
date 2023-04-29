<?php
// Start session management
require_once('config.php');
//get the request id 
$request_id = filter_input(INPUT_GET, 'request_id', FILTER_VALIDATE_INT);
$status = filter_input(INPUT_GET, 'status');

if ($request_id == NULL || $request_id == FALSE) {
	$request_id = 1;
	
}

//get name for selected requests
$queryStatus = 'SELECT * FROM requests
				WHERE status = :status';

$statement1 = $db->prepare($queryRequest);
$statement1->bindValue(':status', $status);
$statement1->execute();
$request = $statement1->fetch();
$request_status = $status['status'];
$statement1->closeCursor();

//get all requests
$queryAllRequests = 'SELECT * FROM requests
                      ORDER BY request_id';
$statement2 = $db->prepare($queryAllRequests);
$statement2->execute();
$requests = $statement2->fetchAll();
$statement2->closeCursor();
					  
// Get requests for selected status
$queryNew = 'SELECT * FROM requests
                  WHERE request_id = :request_id
                  ORDER BY request_id';
$statement3 = $db->prepare($queryNew);
$statement3->bindValue(':request_id', $request_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();


?>
<!doctype html>
<html>
<head>
	<meta charset= "utf-8" />
	<link href= "community_assistance.css" rel="stylesheet" />
	<link href= "services.css" rel="stylesheet" />

</head>

<body>
	 <header>
         <nav>
			<ul>
			 <li><a href= "index.php">Home</a></ li>
		  	 <li><right-side><a href= "services.php">services</a></right-side></li>
			 </ul>
	     </nav>
	 </header>
		<h1>Services we are looking for..</h1>
		<img src="helping_hand.jfif" alt="" />
		<h2>Grocery and shopping services</h2>
		<p>We are looking for volunteers who are willing to offer personalized shopping 
		services which can include grocery, household needs, pet needs and ready-made 
		food delivery </p>

		<h2>placeholder</h2>
        <nav>
        <ul>
		<!----Display a list of requests --->
            <?php foreach ($requests as $request) : ?>
            <li>
                <a href="?request_id=<?php echo $request['request_id']; ?>">
                    <?php echo $request['status']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>           
		<p>descriptions.</p>


	<!----table of all reuqests --->
		<h2>Services</h2>
		<p>descriptions.</p>
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Request ID:</th>
                <th>Name</th>
                <th class="right">Price</th>
            </tr>

            <?php foreach ($requests as $request) : ?>
            <tr>
                <td><?php echo $request['type']; ?></td>
                <td><?php echo $request['status']; ?></td>
                <td class="right"><?php echo $request['date']; ?></td>
            </tr>
            <?php endforeach; ?>            

		<h2>Services</h2>
		<p>descriptions.</p>

		<h2>Services</h2>
		<p>descriptions.</p>

		<h2>Services</h2>
		<p>descriptions.</p>

		<h2>Services</h2>
		<p>descriptions.</p>

		<h2>Services</h2>
		<p>descriptions.</p>
		beauty of your property and help you achieve your landscaping vision.</p>
	<footer>
		The greatest communities are built from a villiage. 
	</footer>
</body>

</html>

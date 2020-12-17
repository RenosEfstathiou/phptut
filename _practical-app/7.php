<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>


<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>


	</aside>
	<!--SIDEBAR-->


	<article class="main-content col-xs-8">





		<?php

		/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data

*/
		?>

		<?php
		// initialize mysql Connnection
		$connection = mysqli_connect('localhost', 'root', '', 'chapter7');

		if (!$connection) {
			die('Database connection failed :<br>') . mysqli_error($connection);
		}
		?>

		<?php
		// // create a query to insert data in the db
		// $query = "INSERT INTO cocktails(name,descreption) ";
		// $query .= "VALUES( 'Cocktail1 ' , ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, fugiat ipsa. Rem id voluptate quibusdam!
		// 	' )";
		// // get our connection link
		// global $connection;
		// // execute query
		// $res = mysqli_query($connection, $query);
		// // check for errors
		// if (!$res) {
		// 	die("There was an error inserting data please try again :<br>" . mysqli_error($connection));
		// }

		?>

		<?php

		$query = "SELECT * FROM cocktails ";
		global $connection;
		$res = mysqli_query($connection, $query);

		if (!$res) {
			die("Cant read data :<br>" . mysqli_error($connection));
		}
		?>

		<?php
		while ($record = mysqli_fetch_assoc($res)) {
			print_r($record);
		}
		?>




	</article>
	<!--MAIN CONTENT-->

	<?php include "includes/footer.php"; ?>
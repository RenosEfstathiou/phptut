<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>



<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>


	</aside>
	<!--SIDEBAR-->


	<article class="main-content col-xs-8">



		<?php

		/*  Create a link saying Click Here, and set 
	the link href to pass some parameters and use the GET super global to see it

		Step 2 - Set a cookie that expires in one week

		Step 3 - Start a session and set it to value, any value you want.
	*/
		print_r($_GET);
		$expire = time() + (60 * 60 * 24 * 7);
		setcookie('practiceCookie', 31, $expire);

		session_start();

		$_SESSION['value'] = 65;


		?>

		<a href="9.php?this=65"><?php
								echo $_SESSION['value'];
								?></a>



	</article>
	<!--MAIN CONTENT-->
	<?php include "includes/footer.php"; ?>
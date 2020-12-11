<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>

<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>

	</aside>
	<!--SIDEBAR-->


	<article class="main-content col-xs-8">


		<?php

		/*  Step1: Make a form that submits one value to POST super global


 */
		if (isset($_POST['submit'])) {
			if (isset($_POST['text'])) {
				if (strlen(trim($_POST['text'])) == 0) {
					echo 'Text field is empty try again';
				} else
					echo $_POST['text'];
			}
		}

		?>

		<form action="6.php" method="post">
			<input type="text" placeholder="Text" name='text'>
			<button type="submit" name='submit'>Submit</button>
		</form>


	</article>
	<!--MAIN CONTENT-->
	<?php include "includes/footer.php"; ?>
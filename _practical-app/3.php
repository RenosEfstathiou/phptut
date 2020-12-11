<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>

<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>

	</aside>
	<!--SIDEBAR-->


	<article class="main-content col-xs-8">

		<?php

		/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */
		for ($i = 0; $i < 11; $i++) {
			if ($i < 5) {
				echo 'less than 5 <br> ';
			} elseif ($i < 10) {
				echo 'less than 10 <br>';
			} else
				echo 'I love php <br>';

			switch ($i) {
				case 1:
					echo $i * 3 . '<br>';
					break;
				case 3:
					echo $i * 3 . '<br>';
					break;
				case 5:
					echo $i * 3 . '<br>';
					break;
				case 7:
					echo $i * 3 . '<br>';
					break;
				case 9:
					echo $i * 3 . '<br>';
					break;
				default:
					echo 'Not 1 / 3/ 5 / 7 / 9 <br>';
					break;
			}
		}




		?>






	</article>
	<!--MAIN CONTENT-->

	<?php include "includes/footer.php"; ?>
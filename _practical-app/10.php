<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>
<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>


	</aside>
	<!--SIDEBAR-->

	<article class="main-content col-xs-8">


		<?php

		/*  Step 1: Use the Make a class called Dog

		Step 2: Set some properties for Dog, Example, eye colors, nose, or fur color

		Step 4: Make a method named ShowAll that echos all the properties

		Step 5: Instantiate the class / create object and call it pitbull

		Step 6: Call the method ShowAll
		
	*/

		class Dog
		{
			private $eyeColor;
			private $furColor;
			private $nose;


			function __construct($eyeColor, $furColor, $nose)
			{
				$this->eyeColor = $eyeColor;
				$this->furColor = $furColor;
				$this->nose = $nose;
			}



			// *GETTERS
			public function getEyeColor()
			{
				return $this->eyeColor;
			}

			public function getFurColor()
			{
				return $this->furColor;
			}

			public function getNose()
			{
				return $this->nose;
			}

			// *SETTERS
			public function setEyeColor($eyeColor)
			{
				$this->eyeColor = $eyeColor;

				return $this;
			}


			public function setFurColor($furColor)
			{
				$this->furColor = $furColor;

				return $this;
			}


			public function setNose($nose)
			{
				$this->nose = $nose;

				return $this;
			}

			// *functions

			function showAll()
			{
				$str = "Eye Color: " . $this->getEyeColor() . "<br>";
				$str .= "Fur Color: " . $this->getFurColor() . "<br>";
				$str .= "Nose: " . $this->getNose() . "<br>";

				echo $str;
			}
		}




		$doggo = new Dog("brown", "white", 1);

		$doggo->showAll();
		?>





	</article>
	<!--MAIN CONTENT-->

	<?php include "includes/footer.php"; ?>
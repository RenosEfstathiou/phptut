<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>
<section class="content">

    <aside class="col-xs-4">

        <?php Navigation(); ?>


    </aside>
    <!--SIDEBAR-->

    <article class="main-content col-xs-8">


        <?php

        /*  Step 1: Create an input that get some text 

            Step 2: Create a button that submits a text

            Step 3: Create a function that creates a new file with the text submited

            Step 4: Create a button that echos the file's text

    */
        $fname =  "text.txt";
        if (isset($_POST['submit'])) {
            if (trim($_POST['text']) != '') {
                $text = $_POST['text'];

                if ($handle = fopen($fname, 'w')) {
                    fwrite($handle, $text);
                    echo "Your text has been submited!";
                    fclose($handle);
                }
            }
        }


        if (isset($_POST['read'])) {
            if ($handle = fopen($fname, 'r')) {
                $fileView = fread($handle, filesize($fname));
                echo $fileView;
                fclose($handle);
            }
        }

        ?>

        <form action="11.php" method="post">
            <div class="form-group">
                <label for="text">Insert some text</label>
                <input type="text" name="text" id="text" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button name=" read" class="btn btn-warning">Read</button>

        </form>




    </article>
    <!--MAIN CONTENT-->

    <?php include "includes/footer.php"; ?>
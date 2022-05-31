<?php
$df = 'none';




    // session_unset();

    session_start();
    /*session is started if you don't write this line can't use $_Session  global variable*/
    // $_SESSION["name"] = $value;
    // $_SESSION["name"] = $value;
    // $_SESSION["name"] = $value;
    // echo "ok";

    // echo "Notok";

// document.getElementById("<?php echo $aDoor[$i]; 
?>






<form method="post">
    <h2>Contact Us

    </h2><br>


    <?php session_start();
    if (isset($_SESSION["Name"]) && $_SESSION["Name"] == true) : ?>
        <div id="Name">
            <label for="name">Name:</label><br>
            <input id="test" type="text" name="fname" id="name"><br>
        </div>

    <?php endif; ?>

    <?php session_start();
    if (isset($_SESSION["Email"]) && $_SESSION["Email"] == true) : ?>

        <div id="Email">
            <label for="email">Email:</label><br>
            <input type="text" name="email" id="email"><br>

        </div>
    <?php endif; ?>
    <?php session_start();
    if (isset($_SESSION["Object"]) && $_SESSION["Object"] == true) : ?>
        <div id="Object">

            <label for="object">Object:</label><br>
            <input type="text" name="object" id="object"><br>
        </div>
    <?php endif; ?>

    <?php session_start();
    if (isset($_SESSION["Message"]) && $_SESSION["Message"] == true) : ?>
        <div id="Message">
            <label for="message">Message:</label><br>
            <textarea name="message" id="message" cols="30" rows="10"></textarea><br>
        </div>
    <?php endif; ?>


    <button name="save">Save</button>
</form>




<?php



// echo ("You selected $N door(s): ");
// for ($i = 0; $i < $N; $i++) {
//     echo ($aDoor[$i] . " ");

//     if($)
// }


function insertMessages($atts)
{

    // if (isset($_POST['insputs'])) {
    //     $aDoor = $_POST['inputs'];
    //     echo "ok";
    // } else {
    //     echo "Notok";
    // }
    // $N = count($aDoor);
    // echo ("You selected $N door(s): ");
    // for ($i = 0; $i < $N; $i++) {
    //     echo ($aDoor[$i] . " ");
    // }
    // echo $aDoor;

    // if (empty($aDoor)) {
    //     echo ("You didn't select any buildings.");
    // } else {
    //     // header('Location: http://localhost/pluguins');
    //         $N=count($aDoor);
    //     echo ("You selected $N door(s): ");
    //     for ($i = 0; $i < $N; $i++) {
    //         echo ($aDoor[$i] . " ");
    //     }
    // }
    // die("Hello");
    global $wpdb;
    $table_name = $wpdb->prefix . "ash_contact_us";
    if (isset($_POST['save'])) {

        $name = $email = $object = $message = "";
        if (isset($_POST['fname'])) {
            $name =  $_POST['fname'];
        }
        if (isset($_POST['email'])) {
            $email =  $_POST['email'];
        }
        if (isset($_POST['object'])) {
            $object =  $_POST['object'];
        }
        if (isset($_POST['message'])) {
            $message =  $_POST['message'];
        }
        $wpdb->insert(
            $table_name,
            array(
                "name" => $name,
                "email" => $email,
                "object" => $object,
                "message" => $message
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s'
            )
        );
    }
}

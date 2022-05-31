<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }
</style>
<?php

session_start();
// session_unset();

if (isset($_POST['save'])) {
        session_unset();

    if (isset($_POST['inputs'])) {

        $aDoor = $_POST['inputs'];
        $N = count($aDoor);
        for ($i = 0; $i < $N; $i++) {

            $_SESSION[$aDoor[$i]] = true;
        }
    }


    // echo "ok";
    // session_unset();

    // $_SESSION['Name'] = true;
   

    // session_unset($_SESSION['Name']);
    // $_SESSION["Name"]="test";

    
}
// else {
//     session_unset();

// }


?>
<?php
global $wpdb;
$table_name = $wpdb->prefix . 'ash_contact_us';
$db_results = $wpdb->get_results("SELECT * from $table_name");
global $wp;
$urlc = add_query_arg($wp->query_vars, home_url());;
if (isset($_GET['delid'])) {
    $wpdb->delete($table_name, array('id' => $_GET['delid']));
    $urlp = admin_url('admin.php?page=Contact+Us+Plugin');
    wp_redirect($urlp);
}
// $aDoor =( $_POST['inputs']);
// echo $aDoor;
// 
// if (empty($aDoor)) {
//     echo ("You didn't select any buildings.");
// } else {
//     $N = count($aDoor);

//     echo ("You selected $N door(s): ");
//     for ($i = 0; $i < $N; $i++) {
//         echo ($aDoor[$i] . " ");
//     }
// }
?>

<h2>choose ?</h2>
<form method="POST">
    <input type="checkbox" name="inputs[]" value="Name" <?php session_start();
                                                        if (isset($_SESSION["Name"]) && $_SESSION["Name"] == true) {
                                                            echo "checked";
                                                        }; ?>> Name <br><br>
    <input type="checkbox" name="inputs[]" value="Email" <?php session_start();
                                                            if (isset($_SESSION["Email"]) && $_SESSION["Email"] == true) {
                                                                echo "checked";
                                                            }; ?>> Email <br> <br>
    <input type="checkbox" name="inputs[]" value="Object" <?php session_start();
                                                            if (isset($_SESSION["Object"]) && $_SESSION["Object"] == true) {
                                                                echo "checked";
                                                            }; ?>> Object <br><br>
    <input type="checkbox" name="inputs[]" value="Message" <?php session_start();
                                                            if (isset($_SESSION["Message"]) && $_SESSION["Message"] == true) {
                                                                echo "checked";
                                                            }; ?>> Message <br><br>
    <button name="save" type="submit"> save</button>
</form>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Object</th>
            <th>Message</th>
            <th>mp</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($db_results as $row) : ?>
            <tr>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->email ?></td>
                <td><?php echo $row->object ?></td>
                <td><?php echo $row->message ?></td>
                <td><a href="<?php echo $urlc . '&delid=' . $row->id ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php

global $wpdb;
if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $tablename = $wpdb->prefix."plugin";

  $data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE email='".$email."' ");
  if(count($data) == 0){
    $insert = "INSERT INTO ".$tablename."(email,subject,message) values('".$email."','".$subject."','".$message."') ";
    $wpdb->query($insert);
    echo "Sent sucessfully.";
  }

}

?>
<h1>Form Examples</h1>
<form method='post' action=''>

    <input type='email' id="email" name='email' placeholder="Email .."> <br><br>
    <input type='text' id="subject" name='subject' placeholder="Subject .."><br><br>
    <input type='text' id="mssg" name='message' placeholder="Message .."><br><br>
    <span>&nbsp;</span>
    <input type='submit' name='submit' value='Send'>

</form>


<script >
  // first name
  var email = document.getElementById('email');
  // var input_fname = document.getElementById('input_fname');
  const email_display = localStorage['email'];
  email.style.display = email_display;
  // input_fname.removeAttribute('required');
  var subject = document.getElementById('subject');
  // var input_fname = document.getElementById('input_fname');
  const sub_display = localStorage['subject'];
  subject.style.display = sub_display;
  var mssg = document.getElementById('mssg');
  // var input_fname = document.getElementById('input_fname');
  const mssg_display = localStorage['message'];
  mssg.style.display = mssg_display;
</script>
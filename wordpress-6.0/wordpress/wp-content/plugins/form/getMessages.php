<?php

global $wpdb;
$tablename = $wpdb->prefix."plugin";
?>
<h1>All Messsages</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
  <tr>
   <th>Id</th>
   <th>email</th>
   <th>Subject</th>
   <th>Message</th>
  </tr>
  <?php

  $messagesLists = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($messagesLists) > 0){
    $count = 1;
    foreach($messagesLists as $message){
      $id = $message->id;
      $email = $message->email;
      $subject = $message->subject;
      $message = $message->message;

      echo "<tr>
      <td>".$count."</td>
      <td>".$email."</td>
      <td>".$subject."</td>
      <td>".$message."</td>
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='5'>No Messages</td></tr>";
 }
?>
</table>
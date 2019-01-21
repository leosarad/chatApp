<?php
require('connectDB.php');
if(isset($_POST['connectId']) and isset($_POST['userId']) and isset($_POST['msg'])){
    $connectId=$_POST['connectId'];
    $userId=$_POST['userId'];
    $msg=$_POST['msg'];
    $query = "INSERT INTO messages(msg_body,sender_id,receiver_id) VALUES('$msg',$userId,$connectId)";
    if($sql=mysqli_query($connect,$query)){
        $res['msg']="Msg Sent";
    } else{
            $res['msg']="Failed to send message";
        }
} else{
    $res['msg']="Form Error";
}
echo json_encode($res);

?>
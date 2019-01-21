<?php
require('connectDB.php');
if(isset($_GET['connectId']) and isset($_GET['userId'])){
    $connectId=$_GET['connectId'];
    $userId=$_GET['userId'];
    $obj=[];
    $query = "SELECT * FROM `messages` WHERE (sender_id=$userId AND receiver_id=$connectId) OR (sender_id=$connectId AND receiver_id=$userId)";
    if($sql=mysqli_query($connect,$query)){
        $num=mysqli_num_rows($sql);
        if(mysqli_num_rows($sql)>0){
            $rows=mysqli_fetch_all($sql);
            foreach($rows as $row){
                $obj[]=$row;
            }
            $res['chat']=$num;
            $res['objArr']=$obj;
        } else{
            $res['chat']=$num;
            $res['msg']="No message exchanged";
        }
    } else{
        $res['chat']=$num;
        $res['msg']="DB Error";
    }
} else{
    $res['chat']=$num;
    $res['msg']="ID NOT SET";
}
echo json_encode($res);

?>
<?php  
require("connectDB.php");
session_start();
$res= [];
$res['msg']='Not performed';
$res['status']=false;
if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['passw'])){
    $name=$_POST['name'];
    $passw=$_POST['passw'];
    $email=$_POST['email'];

    $query="INSERT INTO users(name, email, passw) VALUES ('$name','$email','$passw')";

    if($sql=mysqli_query($connect,$query) ){
                        sendmail($email,$name);
                        $res['msg']="Signup Successfull";
                        $res['status']=true;
                        $res['location']='index.php';
        } else{
            $res['msg']="Email Already Exists";
            $res['status']=false;
        }
} else{
    $res['msg']="Some Fields are Empty";
    $res['status']=false;
}
echo json_encode($res);
function sendmail($email,$name){
        $mailid=$email;
        $email="singhsarad57@gmail.com";
        $headers = 'From: ' .$email . "\r\n". 
            'Reply-To: ' .$email. "\r\n" . 
            'X-Mailer: PHP/';
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $message=
            '<html lang="en">
            <body style="background-image: linear-gradient(to right,#13969b,#159a48);
                        text-align: center;
                        font-family: monospace;
                        color: white;min-height:400px;">
                <h3>Chat System</h3>
                Welcome '.$name.',<br>Now, you can chat with your friends. Thank you.
            </body>
            </html>';
   mail($mailid,"",$message,$headers);
}
?>
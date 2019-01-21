<?php  
    require("connectDB.php");
    session_start();
    $res= [];
    $res['msg']='Not performed';
    $res['status']=false;
if(isset($_POST['email']) and isset($_POST['passw'])){
        if(!empty($_POST['email'])){
            $email=$_POST['email'];
            if(!empty($_POST['passw'])){
                $passw=$_POST['passw'];
                 
                $query="SELECT * FROM users WHERE email='$email'";
                
                if($sql=mysqli_query($connect,$query)){
                    if(mysqli_num_rows($sql)>0){
                        $row=mysqli_fetch_row($sql);
                        $db_passw=$row[3];
                        if($passw==$db_passw){
                            $res['msg']="$email--$passw--$row[0]--$row[1]";
                            $res['status']=true;
                            $_SESSION['loggedid']=$row[0];
                            $res['location']='dashboard.php'; 
                        } else{
                            $res['msg']="Passsword Wrong";
                            $res['status']=false;
                        }
                        
                    } else{
                        $res['msg']="Email Wrong";
                        $res['status']=false;
                    }
                } else{
                    $res['msg']="DataBase Connection Error";
                    $res['status']=false;
                }
               
                
            } else{
                $res['msg']="Password Field Empty";
                $res['status']=false;
            }
        } else{
            $res['msg']="Email Field Empty";
            $res['status']=false;
        }
    } else{
        $res['msg']="Form Not Submitted";
        $res['status']=false;
    }
    echo json_encode($res);
?>
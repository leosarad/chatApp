<?php  
require("validate/connectDB.php");
require("validate/secure.php");

$query="SELECT * FROM users WHERE id='".$_SESSION['loggedid']."'";

if($sql=mysqli_query($connect,$query)){
    if(mysqli_num_rows($sql)>0){
        $row=mysqli_fetch_row($sql);
        $userId=$row[0];
        $userName=$row[1];
        $userEmail=$row[2];
    } else{
        session_destroy;
        header('location:index.php');
    }
} else{
    session_destroy;
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="description" content="The HTML5 Herald">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

       
        <!--    GOOGLE FONTS     -->
        <link href="https://fonts.googleapis.com/css?family=Cuprum|Merienda:700|Monoton" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merienda:700|Monoton" rel="stylesheet">
        <!--  ICON LINKs  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/font/flaticon.css">
        <link rel="stylesheet" href="css/dashboard.css">

        <title>Bond:Chat</title>
    </head>
    <body>
       
        <div class="resize-msg">Please increase your Browser size and enjoy Bond Chat.</div>
        <!--     Wrapper Start       -->
        <div class="wrapper">
            <!-- Main-Left Start -->
            <div class="main-left">
                <!-- Brand Div Start -->
                <div class="brand">
                    <img src="icons/inbox.png" alt="Brand">
                    <span class="brand-name">BOND</span>
                </div>
                <!-- Brand Div Close -->
                <!-- Configs div Start  -->
                <div class="configs">
                    <div class='config-icons'>
                        <i class="active material-icons">
                            chat
                        </i>
                    </div>
                    <div class='config-icons'>
                        <i class="material-icons">
                            supervisor_account
                        </i>
                    </div>
                    <div class="config-icons">
                        <i class="material-icons">
                            notifications
                        </i>
                    </div>
                    <div class="config-icons">
                        <i class="material-icons">
                            settings
                        </i>
                    </div>
                </div>
                <!-- Configs div Close -->
                <!-- USer div Start -->
                <div class="user">
                    <div class="silent">
                        <div class="toggle">
                            <div></div>
                        </div>
                    </div>
                    <div class="profile">
                        <a href="validate/logout.php">
                            <img src="icons/05-character-listening-to-music-on-phone-illustration.jpg" alt="Profile Pic" ><br>
                            <span>
                                <?= $userName ?>
                            </span>
                        </a>    
                    </div>
                </div>
                <!-- USer div Close -->
            </div>
            <!-- Main-Left Close  -->
            <!-- Main-Right Start-->
            <div class="main-right">
                <div class="chat-wrapper">
                    <div class="recents">
                        <div class="recent-connects">
                            <div class="heading">
                                <span class="material-icons">
                                    update
                                </span>
                                <span>Recents</span>
                            </div>
                            <div class="recent-list">
                                <?php 
                                    $query="SELECT * FROM users where id!=$userId";
                                    if($sql=mysqli_query($connect,$query)){
                                        if(mysqli_num_rows($sql)>0){
                                            $rows=mysqli_fetch_all($sql);
                                            foreach ($rows as $row) {
//                                              echo <button class='chatbtn' onclick=\"return chat('$row[0]','$row[1]')\">Chat</button>                         
                                                echo "<a onclick=\"return(chat_new('$row[0]','$row[1]'))\" ><div class='list-item'>
                                                    <span class='img'>
                                                    <img src='icons/05-character-listening-to-music-on-phone-illustration.jpg' alt=''>
                                                    </span>
                                                    <span class='name'>$row[0] $row[1] </span>
                                                    </div></a>";
                                        }
                                        } else{
                                            echo "No Rows with such ID";
                                        }
                                    } else{
                                        echo "Database Connection Error";
                                    }
                                ?>
                                <!-- SAMPLE
                                <div class="list-item">
                                    <span class="img">
                                        <img src="icons/05-character-listening-to-music-on-phone-illustration.jpg" alt="">
                                    </span>
                                    <span class="name">
                                        Leosarad
                                    </span>                                
                                </div>
                                -->
                              
                            </div>
                        </div>

                        <div class="extend">
                            <span>Shrink</span><i class="material-icons">arrow_right</i>
                        </div>
                    </div>
                    <div class='chat-box'>
                       
                        <div class="connect-user">
                            <div class="user-info">
                                <span class="img">
                                    <img src="icons/05-character-listening-to-music-on-phone-illustration.jpg" alt="">
                                </span>
                                <span class="name">
                                    Adele
                                </span>
                            </div>
                            <div class="activity">
                                <i class="material-icons">
                                    call
                                </i>
                                <i class="material-icons">
                                    videocam
                                </i>
                                <i class="material-icons">
                                    more_horiz
                                </i>
                            </div>
                        </div>
                        
                        <div class="msg-wrapper">
                            <!--
                           
                            <div class='msg-layout sent'>
                                <div class="msg-body">
                                    Hello, How are you? my friend :)
                                </div>
                                <div class="meta-info">
                                    <div class="date">2018-10-19 5:30 A.M</div>
                                </div>
                            </div>
                            <div class='msg-layout receive'>
                                <div class="msg-body">
                                    Hello, How are you? my friend :)
                                </div>
                                <div class="meta-info">
                                    <div class="date">2018-10-19 5:30 A.M</div>
                                </div>
                            </div>
                            
                            -->
                        </div>
                        
                        <div class="msg-send">
                            <textarea class='inputMsg' placeholder='Message :)'></textarea>
                            <button class="a emoji">
                                <i class="material-icons">
                                    tag_faces
                                </i>
                            </button>
                            <button class='a' onclick="sendmsg()">
                                <i class="material-icons">
                                    send
                                </i>
                            </button>
                        </div>
                        <div class="default">
                            <h3>Select on of your bond to chat with.</h3>
                        </div>
                    </div>
                </div>
                <div class="connects">
                    <div class="connects-wrap">
                        <div class="heading">
                            <span>Bonds</span>
                        </div>
                        <div class="connects-list">
                            <?php 
                            $query="SELECT * FROM users where id!=$userId";
                            if($sql=mysqli_query($connect,$query)){
                                if(mysqli_num_rows($sql)>0){
                                    $rows=mysqli_fetch_all($sql);
                                    foreach ($rows as $row) {
                                        //<button class='chatbtn' onclick=\"return chat('$row[0]','$row[1]')\">Chat</button>                         
                                        
                                        echo " <div class='list-item'>
                                                    <div class='img'>
                                                        <img src='icons/05-character-listening-to-music-on-phone-illustration.jpg' alt=''>
                                                    </div>
                                                    <div class='name'>
                                                        <span>Name:$row[1]</span><br>
                                                        <span>Email:$row[2]</span><br>
                                                        <span>DOB:OCT 19</span><br>
                                                    </div>
                                                   <div class='activity'>
                                                       <i class='material-icons'>
                                                           call
                                                       </i>
                                                       <i class='material-icons'>
                                                           videocam
                                                       </i>
                                                       <i class='material-icons'>
                                                           delete
                                                       </i>
                                                   </div>
                                                </div>";
                                    }
                                } else{
                                    echo "No Rows with such ID";
                                }
                            } else{
                                echo "Database Connection Error";
                            }
                            ?>
                          
                            <div class="list-item">
                                <div class="img">
                                    <img src="icons/05-character-listening-to-music-on-phone-illustration.jpg" alt="">
                                </div>
                                <div class="name">
                                    <span>Name:Leosarad</span><br>
                                    <span>Email:leosarad100@gmail.com</span><br>
                                    <span>DOB:OCT 19</span><br>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="img">
                                    <img src="icons/05-character-listening-to-music-on-phone-illustration.jpg" alt="">
                                </div>
                                <div class="name">
                                    <span>Name:Leosarad</span><br>
                                    <span>Email:leosarad100@gmail.com</span><br>
                                    <span>DOB:OCT 19</span><br>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="img">
                                    <img src="icons/05-character-listening-to-music-on-phone-illustration.jpg" alt="">
                                </div>
                                <div class="name">
                                    <span>Name:Leosarad</span><br>
                                    <span>Email:leosarad100@gmail.com</span><br>
                                    <span>DOB:OCT 19</span><br>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="img">
                                    <img src="icons/05-character-listening-to-music-on-phone-illustration.jpg" alt="">
                                </div>
                                <div class="name">
                                    <span>Name:Leosarad</span><br>
                                    <span>Email:leosarad100@gmail.com</span><br>
                                    <span>DOB:OCT 19</span><br>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
            <!-- Main-Right Close-->
        </div>
        <!--        Wrapper Close     -->
    </body>
    <!--     JQUERY      -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--   <script src='js/jquery-3.2.1.min.js'></script>     -->
    <script>
        var user_id=<?= $userId ?>;
            $('.connect-user').hide();
            $('.msg-wrapper').hide();
            $('.msg-send').hide();
            $('.default').show();
        function chat_new(id,name){
            num=0;
            chat(id,name);
            $('.default').hide();
            $('.connect-user').show();
            $('.msg-wrapper').show();
            $('.msg-send').show();
        }
        function chat(id,name){
            connect_id=id;      
            connect_name=name;
            $(function() {
                $.ajax({
                    url: 'validate/msgload.php',
                    type: "GET",
                    data: {connectId:connect_id,userId:user_id},
                }).done(function(res) {
                    result=JSON.parse(res);
                    //$('.chat-wrapper .nochat').hide();
                    //$('.chat-wrapper .chat-box').show();
                    //console.log(result);
                    loadmsg(result);
                }).fail(function() {
                    console.log('failed to send chat id'); 
                });
            });
        };
        function loadmsg(result){
            $('.connect-user .name').text(connect_name);
            msgs='';
                 if(result['chat']>num){
                     for(i in result['objArr']){
                         if(result['objArr'][i][2]==user_id){
                             msgs +="<div class='msg-layout sent'><div class='msg-body'><pre>"+result['objArr'][i][1]+"</pre></div><div class='meta-info'><div class='date'>2018-10-19 5:30 A.M</div></div></div>"
                         } else{
                             msgs +="<div class='msg-layout receive'><div class='msg-body'>"+result['objArr'][i][1]+"</div><div class='meta-info'><div class='date'>2018-10-19 5:30 A.M</div></div></div>"
                         }
                    }
                     scroll_btm();
                     num=result['chat']; 
                } else if(result['chat']==0){
                    msgs="<div class='nochat'>No message exchanged<br>Say Hi :)</div>"
                } else{
                    for(i in result['objArr']){
                        if(result['objArr'][i][2]==user_id){
                            msgs +="<div class='msg-layout sent'><div class='msg-body'><pre>"+result['objArr'][i][1]+"</pre></div><div class='meta-info'><div class='date'>2018-10-19 5:30 A.M</div></div></div>"
                        } else{
                            msgs +="<div class='msg-layout receive'><div class='msg-body'>"+result['objArr'][i][1]+"</div><div class='meta-info'><div class='date'>2018-10-19 5:30 A.M</div></div></div>"
                        }
                    }
                 }
                $('.chat-box .msg-wrapper').html(msgs);
                refresh=setInterval(chat(connect_id,connect_name),5000)
               };
    </script>
    <script>
        function sendmsg(){
            $(function() {
                msg_body=$('.inputMsg').val();
                console.log('connectId:'+connect_id+',user:'+user_id+',msg:'+msg_body)
                $.ajax({
                    url: 'validate/msgsend.php',
                    type: "POST",
                    data: {connectId:connect_id,userId:user_id,msg:msg_body},
                }).done(function(res) {
                    res=JSON.parse(res);
                    console.log(res); 
                    chat(connect_id,connect_name);
                }).fail(function() {
                    console.log('failed to connect sendmsg  file'); 
                });
            });
        };
    </script>
    <script src="js/dashboard-UX.js"></script>
</html>



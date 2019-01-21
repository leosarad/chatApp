<?php 
session_start();
if(isset($_SESSION['loggedid'])){
    header('location: dashboard.php');    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="description" content="The HTML5 Herald">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/index.css">
    <!--    GOOGLE FONTS     -->
    <link href="https://fonts.googleapis.com/css?family=Cuprum|Merienda:700|Monoton" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda:700|Monoton" rel="stylesheet">
    <!--  ICON LINKs  -->
    <link rel="stylesheet" type="text/css" href="css/font/flaticon.css">
    
    <title>Bond:Chat</title>
</head>
<body>
   
    <div class="bg-icons">
       <i class="flaticon-001-ufo-1"></i>
       <i class="flaticon-002-solar-system-3"></i>
       <i class="flaticon-007-pluto"></i>
       <i class="flaticon-008-earth-2"></i>
       <i class="laticon-010-solar-system-2"></i>
       <i class="flaticon-017-rocket-1"></i>
       <i class="flaticon-021-saturn"></i>
       <i class="flaticon-050-planet"></i>
       <i class="flaticon-019-jupiter"></i>
       <i class="flaticon-012-meteorite-1"></i>
       <i class="flaticon-009-space-ship"></i>
       <i class="flaticon-013-mercury"></i>
       <i class="flaticon-015-venus"></i>
       <i class="flaticon-023-ufo"></i>
       <i class="flaticon-036-solar"></i>
       <i class="flaticon-041-sputnik"></i>
       <i class="flaticon-045-satellite"></i>
       <i class="flaticon-034-day-and-night"></i>
       <i class="flaticon-001-ufo-1"></i>
       <i class="flaticon-002-solar-system-3"></i>
       <i class="flaticon-007-pluto"></i>
       <i class="flaticon-008-earth-2"></i>
       <i class="laticon-010-solar-system-2"></i>
       <i class="flaticon-017-rocket-1"></i>
       <i class="flaticon-021-saturn"></i>
       <i class="flaticon-050-planet"></i>
       <i class="flaticon-019-jupiter"></i>
       <i class="flaticon-012-meteorite-1"></i>
       <i class="flaticon-009-space-ship"></i>
       <i class="flaticon-013-mercury"></i>
       <i class="flaticon-015-venus"></i>
   </div>
   
   <div class="container">
       <div class="container-icon"></div>
       <h2>Login</h2>
       <div class="errorMsg"></div>
       <form id='loginForm' action='dashboard.php' method='post'>
            <input type='text' placeholder='email' name='email' id='email' />
            <input type='password' placeholder='password' name='passw' id='passw' />
            <input type='submit' name='submit' value='Login'/>
        </form>
        <p class="alternate">Don't have an account: <a href='signup.php'>SIGN UP</a></p>
    </div>
</body>
    <!--     JQUERY      -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--   <script src='js/jquery-3.2.1.min.js'></script>     -->  
    <script src='js/indexUX.js' ></script>
    <script>

        $('.errorMsg').hide();
        $(function() {
            $('#loginForm').submit(function(e){

                e.preventDefault(); 
                $('.errorMsg').fadeOut();
                var data = $('#loginForm').serialize(); $.ajax({
                    url: 'validate/login.php',
                    type: "POST",
                    data: data,
                }).done(function(res) {
                    res = JSON.parse(res);
                    if (res['status']) 
                    {
                        location.href = res['location'];
                    } else {
                        var errMsg = res.msg;
                        console.log(errMsg); $('.errorMsg').text(errMsg);
                    }
                    $('.errorMsg').fadeIn();
                }).fail(function() {
                    var errMsg ="No Response From Database";
                    console.log(errMsg); $('.errorMsg').html(errMsg);
                    $('.errorMsg').fadeIn();
                });
            });
        });   
    </script>
</html>
<?php

$email = hex2bin($_GET['email']);
$type = $_GET['type'];
$purpose = $_GET['purpose'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <style>
        input[type=text]{
            font-weight: bold;
            text-align: center;
            font-size:large;
            padding:10px;
            text-transform: uppercase;
        }

        body{
            font-family:arial;
        }
        p{
            font-family:arial;
        }
        button{
            margin-top:1%;
            font-size: large;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            background-color: blue;
            border: 1px solid blue;
            padding:10px;
            border-radius:10px;
            cursor:pointer;
            color:white;
          text-transform: uppercase;
            
        }
        #msg{
            margin-top:1%;
            color:red;
            font-weight:bold;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div style="margin-top:10%;">
    <center>
        <p>ENTER 6-DIGIT OTP</p>
        <input type="text" id="otp_code" maxlength="6"/>
        <br>
        <button id="verify" onclick="verify_otp()">Verify</button>
        <br><br>
        <a href="javascript:void();" onclick="resend()">RESEND OTP</a>
    </center>
    </div>
    <center>
        <div id="msg"></div>
    </center>
</body>

<script src="jquery.js"></script>
<script>
    const verify_otp =()=>{
        var code = $('#otp_code').val();
        if(code == '' || code == undefined){
            $('#msg').html('PLEASE ENTER OTP');
        }else{
            $.ajax({
                url: 'process.php',
                type:'POST',
                cache: false,
                data:{
                    method: 'verify_otp',
                    email: '<?=$email;?>',
                    purpose:'<?=$purpose;?>',
                    code:code
                },success:function(x){
                    // console.log(x);
                    if(x == 'success'){
                        delete_otp();
                    
                    }else{
                        $('#msg').html('WRONG OTP');
                    }
                }
            });
        }
    }

    function delete_otp(){
        $.ajax({
            url: 'process.php',
            type: 'POST',
            cache: false,
            data:{
                method: 'del_assoc_otp',
                email: '<?=$email;?>',
                purpose:'<?=$purpose;?>'
            },success:function(res){
                console.log(res);
                if(res == 'del'){
                    redirect();
                }
            }
        });
    }

    function redirect(){
        var acctype = '<?=$type;?>';
        if(acctype == 'student'){
            window.location.replace('../student/account.php');
        }else if(acctype == 'superior'){
            window.location.replace('../superior/account.php');
        }else if(acctype == 'admin'){
            window.location.replace('../admin/index.php');
        }else if(acctype == 'peer'){
            window.location.replace('../peer/index.php');
        }else{
            
        }
    }

    function resend(){
        $.ajax({
            url: 'process.php',
            type: 'POST',
            cache: false,
            data:{
                method:'resend_otp',
                email_add: '<?=$email;?>',
                purpose: '<?=$purpose;?>',
            },success:function(x){
                console.log(x);
                var data = x.split('==');
                if(data[0] == 'success'){
                    resend_email(data[1]);
                    $('#msg').html('OTP RESENT, PLEASE CHECK YOUR EMAIL/SPAM');
                }else{
                    // DO NOTHING
                }
            }
        })
    }

    function resend_email(otp){
        var email = '<?=$email;?>';
        $.ajax({
           url: 'mailer/resend_otp.php',
           type: 'POST',
           cache: false,
           data:{
               email:email,
               otp:otp
           },success:function(x){
               console.log(x);
           }
        });
    }
</script>
</html>
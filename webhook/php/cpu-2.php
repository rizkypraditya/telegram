<?php
/**
 * Contoh code CPU Bot.
 *
 * @author Rizky Praditya <rizky.praditya@telkom.co.id>
 */

//Memasukan Code default Sensor
include '../default/Sensor.php';

// Atur TOKEN bot disini
$bot_token = 'MASUKAN TOKEN BOT DISINI';

// Aktifkan Sensor Bot
$sensor = new Sensor($bot_token);

// Baca hasil pendengaran sensor dari setiap chat masuk
$text = $sensor->Text(); // isi pesan
$chat_id = $sensor->ChatID(); // id pengirim
$first_name = $sensor->FirstName(); // nama depan pengirim
$last_name = $sensor->LastName(); // nama belakang pengirim
$username = $sensor->Username(); // username pengirim
$message_id = $sensor->MessageID(); // chat id pesan

// Cek apakah ada chat masuk yang sesuai daftar sensor chat kita
if (!is_null($text) && !is_null($chat_id)) {
    // Sensor #0 ketika ada chat berupa /start
    if ($text == '/start') {
        $reply = 'Selamat Datang di Bot AditDev';
        // Kirim balasan konten
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $sensor->sendMessage($content);
    } 
    // Sensor #1 ketika ada chat berupa /semangat
    elseif ($text == '/semangat') {
        $reply = 'Semangat Pagi Indonesia !';
        // Kirim balasan konten
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $sensor->sendMessage($content);
    } 
    // Sensor #2 ketika ada chat berupa /siapa
    elseif ($text == '/siapa') {
        $reply = 'Nama Kamu adalah '.$first_name;
        // Kirim balasan konten
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $sensor->sendMessage($content);
    } 
    // Sensor #3 ketika ada chat berupa /berapa
    elseif ($text == '/berapa') {
        $reply = 'Nomor telegram Kamu adalah '.$chat_id;
        // Kirim balasan konten
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $sensor->sendMessage($content);
    } 
    // Sensor #4 ketika ada chat berupa /lengkap
    elseif ($text == '/lengkap') {
        $reply = 'Nama lengkap Kamu adalah '.$first_name.' '.$last_name;
        // Kirim balasan konten
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $sensor->sendMessage($content);
    } 
    // Sensor #BONUS ketika ada chat berupa /enter
    elseif ($text == '/enter') {
        $reply = 'Hai, '.$first_name."\n\n\napa kabar?";
        // Kirim balasan konten
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $sensor->sendMessage($content);
    } 
    // Sensor terakhir ketika ada chat yang belum terdaftar
    else {
        $reply = 'Mohon maaf pesan anda tidak kami kenali';
        // Kirim balasan konten apabila chat private
        if (!$sensor->messageFromGroup()) {
            $content = ['chat_id' => $chat_id, 'text' => $reply];
            $sensor->sendMessage($content);
        }
    } 
}

<?php
/**
 * Contoh code CPU Bot.
 *
 * @author Rizky Praditya <rizky.praditya@telkom.co.id>
 */

//Memasukan Code default Sensor & Memory
include '../default/Sensor.php';
include '../default/Memory.php';

// Atur TOKEN bot disini
$bot_token = 'MASUKAN TOKEN BOT TELEGRAM DISINI';

// Aktifkan Sensor Bot
$sensor = new Sensor($bot_token);

// Baca hasil pendengaran sensor dari setiap chat masuk
$text = $sensor->Text(); // isi pesan
$chat_id = $sensor->ChatID(); // id pengirim
$first_name = $sensor->FirstName(); // nama depan pengirim

// Cek apakah ada chat masuk yang sesuai daftar sensor chat kita
if (!is_null($text) && !is_null($chat_id)) {
    // Sensor #1 ketika ada chat berupa /start
    if ($text == '/start') {
        $reply = 'Selamat Datang di Bot AditDev';
        // Kirim balasan konten
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $sensor->sendMessage($content);
    } 
    // Sensor #2 ketika ada chat berupa /hai
    elseif ($text == 'hai') {
        $reply = 'Halo '.$first_name;
        // Kirim balasan konten
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $sensor->sendMessage($content);
    } 
}

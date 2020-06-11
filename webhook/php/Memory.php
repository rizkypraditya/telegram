<?php

if (file_exists('../default/DBController.php')) {
    require_once '../default/DBController.php';
}

/**
 * Sensor Bot Class. 
 *
 * @author Rizky Praditya <rizky.praditya@telkom.co.id>
 */
Class Memory {
    private $memory = array();

    //=================================================================================
    // Component Memory di Tabel nama_siswa *harap ganti NAMA sesuai nama masing-masing*
    public function createSiswa($nama_siswa){
        $query = 'INSERT INTO `NAMA_siswa`(`id`, `nama`, `waktu`) VALUES (null,"'.$nama_siswa.'",now())';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeQuery($query);
        return $this->memory;
    }

    public function readSiswa(){
        $query = 'SELECT `id`, `nama`, `waktu` FROM `NAMA_siswa` WHERE 1';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeSelectQuery($query);
        return $this->memory;
    }

    public function updateSiswa($nama_lama, $nama_baru){
        $query = 'UPDATE `NAMA_siswa` SET `nama`="'.$nama_baru.'",`waktu`=now() WHERE `nama`="'.$nama_lama.'"';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeQuery($query);
        return $this->memory;
    }

    public function deleteSiswa($nama_siswa){
        $query = 'DELETE FROM `NAMA_siswa` WHERE `nama` = "'.$nama_siswa.'"';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeQuery($query);
        return $this->memory;
    }

    //==================================================================================

    public function create($barang, $user_id, $user_name){
        $query = 'INSERT INTO `adit_crud`(`id`, `barang`, `user_id`, `user_nama`, `waktu`) VALUES (null,"'.$barang.'","'.$user_id.'","'.$user_name.'",now())';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeQuery($query);
        return $this->memory;
    }

    public function read(){
        $query = 'SELECT `id`, `barang`, `user_id`, `user_nama`, `waktu` FROM `adit_crud` WHERE 1';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeSelectQuery($query);
        return $this->memory;
    }

    public function update($oldbarang, $newbarang, $newuser_id, $newuser_name){
        $query = 'UPDATE `adit_crud` SET `barang`="'.$newbarang.'",`user_id`="'.$newuser_id.'",`user_nama`="'.$newuser_name.'",`waktu`=now() WHERE `barang`="'.$oldbarang.'"';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeQuery($query);
        return $this->memory;
    }

    public function delete($barang){
        $query = 'DELETE FROM `adit_crud` WHERE `barang` = "'.$barang.'"';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeQuery($query);
        return $this->memory;
    }

    public function hadir($user_id, $user_nama, $lat, $lon){
        $query = 'INSERT INTO `adit_kehadiran`(`user_id`, `user_nama`, `latitude`, `longitude`, `waktu`) VALUES ("'.$user_id.'","'.$user_nama.'","'.$lat.'","'.$lon.'",now()) ON DUPLICATE KEY UPDATE latitude="'.$lat.'", longitude="'.$lon.'", waktu=now()';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeQuery($query);
        return $this->memory;
    }

    public function daftarHadir(){
        $query = 'SELECT `user_id`, `user_nama`, `latitude`, `longitude`, `waktu` FROM `adit_kehadiran` WHERE 1';
        $dbcontroller = new DBController();
        $this->memory = $dbcontroller->executeSelectQuery($query);
        return $this->memory;
    }

    public function timeago($date) {
           $timestamp = strtotime($date); 
           
           $strTime = array("second", "minute", "hour", "day", "month", "year");
           $length = array("60","60","24","30","12","10");

           $currentTime = time();
           if($currentTime >= $timestamp) {
            $diff     = time()- $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "(s) ago ";
           }
        }
}
?>

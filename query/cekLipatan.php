<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$currentLipatan = $_POST['currentLipatan'];
$dbLipatan = $_POST['dbLipatan'];
$id_peminjam = $_POST['id_peminjam'];

if ($currentLipatan == $dbLipatan) {
    echo "Y";
} else {
    $newScore = $db_handle->executeUpdate("UPDATE tb_user SET point = point - 1 WHERE id = '$id_peminjam' ");
    if ($newScore) {
        echo "updated";
    }
}
?>
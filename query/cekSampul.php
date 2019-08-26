<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$currentSampul = $_POST['currentSampul'];
$dbSampul = $_POST['dbSampul'];
$id_peminjam = $_POST['id_peminjam'];

if ($currentSampul == $dbSampul) {
    echo "Y";
} else {
    $newScore = $db_handle->executeUpdate("UPDATE tb_user SET point = point - 1 WHERE id = '$id_peminjam' ");
    if ($newScore) {
        echo "updated";
    }
}
?>
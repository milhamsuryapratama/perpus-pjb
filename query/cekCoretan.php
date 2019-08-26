<?php  
require_once("../controller/dbcontroller.php");
$db_handle = new DBController();

$currentCoretan = $_POST['currentCoretan'];
$dbCoretan = $_POST['dbCoretan'];
$id_peminjam = $_POST['id_peminjam'];

if ($currentCoretan == $dbCoretan) {
    echo "Y";
} else {
    $newScore = $db_handle->executeUpdate("UPDATE tb_user SET point = point - 1 WHERE id = '$id_peminjam' ");
    if ($newScore) {
        echo "updated";
    }
}
?>
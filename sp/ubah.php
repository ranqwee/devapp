<?php
    $no_sp = $_POST['no_sp'];
	$tggl_sp = $_POST['tggl_sp'];
    $kpd_sp = $_POST['kpd_sp'];
	$ktrgn_sp = $_POST['ktrgn_sp'];
	$pnrm_sp = $_POST['pnrm_sp'];
	$pgrm_sp = $_POST['pgrm_sp'];

$sql = mysql_query ("UPDATE srt_pgntr SET no_sp='$no_sp', tggl_sp='$tggl_sp', kpd_sp='$ktrgn_sp', pnrm_sp='$pnrm_sp', pgrm_sp='$pgrm_sp' WHERE no_sp='$no_sp'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datasp';</script>";
}
?>
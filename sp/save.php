<?php
	
	$no_sp = $_POST ['no_sp'];
	$ndp = $_POST ['ndp'];
	$tggl_sp = $_POST ['tggl_sp'];
	$ket = $_POST ['ket'];
	$kpd_sp = $_POST['kpd_sp'];
	
    $sql = mysql_query("INSERT INTO srt_pgntr (no_sp, tggl_sp, ket, kpd_sp) 
VALUES ('$no_sp', '$tggl_sp', '$ket', '$kpd_sp')");
    if($sql){
    echo '<script language="javascript">alert("Data telah tersimpan"); 
	window.location.href="index.php?halaman=datasp"</script>';
}
?>
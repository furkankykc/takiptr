<?php 

   require_once "config.php";

   

    $deger1= addslashes($_POST["deger1"]); //ok

    $deger2= addslashes($_POST["deger2"]); //ok

    $deger3= addslashes($_POST["deger3"]); //ok

	$deger4= addslashes($_POST["deger4"]); //ok

    $deger5= addslashes($_POST["deger5"]); //ok

    $deger6= addslashes($_POST["deger6"]); //ok

    $deger7= addslashes($_POST["deger7"]); //ok

	$deger8= addslashes($_POST["deger8"]); //ok

    $deger9= addslashes($_POST["deger9"]); //ok

    $deger10= addslashes($_POST["deger10"]); //ok

    $deger11= addslashes($_POST["deger11"]); //ok

	

    if($query = $db->prepare("INSERT INTO kiralar SET 

   ekleyen_id = ?,

   kira_cesidi = ?,

   kira_daire = ? ,

   kira_ucret = ?,

   kira_tarih = ?,

   kira_durum = ?,

   kira_eklenme_tarih = ?,

   odeme_varmi = ?,

   apt_id = ?,

   odemealinantarih = ?,

   kira_kul_id=?"))  

   {



	 $result = $query->execute(array($deger1,$deger2,$deger3,$deger4,$deger5,$deger6,$deger7,$deger8,$deger9,$deger10,$deger11));      

		      

if($result){

		      

		      echo '<font  color="red" style="cursor:pointer;color: lime">Ödendi</font>';

				}			  									                    

}else{

         echo '<p>Sorguda bir hata meydana geldi.<p>';

        $error = $db->errorInfo();

         echo 'Hata mesajı: ' . $error[2];

}



				

?>
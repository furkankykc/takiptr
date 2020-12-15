<?php 

   require_once "config.php";

   

    $deger1= addslashes($_POST["deger1"]); //ok

    $deger2= addslashes($_POST["deger2"]); //ok

    $deger3= addslashes($_POST["deger3"]); //ok

	

    if($query = $db->prepare("delete from  kiralar WHERE 

   kira_daire = ? and

   odeme_varmi = ? and

   apt_id = ?"

   ))  

   {



	 $result = $query->execute(array($deger1,$deger2,$deger3));      

if($result){echo '<font  color="red" style="cursor:pointer;color: lime">Ödeme başarıyla Kaldırıldı</font>';}			  									                    
}else{

         echo '<p>Sorguda bir hata meydana geldi.<p>';

        $error = $db->errorInfo();

         echo 'Hata mesajı: ' . $error[2];

}



				

?>
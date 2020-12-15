<?php 
include'headeryeniv2.php';
$islem=$crud;
$kullanicicek=$islem->tekil("kullanicilar","kul_id",guvenlik($_SESSION['kul_id'])); //bozabilir
 function timeConvert ( $zaman ){
	$zaman =  strtotime($zaman);
	$zaman_farki = time() - $zaman;
	$saniye = $zaman_farki;
	$dakika = round($zaman_farki/60);
	$saat = round($zaman_farki/3600);
	$gun = round($zaman_farki/86400);
	$hafta = round($zaman_farki/604800);
	$ay = round($zaman_farki/2419200);
	$yil = round($zaman_farki/29030400);
	if( $saniye < 60 ){
		if ($saniye == 0){
			return "<font color='red'>sn</font>";
		} else {
			return $saniye .' sn';
		}
	} else if ( $dakika < 60 ){
		return $dakika .' dk';
	} else if ( $saat < 24 ){
		return $saat.' saat';
	} else if ( $gun < 7 ){
		return $gun .' gün';
	} else if ( $hafta < 4 ){
		return $hafta.' hafta';
	} else if ( $ay < 12 ){
		return $ay .' ay';
	} else {
		return $yil.' yıl';
	}
}


$islem21 = new kullanici($db);
if (isset($_POST['kullaniciekle'])) {
  $sonuc=$islem21->kullaniciekle($_POST,$_FILES);
  if ($sonuc['sonuc']) {
    header("location:daireler.php?durum=ok");
    exit;
  } else {
   header("location:daireler.php?durum=no");
   exit;
 }
}

?>

  
  
								
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">


        <div class="overlay"></div>
        <div class="search-overlay"></div>



<?php include'yeni-sidebar.php' ?>

 <?php 
$id = $_GET["id"];
$toplam=$crud->tek("SELECT * FROM apartman WHERE apt_id='$id'");
?>
     <div id="content" class="main-content">
			
		

		



<style>

.fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
}

.fb-image-profile
{
    margin: -90px 10px 0px 50px;
    z-index: 9;
    width: 20%; 
}

@media (max-width:768px)
{
    
.fb-profile-text>h1{
    font-weight: 700;
    font-size:16px;
}

.fb-image-profile
{
    margin: -45px 10px 0px 25px;
    z-index: 9;
    width: 20%; 
}
}
</style>



<div id="duyurular" class="layout-px-spacing" style="margin-top:-73px;">


<style>
::-webkit-scrollbar {
   
	height:33px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
	
}

::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}</style>



  <div class="tab-content">

  <br><br><br>
  			
<?php if ($kullanicicek['kul_mail']=="") { ?> 

<? } else { ?>


 
<? }?>

 
<div id="aidatlistesii" >


				
				
<div class="card" style="margin-top:15px;"> <!--- aidat listesii başlıyor -->	
<ul class="listview image-listview transparent flush" style="margin-top:7px;">
                    <li>
                        <div class="item">
                            <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                              <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                           
							 <div class="in">
                                <div>
                                <font style="font-size:20px;" class="text-<?php echo $kullanicicek['badge_renk'] ?>"><?php echo $toplam["apt_isim"]; ?> Apartmanı Aidat Listesi </font><br>
								
                                </div>
								 

                            </div>
                        </div>
                    </li>
               
                </ul>
<ul class="nav nav-tabs lined" role="tablist">
                        <li class="nav-item">
                            <a onclick="goster('2019aidatlar');gizle('2020aidatlar');gizle('2021aidatlar');"  class="nav-link active" data-toggle="tab" href="#overview2" role="tab">
                              <font>  2019</font>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a onclick="goster('2020aidatlar');gizle('2019aidatlar');gizle('2021aidatlar');"  class="nav-link" data-toggle="tab" href="#cards2" role="tab">
                                                             <font >  2020</font>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a onclick="goster('2021aidatlar');gizle('2019aidatlar');gizle('2020aidatlar');"  class="nav-link" data-toggle="tab" href="#settings2" role="tab">
                                                              <font >  2021</font>
                            </a>
                        </li>
                    </ul>


                <div class="card-body" id="2019aidatlar">
		<script>
function myFunction2019() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2019");
  filter = input.value.toUpperCase();
  table = document.getElementById("2019ara");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<form class="search-form" autocomplete="off" style="margin-left:10px;margin-right:px;margin-top:-5px;margin-bottom:5px;">
                    <div class="form-group searchbox" style="">
                           <input autocomplete="off"  id="myInput2019" onkeyup="myFunction2019()" style="width:100%;box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.15);border-radius: 3px;margin-left:-12px; " placeholder="kimi arıyorsunuz" type="text" class="form-control">
                        <i class="input-icon">
<font style=" font-size: 15px;">                         <i class="fa fa-search" aria-hidden="true"></i></font>
                        </i>
                    </div>
                </form>
				
				
		<div class="table-responsive">
                                        <table id="2019ara" class="table mb-4 contextual-table  table-striped rounded">
                                            <thead>
                                                <tr class="">
                                                    <th>AD SOYAD</th>
													<th>DAİRE</th>
													<th>YIL</th>
                                                    <th>OCAK</th>
                                                    <th>ŞUBAT</th>
                                                    <th>MART</th>
													<th>NİSAN</th>
												    <th>MAYIS</th>
													  <th>HAZİRAN</th>
													<th>TEMMUZ</th>
												  <th>AĞUSTOS</th>
										          <th>EYLÜL</th>
												 <th>EKİM</th>
													 <th>KASIM</th>
												 <th>ARALIK</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                              
<?php
 $liste=$crud->cok("select * from kullanicilar where kul_apt='".$toplam["apt_id"]."' ORDER BY kul_id DESC");
 foreach ($liste as $icerik) { $say++?>
    <?php $sonuc2=$crud->tek("SELECT * FROM daire WHERE daire_sakini='".$icerik['kul_id']."' ") ?>
    <?php $sonuc3=$crud->tek("SELECT * FROM apt_daire WHERE daire_id='".$sonuc2['daire_id']."' ") ?>
    <?php $sonuc4=$crud->tek("SELECT * FROM apartman WHERE apt_id='".$sonuc3['apt_id']."' "); ?>

      	<tr  class="table-default" data-kullanici-id="<?php echo $icerik['kul_id']; ?>">
                           
      <td> 
	        <a href="/daire?id=<?php echo $icerik['kul_id']; ?>">
                <div class="chip chip-media" style="width:200px;">
                        <i class="chip-icon bg-<?php echo $kullanicicek['badge_renk'] ?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </i>
                        <span class="chip-label"><?php echo $icerik['kul_isim']; ?></span>
                </div>
            </a>
					
		</td>
		            <td class="text-center">
			 <a href="/daire?id=<?php echo $icerik['kul_id']; ?>"> <div class="chip chip-media" style="width:100px;">
                        <i class="chip-icon bg-<?php echo $kullanicicek['badge_renk'] ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </i>
                        <span class="chip-label">D-<?php echo $sonuc2['daire_no']; ?></span>
                    </div></a>
					 </td>    
		<td class="text-<?php echo $kullanicicek['badge_renk'] ?>">2019</td>
	  
	
	
	
<?php //OCAK AYI 
$kac="1*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $ocak2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('ocak2019<?php echo $icerik['kul_id']; ?>');gizle('gizleocak2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizleocak2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="ocak2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($ocak2019['odemealinantarih']);
?> 
</div>
</td>

	<?php }else{?>
	
 <td data-yil="2019" data-ay="1"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','1*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>

<?php } ?>



<?php
$kac="2*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $subat2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('subat2019<?php echo $icerik['kul_id']; ?>');gizle('gizlesubat2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizlesubat2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="subat2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($subat2019['odemealinantarih']);
?> 
</div>
</td>

	<?php }else{?>
 <td data-yil="2019" data-ay="2"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','2*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="3*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $mart2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('mart2019<?php echo $icerik['kul_id']; ?>');gizle('gizlemart2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizlemart2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="mart2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($mart2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="3"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','3*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="4*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $nisan2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('nisan2019<?php echo $icerik['kul_id']; ?>');gizle('gizlenisan2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizlenisan2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="nisan2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($nisan2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="4"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','4*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="5*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $mayis2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('mayis2019<?php echo $icerik['kul_id']; ?>');gizle('gizlemayis2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizlemayis2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="mayis2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($mayis2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="5"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','5*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>

<?php
$kac="6*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $haziran2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('haziran2019<?php echo $icerik['kul_id']; ?>');gizle('gizlehaziran2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizlehaziran2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="haziran2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($haziran2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="6"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','6*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="7*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $temmuz2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('temmuz2019<?php echo $icerik['kul_id']; ?>');gizle('gizletemmuz2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizletemmuz2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="temmuz2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($temmuz2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="7"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','7*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="8*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $agustos2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('agustos2019<?php echo $icerik['kul_id']; ?>');gizle('gizleagustos2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizleagustos2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="agustos2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($agustos2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="8"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','8*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="9*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $eylul2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('eylul2019<?php echo $icerik['kul_id']; ?>');gizle('gizleeylul2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizleeylul2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="eylul2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($eylul2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="9"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','9*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="10*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $ekim2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('ekim2019<?php echo $icerik['kul_id']; ?>');gizle('gizleekim2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizleekim2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="ekim2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($ekim2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="10"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','10*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="11*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $kasim2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('kasim2019<?php echo $icerik['kul_id']; ?>');gizle('gizlekasim2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizlekasim2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="kasim2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($kasim2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="11"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','11*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="12*2019"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $aralik2019=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('aralik2019<?php echo $icerik['kul_id']; ?>');gizle('gizlearalik2019<?php echo $icerik['kul_id']; ?>');">
<div id="gizlearalik2019<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="aralik2019<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($aralik2019['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2019" data-ay="12"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','12*2019','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
								
 </tr> 
                    
<?php } ?>
		

	
                                               
                                            </tbody>
                                        </table>
                                    </div> </div>
									



       <div class="card-body" style="display:none;" id="2020aidatlar">
<script>
function myFunction2020() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2020");
  filter = input.value.toUpperCase();
  table = document.getElementById("2020ara");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<form class="search-form" autocomplete="off" style="margin-left:10px;margin-right:px;margin-top:-5px;margin-bottom:5px;">
                    <div class="form-group searchbox" style="">
                           <input autocomplete="off"  id="myInput2020" onkeyup="myFunction2020()" style="width:100%;box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.15);border-radius: 3px;margin-left:-12px; " placeholder="kimi arıyorsunuz" type="text" class="form-control">
                        <i class="input-icon">
<font style=" font-size: 15px;">                         <i class="fa fa-search" aria-hidden="true"></i></font>
                        </i>
                    </div>
                </form>
				
				
		<div class="table-responsive">
                                        <table id="2020ara" class="table mb-4 contextual-table  table-striped rounded">
                                            <thead>
                                                <tr class="">
                                                    <th>AD SOYAD</th>
													<th>DAİRE</th>
													<th>YIL</th>
                                                    <th>OCAK</th>
                                                    <th>ŞUBAT</th>
                                                    <th>MART</th>
													<th>NİSAN</th>
												    <th>MAYIS</th>
													  <th>HAZİRAN</th>
													<th>TEMMUZ</th>
												  <th>AĞUSTOS</th>
										          <th>EYLÜL</th>
												 <th>EKİM</th>
													 <th>KASIM</th>
												 <th>ARALIK</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
<?php
 $liste=$crud->cok("select * from kullanicilar where kul_apt='".$toplam["apt_id"]."' ORDER BY kul_id DESC");
 foreach ($liste as $icerik) { $say++?>
<?php $sonuc2=$crud->tek("SELECT * FROM daire WHERE daire_sakini='".$icerik['kul_id']."' ") ?>
<?php $sonuc3=$crud->tek("SELECT * FROM apt_daire WHERE daire_id='".$sonuc2['daire_id']."' ") ?>
<?php $sonuc4=$crud->tek("SELECT * FROM apartman WHERE apt_id='".$sonuc3['apt_id']."' "); ?>
      	<tr class="table-default" data-kullanici-id="<?=$icerik['kul_id']?>">
      <td> 
	 <a href="/daire?id=<?php echo $icerik['kul_id']; ?>"> <div class="chip chip-media" style="width:200px;">
                        <i class="chip-icon bg-<?php echo $kullanicicek['badge_renk'] ?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </i>
                        <span class="chip-label"><?php echo $icerik['kul_isim']; ?></span>
                    </div> </a>
					
		</td>
		            <td class="text-center">
			 <a href="/daire?id=<?php echo $icerik['kul_id']; ?>"> <div class="chip chip-media" style="width:100px;">
                        <i class="chip-icon bg-<?php echo $kullanicicek['badge_renk'] ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </i>
                        <span class="chip-label">D-<?php echo $sonuc2['daire_no']; ?></span>
                    </div></a>
					 </td> 
		<td class="text-<?php echo $kullanicicek['badge_renk'] ?>">2020</td>
	  
	
	
	
	
<?php //OCAK AYI 
$kac="1*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $ocak2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('ocak2020<?php echo $icerik['kul_id']; ?>');gizle('gizleocak2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizleocak2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="ocak2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($ocak2020['odemealinantarih']);
?> 
</div>
</td>

	<?php }else{?>
	
 <td data-yil="2020" data-ay="1"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','1*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>

<?php } ?>



<?php
$kac="2*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $subat2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('subat2020<?php echo $icerik['kul_id']; ?>');gizle('gizlesubat2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizlesubat2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="subat2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($subat2020['odemealinantarih']);
?> 
</div>
</td>

	<?php }else{?>
 <td data-yil="2020" data-ay="2"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','2*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="3*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $mart2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('mart2020<?php echo $icerik['kul_id']; ?>');gizle('gizlemart2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizlemart2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="mart2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($mart2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="3"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','3*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="4*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $nisan2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('nisan2020<?php echo $icerik['kul_id']; ?>');gizle('gizlenisan2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizlenisan2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="nisan2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($nisan2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="4"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','4*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="5*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $mayis2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('mayis2020<?php echo $icerik['kul_id']; ?>');gizle('gizlemayis2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizlemayis2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="mayis2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($mayis2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="5"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','5*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>

<?php
$kac="6*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $haziran2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('haziran2020<?php echo $icerik['kul_id']; ?>');gizle('gizlehaziran2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizlehaziran2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="haziran2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($haziran2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="6"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','6*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="7*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $temmuz2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('temmuz2020<?php echo $icerik['kul_id']; ?>');gizle('gizletemmuz2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizletemmuz2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="temmuz2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($temmuz2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="7"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','7*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="8*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $agustos2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('agustos2020<?php echo $icerik['kul_id']; ?>');gizle('gizleagustos2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizleagustos2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="agustos2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($agustos2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="8"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','8*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="9*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $eylul2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('eylul2020<?php echo $icerik['kul_id']; ?>');gizle('gizleeylul2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizleeylul2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="eylul2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($eylul2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="9"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','9*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="10*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $ekim2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('ekim2020<?php echo $icerik['kul_id']; ?>');gizle('gizleekim2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizleekim2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="ekim2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($ekim2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="10"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','10*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="11*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $kasim2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('kasim2020<?php echo $icerik['kul_id']; ?>');gizle('gizlekasim2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizlekasim2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="kasim2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($kasim2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="11"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','11*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="12*2020"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $aralik2020=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('aralik2020<?php echo $icerik['kul_id']; ?>');gizle('gizlearalik2020<?php echo $icerik['kul_id']; ?>');">
<div id="gizlearalik2020<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="aralik2020<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($aralik2020['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2020" data-ay="12"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','12*2020','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
								
 </tr> 
                    
<?php } ?>
		

	
                                               
                                            </tbody>
                                        </table>
                                    </div> </div> 
									
									
									
									
									
       <div class="card-body" style="display:none;" id="2021aidatlar">


<script>
function myFunction2021() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2021");
  filter = input.value.toUpperCase();
  table = document.getElementById("2021ara");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<form class="search-form" autocomplete="off" style="margin-left:10px;margin-right:px;margin-top:-5px;margin-bottom:5px;">
                    <div class="form-group searchbox" style="">
                           <input autocomplete="off"  id="myInput2021" onkeyup="myFunction2021()" style="width:100%;box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.15);border-radius: 3px;margin-left:-12px; " placeholder="kimi arıyorsunuz" type="text" class="form-control">
                        <i class="input-icon">
<font style=" font-size: 15px;">                         <i class="fa fa-search" aria-hidden="true"></i></font>
                        </i>
                    </div>
                </form>
				
				
		<div class="table-responsive">
                                        <table id="2021ara" class="table mb-4 contextual-table  table-striped rounded">
										
										
                                            <thead>
                                                <tr class="">
												<th>AD SOYAD</th>
                                                  <th>DAİRE</th>
													<th>YIL</th>
                                                    <th>OCAK</th>
                                                    <th>ŞUBAT</th>
                                                    <th>MART</th>
													<th>NİSAN</th>
												    <th>MAYIS</th>
													  <th>HAZİRAN</th>
													<th>TEMMUZ</th>
												  <th>AĞUSTOS</th>
										          <th>EYLÜL</th>
												 <th>EKİM</th>
													 <th>KASIM</th>
												 <th>ARALIK</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
<?php
 $liste=$crud->cok("select * from kullanicilar where kul_apt='".$toplam["apt_id"]."' ORDER BY kul_id DESC");
 foreach ($liste as $icerik) { $say++?>
<?php $sonuc2=$crud->tek("SELECT * FROM daire WHERE daire_sakini='".$icerik['kul_id']."' ") ?>
<?php $sonuc3=$crud->tek("SELECT * FROM apt_daire WHERE daire_id='".$sonuc2['daire_id']."' ") ?>
<?php $sonuc4=$crud->tek("SELECT * FROM apartman WHERE apt_id='".$sonuc3['apt_id']."' "); ?>
      	<tr class="table-default" data-kullanici-id="<?php echo $icerik['kul_id']; ?>">
		
		  <td> 
	 <a href="/daire?id=<?php echo $icerik['kul_id']; ?>"> <div class="chip chip-media" style="width:200px;">
                        <i class="chip-icon bg-<?php echo $kullanicicek['badge_renk'] ?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </i>
                        <span class="chip-label"><?php echo $icerik['kul_isim']; ?></span>
                    </div> </a>
					
		</td>
		
		
            <td class="text-center">
			 <a href="/daire?id=<?php echo $icerik['kul_id']; ?>"> <div class="chip chip-media" style="width:100px;">
                        <i class="chip-icon bg-<?php echo $kullanicicek['badge_renk'] ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </i>
                        <span class="chip-label">D-<?php echo $sonuc2['daire_no']; ?></span>
                    </div></a>
					 </td>                               
    
		
		<td class="text-<?php echo $kullanicicek['badge_renk'] ?>">2021</td>
	  
	
	
<?php //OCAK AYI 
$kac="1*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $ocak2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('ocak2021<?php echo $icerik['kul_id']; ?>');gizle('gizleocak2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizleocak2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="ocak2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($ocak2021['odemealinantarih']);
?> 
</div>
</td>

	<?php }else{?>
	
 <td data-yil="2021" data-ay="1"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','1*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>

<?php } ?>



<?php
$kac="2*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $subat2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('subat2021<?php echo $icerik['kul_id']; ?>');gizle('gizlesubat2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizlesubat2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="subat2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($subat2021['odemealinantarih']);
?> 
</div>
</td>

	<?php }else{?>
 <td data-yil="2021" data-ay="2"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','2*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="3*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $mart2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('mart2021<?php echo $icerik['kul_id']; ?>');gizle('gizlemart2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizlemart2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="mart2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($mart2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="3"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','3*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="4*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $nisan2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('nisan2021<?php echo $icerik['kul_id']; ?>');gizle('gizlenisan2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizlenisan2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="nisan2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($nisan2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="4"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','4*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="5*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $mayis2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('mayis2021<?php echo $icerik['kul_id']; ?>');gizle('gizlemayis2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizlemayis2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="mayis2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($mayis2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="5"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','5*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>

<?php
$kac="6*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $haziran2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('haziran2021<?php echo $icerik['kul_id']; ?>');gizle('gizlehaziran2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizlehaziran2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="haziran2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($haziran2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="6"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','6*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="7*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $temmuz2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('temmuz2021<?php echo $icerik['kul_id']; ?>');gizle('gizletemmuz2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizletemmuz2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="temmuz2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($temmuz2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="7"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','7*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="8*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $agustos2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('agustos2021<?php echo $icerik['kul_id']; ?>');gizle('gizleagustos2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizleagustos2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="agustos2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($agustos2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="8"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','8*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="9*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $eylul2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('eylul2021<?php echo $icerik['kul_id']; ?>');gizle('gizleeylul2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizleeylul2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="eylul2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($eylul2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="9"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','9*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="10*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $ekim2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('ekim2021<?php echo $icerik['kul_id']; ?>');gizle('gizleekim2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizleekim2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="ekim2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($ekim2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="10"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','10*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="11*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $kasim2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('kasim2021<?php echo $icerik['kul_id']; ?>');gizle('gizlekasim2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizlekasim2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="kasim2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($kasim2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="11"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','11*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
				
<?php
$kac="12*2021"; $query = $db->query("SELECT * FROM kiralar WHERE odeme_varmi = '$kac' AND kira_kul_id='".$icerik['kul_id']."'  AND kira_durum=1")->fetch(PDO::FETCH_ASSOC);
if ( $query ){?>
<?php $aralik2021=$crud->tek("SELECT * FROM kiralar where odeme_varmi ='$kac' AND kira_kul_id='".$icerik['kul_id']."' AND kira_durum=1 "); ?>
<td onclick="goster('aralik2021<?php echo $icerik['kul_id']; ?>');gizle('gizlearalik2021<?php echo $icerik['kul_id']; ?>');">
<div id="gizlearalik2021<?php echo $icerik['kul_id']; ?>"><i class="fa fa-check" aria-hidden="true"></i></div>
<div id="aralik2021<?php echo $icerik['kul_id']; ?>" style="display:none;">
<?php
echo timeConvert($aralik2021['odemealinantarih']);
?> </div>
	<?php }else{?>
 <td data-yil="2021" data-ay="12"><a onclick="odemeyap('<?php echo $kullanicicek['kul_id'] ?>','3','<?php echo $sonuc2['daire_id']; ?>','<?php echo $toplam["aidatucret"]; ?>','<?php echo date('Y-m-d'); ?>','1','<?php echo date('Y-m-d H:i:s'); ?>','12*2021','<?php echo $toplam["apt_id"]; ?>','<?php echo date('d.m.Y H.i.s'); ?>','<?php echo $icerik['kul_id']; ?>')"><i class="fa fa-close" aria-hidden="true"></i> </a></td>
<?php } ?>
								
 </tr> 
                    
<?php } ?>
		

	
                                               
                                            </tbody>
                                        </table>
                                    </div> </div> 

									
								</div>
						</div>
  </div>					
					
				
						
						
			<br><br><br>
			<br>
			
			
       </div> 
    </div>  </div>  
	
	
	
	
		
<?php include'footeryeni.php' ?>


<?php if ($kullanicicek['kul_mail']=="") { ?> 




<script type="text/javascript"> 
	
	var hazek=document.getElementById ("deger");

    if(hazek){
	hazek.addEventListener ("click", odemeyap, false);
	}
	


	function odemeyap(deger1,deger2,deger3,deger4,deger5,deger6,deger7,deger8,deger9,deger10,deger11){
		
		   const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'AİDAT',
  text: "Ödendi mi ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Evet',
  cancelButtonText: 'Vazgeç',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
	  
	    	       var islem="sor";
		  $.ajax({	
			url: "https://www.takiptr.com/ajax_aidatal.php",
			data:{deger1:deger1,deger2:deger2,deger3:deger3,deger4:deger4,deger5:deger5,deger6:deger6,deger7:deger7,deger8:deger8,deger9:deger9,deger10:deger10,deger11:deger11},
			type: "post",

              success:function(e){
			
      Swal.fire({
			type: 'success',
			title: 'Tamam',
		    text: "İşlem yapılıyor...",
			showConfirmButton: false,
			  timerProgressBar: true,
			timer: 3555
			
		});
	
	
setInterval(function(){
window.location.reload(false);
},888);


			} 
			
			
			
		
	
   });   

	
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Vazgeçildi',
    
	  
	  
    )
  }
})



  }

</script>
	
<? } else { ?>


 

<script type="text/javascript"> 
	
	var hazek=document.getElementById ("deger");

    if(hazek){
	hazek.addEventListener ("click", odemeyap, false);
	}
	


	function odemeyap(deger1,deger2,deger3,deger4,deger5,deger6,deger7,deger8,deger9,deger10,deger11){
		
		   const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'AİDAT',
  text: "Ödendi mi ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Evet',
  cancelButtonText: 'Vazgeç',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
	  
	    	       var islem="sor";
		  $.ajax({	
			url: "https://www.takiptr.com/ajax_aidatal.php",
			data:{deger1:deger1,deger2:deger2,deger3:deger3,deger4:deger4,deger5:deger5,deger6:deger6,deger7:deger7,deger8:deger8,deger9:deger9,deger10:deger10,deger11:deger11},
			type: "post",

              success:function(e){
			
      Swal.fire({
			type: 'success',
			title: 'Tamam',
		    text: "İşlem yapılıyor...",
			showConfirmButton: false,
			  timerProgressBar: true,
			timer: 3555
			
		});
	
	
setInterval(function(){
window.location.reload(false);
},3333);


			} 
			
			
			
		
	
   });   

	
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Vazgeçildi',
    
	  
	  
    )
  }
})



  }

</script>
	
<? }?>


<script type="text/javascript">
	function dairesecme() {
		var apartmanlistesi=document.getElementById("apartmanlistesi");
		var secilendeger=apartmanlistesi.options[apartmanlistesi.selectedIndex].value;
		$.ajax({
			url: 'classes/ajax.php',
			type: 'POST',
			data: {dairesecme: 'dairesecme',aptid: secilendeger},
			success:function (donenveri) {
				console.log(donenveri);
				liste = $.parseJSON(donenveri);
				$("#apartmansecin").remove();
				$("#dairelistesi").html(liste.liste);
				$('.selectpicker').selectpicker('refresh')
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
</script>


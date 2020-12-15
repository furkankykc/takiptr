<?php 
@ob_start();
session_start();
include_once 'config.php';
require_once 'ext.php';
oturumkontrol();

spl_autoload_register(function($sinif_ismi) {
  $sinif_adresi = "classes/class-".$sinif_ismi . ".php";
  if (is_readable($sinif_adresi)) {
    include_once $sinif_adresi;
  }
});

$crud = new crud($db);
$kul_bilgi_cek=$crud->tekil("kullanicilar","kul_id",$_SESSION['kul_id'],"kul_logo");
$islem=$crud;
$kullanicicek=$islem->tekil("kullanicilar","kul_id",guvenlik($_SESSION['kul_id'])); 
if ($_SERVER['SCRIPT_NAME']=="/lisansdurumu.php") {  } else {
if ($kullanicicek['kul_yetki']=="2") { 
if ($kullanicicek['kalan_gun']=="0") {  
 header("Location: /lisansdurumu");
 } } }
 
  if ($kullanicicek['smsonay']=='1') { } else { 
 header("Location: /telonay");
   } 
   
   
if ($kullanicicek['kul_yetki']=="2") { 
if ($kullanicicek['hosgeldinyonetici']=="0") { 
if ($_SERVER['SCRIPT_NAME']=="/hosgeldinyonetici.php") {  } else {
 header("Location: /hosgeldinyonetici");
 }
}
}

?>	
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>TakipTR / Apartman Yönetim Sistemi </title>
    <link rel="icon" type="image/x-icon" href="/tema/assets/img/favicon.ico"/>

    <link href="/tema/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/tema/assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

 <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

	 <link href="/finap.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/sonradan.css" />
  <?php fileadd("assets/modules/select/bootstrap-select.min.css") ?>

<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>

<script>
function demomod() {
  alert("Demo modda işlem yapamazsınız.");
}
</script>   
<script>
function destek() {
  alert("Sizin için yetkilendirilmiş destek çalışanı bilgileri. Lütfen her konuda destek ekibine ulaşmaktan çekinmeyiniz. CAN AK 0544 306 53 03 ");
}
</script>
<style>

body {
	font-family: 'Roboto', sans-serif;
	font-size: 15px;
	line-height: 1.57143;
	font-weight: 400;
	color: #2d2e2e;
}
h1, h2, h3, h4, h5, h6 {
	font-family: 'Muli', sans-serif;
	margin-top: 0;
}
a {
	color: #2d2e2e;
	transition: all 0.3s ease 0s;
}
a:hover {
	color: #242c42;
	text-decoration: none;
}
a, a:hover, a:active, a:focus {
	outline: none;
	text-decoration: none;
}
.btn, .btn * {
	transition: all 0.3s ease 0s;
}
.bg-dark-1 {
	background: #242c42;
}
.bg-white {
	background-color: #ffffff;
	color: #3d4051;
}
i {
	transition: all 0.4s ease-in-out 0s;
}
.transition3s {
	transition: all 0.3s ease-in-out 0s;
}
ul, li {
	list-style: outside none none;
}
.w-100 {
	width: 100%;
}
.pb-45 {
	padding-bottom: 45px;
}
.pt-50 {
	padding-top: 50px;
}
.mt-40 {
	margin-top: 40px;
}
.mb-30 {
	margin-bottom: 30px;
}
.mb-60 {
	margin-bottom: 60px;
}
.mb-100 {
	margin-bottom: 100px;
}
ul {
	list-style: outside none none;
	margin: 0;
	padding: 0;
}
.cmt-bgcolor-skincolor {
	background: #79b32f;
}
section {
	float: left;
	width: 100%;
	padding: 80px 0;
}
p {
    line-height: 1.61em;
    font-weight: 300;
    font-size: 1.2em;
}

" {
    color: #2c2c2c;
    font-size: 14px;
    font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
    overflow-x: hidden;
   
}
/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 0px 0 0px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}


input[type=text] {
  border: 1px solid #969696;
  border-radius: 15px;
}
#sagalt2
{
z-index:100;
position:fixed;
_position:absolute;
cursor:pointer;
bottom:-54px;
right:-51px;
clip:rect(0 100 85 0);
_top:expression(document.documentElement.scrollTop +document.documentElement.clientHeight-this.clientHeight);
_left:expression(document.documentElement.scrollLe ft + document.documentElement.clientWidth - offsetWidth);
}
#sagalt3
{
z-index:100;
position:fixed;
_position:absolute;
cursor:pointer;
bottom:0px;
right:0px;
clip:rect(0 100 85 0);
_top:expression(document.documentElement.scrollTop +document.documentElement.clientHeight-this.clientHeight);
_left:expression(document.documentElement.scrollLe ft + document.documentElement.clientWidth - offsetWidth);
}


	.section {
  padding: 0 16px; }
  .section.full {
    padding: 0; }

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}



  .eklebutons {
	  background-color: #555555;
    border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;} 
  
  

.separator::before {
    margin-right: .99em;
}
.separator::after {
    margin-left: .99em;
}
#sagalt
{
z-index:100;
position:fixed;
_position:absolute;
cursor:pointer;
bottom:0px;
right:0px;
clip:rect(0 100 85 0);
_top:expression(document.documentElement.scrollTop +document.documentElement.clientHeight-this.clientHeight);
_left:expression(document.documentElement.scrollLe ft + document.documentElement.clientWidth - offsetWidth);
}

#sayfagecisa {
	display:block;
	position:fixed;
	width:100%;
	height:100%;
	top:0px;
	z-index:9999999999999999999999999999999999999999999;
    background-size: 400% 400%;
  
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}


	  </style>
</head>


<body>

<?php 
$cihaz = $_SERVER['HTTP_USER_AGENT']; 
$iphone = strpos($cihaz,"iPhone"); 
$android = strpos($cihaz,"Android"); 
$ipod = strpos($cihaz,"iPod"); 
?>
  <?php 
		
$sayi1=$kullanicicek['gezilensayfa'];
$sayi2=1;
$toplam=$sayi1+$sayi2;
 $liste1=$crud->tek("UPDATE kullanicilar SET gezilensayfa='".$toplam."' WHERE kul_id=1");
  ?>

<?php $dairecek=$crud->tek("SELECT * FROM daire WHERE daire_sakini='".$kullanicicek['kul_id']."' ") ?>

		
			
 <?php $dairebilgisi33=$crud->tek("SELECT * FROM daire WHERE daire_sakini='".$kullanicicek['kul_id']."' ") ?>
	 <!--- yukarıda kişinin dairedeki bilgileri çekiliyor -->
				
     <?php $apartmanbilgisi33=$crud->tek("SELECT * FROM apt_daire WHERE daire_id='".$dairebilgisi33['daire_id']."' ") ?>
	 <!--- yukarıda kişinin dairedeki bilgileri ile apartman eşleşiyor  -->
		
	 <?php $apartmanbilgisicek33=$crud->tek("SELECT * FROM apartman WHERE apt_id='".$apartmanbilgisi33['apt_id']."' "); ?>
	 <!--- yukarıda kişinin dairedeki bilgileri ile apartman eşleşiyor  -->
		
		

  
  

	

	<?php if ($iphone == true || $android == true || $ipod == true) { ?>
  
   <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                      
                        			
<?php if ($kullanicicek['kul_mail']=="") { ?> 

<div class="in">
                            <strong>DEMO KULLANICI</strong>
                            <div class="text-muted">05443065303</div>
                        </div>
<? } else { ?>

<div class="in">
                            <strong><?php echo $kullanicicek['kul_isim'] ?></strong>
                            <div class="text-muted"><?php echo $kullanicicek['kul_mail'] ?></div>
                        </div>
<? }?>

                        
                    </div>
            <div class="action-group bg-<?php echo $kullanicicek['badge_renk'] ?>" style="height:90px;">
                        <a onclick="goster('sayfagecisa');"  href="/profilim" class="action-button" style="margin-top:5px;">
                            <div class="in" style="width:66px;height:63px;">
                                <div class="iconbox">
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <font style="font-size:17px;">Profilim</font>
                            </div>
                        </a>
                        <a onclick="goster('sayfagecisa');"  href="/sistem" class="action-button" style="margin-top:5px;">
                        <div class="in" style="width:66px;">
                                <div class="iconbox">
                                   <i class="fa fa-gear" aria-hidden="true"></i>
                                </div>
                                <font style="font-size:17px;">Ayarlar</font>
                            </div>
                        </a>
                        <a onclick="goster('sayfagecisa');"  href="/classes/logout.php" class="action-button" style="margin-top:5px;">
                               <div class="in" style="width:66px;">
                                <div class="iconbox">
                                   <i class="fa fa-sign-out" aria-hidden="true"></i>
                                </div>
                               <font style="font-size:17px;">Çıkış</font>
                            </div>
                        </a>
                       
                    </div>
                    <!-- menu -->
                    <div class="listview-title mt-1">BAŞLANGIÇ</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li class="waves-effect">
                            <a href="/apartmanlar" onclick="goster('sayfagecisa');" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                 <i class="fa fa-building" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                    Apartmanlar
                                    <span class="badge badge-<?php echo $kullanicicek['badge_renk'] ?>"><?php echo $toplam=$crud->tek("SELECT COUNT(*) FROM apartman WHERE ekleyen_id='".$_SESSION['kul_id']."' AND yapildimi=0")['COUNT(*)'] ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="waves-effect">
                            <a href="/daireler" onclick="goster('sayfagecisa');" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                 <i class="fa fa-home" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                    Daireler
                                    <span class="badge badge-<?php echo $kullanicicek['badge_renk'] ?>"><?php echo $toplam=$crud->tek("SELECT COUNT(*) FROM kullanicilar WHERE ekleyen_id='".$_SESSION['kul_id']."' AND kul_durum=1 ")['COUNT(*)'] ?></span>
                                </div>
                            </a>
                        </li>
                      
                    </ul>
 
                   
						   <ul class="listview flush transparent no-line image-listview">
                     
						  <div class="listview-title mt-1">TAKİPTR</div>
						  	 <li class="waves-effect">
                            <a href="/raporcikart" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                <i class="fa fa-smile-o" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                               Destek 
                                </div>
                            </a>
                        </li>
						  	 <li class="waves-effect">
                            <a href="/raporcikart" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                <i class="fa fa-smile-o" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                              İletişim
                                </div>
                            </a>
                        </li>
						 <li class="waves-effect">
                            <a href="/raporcikart" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                <i class="fa fa-smile-o" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                             Hakkında
                                </div>
                            </a>
                        </li>
						  
						  
                    </ul>
                    <!-- * others -->
					
					
					
<br><br><br>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->
	
	
<div class="appBottomMenu" >
              	<a href="#" class="waves-effect item" data-toggle="modal" data-target="#digerlerii">

                    <div class="col">
                 <font color="black"> <i class="fa fa-cubes" aria-hidden="true" style="font-size:23px;font-color:black;"></i></font>
                     <strong style="font-size:13px;">Yönetim</strong>
                    </div>
                </a>
           
             
				
				<a href="#" class="waves-effect item" data-toggle="modal" data-target="#odemeleraa">

                    <div class="col">
                   <font color="black"> <i class="fa fa-try" aria-hidden="true" style="font-size:23px;font-color:black;"></i></font>
                     <strong style="font-size:13px;">Ödemeler</strong>
                    </div>
                </a>
				
				
                <a href="#" class="waves-effect headerButton item" data-toggle="modal" data-target="#sidebarPanel">
                    <div class="col">
                      <font color="black"> <i class="fa fa-navicon" aria-hidden="true" style="font-size:23px;font-color:black;"></i></font>
                     <strong style="font-size:13px;">Diğer</strong>
                    </div>
                </a>
            </div>
			
			
       
        <div class="modal fade action-sheet inset" id="odemeleraa" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ödeme Yönetimi</h5>
                    </div>
                    <div class="modal-body">
					
                        <ul class="action-button-list">
                           <li class="waves-effect">
                                <a onclick="goster('sayfagecisa');" href="/aidatlars" class="btn btn-list" >
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;  Aidat Listesi </span>
                                </a>
                            </li>
                            <li class="waves-effect">
                                <a onclick="goster('sayfagecisa');" href="/giderler" class="btn btn-list">
                                    <span><i class="fa fa-try" aria-hidden="true"></i> &nbsp;  Apartman Giderleri</span>
                                </a>
                            </li>
                           <li class="waves-effect">
                                <a onclick="goster('sayfagecisa');" href="#" class="btn btn-list" data-dismiss="modal">
                                    <span><i class="fa fa-try" aria-hidden="true"></i> &nbsp;  Apartman Borçları</span>
                                </a>
                            </li>
                           <li class="waves-effect">
                                <a onclick="goster('sayfagecisa');" href="/borclar" class="btn btn-list" >
                                    <span><i class="fa fa-try" aria-hidden="true"></i>  &nbsp;  Diğer Ödemeler</span>
                                </a>
                            </li>
							 <li class="waves-effect">
                                <a onclick="goster('sayfagecisa');" href="/borclar" class="btn btn-list" >
                                    <span><i class="fa fa-plus" aria-hidden="true"></i>  &nbsp;  Yeni Ödeme Ekle</span>
                                </a>
                            </li>
                            <li class="action-divider"></li>
                            <li class="waves-effect">
                                <a onclick="goster('sayfagecisa');" href="#" class="btn btn-list text-danger" data-dismiss="modal">
                                    <span>Vazgeç</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		
		
		
		
		  <div class="modal fade action-sheet inset" id="digerlerii" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Diğer Özellikler</h5>
                    </div>
                    <div class="modal-body" style="height:330px;overflow-y: scroll;" >
					
                     
                    <ul class="listview flush transparent no-line image-listview"  id="aptalakal">
                         <li class="waves-effect">
                            <a onclick="goster('sayfagecisa');" href="/istekler" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                   <i class="fa fa-child" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                   İstekler
                                </div>
                            </a>
                        </li>
                       <li class="waves-effect">
                            <a  onclick="goster('sayfagecisa');" href="/sikayetler" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                   <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                   Şikayetler
                                </div>
                            </a>
                        </li>
                     
						 <li class="waves-effect">
                            <a onclick="goster('sayfagecisa');" href="/duyurular" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                   <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                     Duyurular
                                </div>
                            </a>
                        </li>
						 <li class="waves-effect">
                            <a onclick="goster('sayfagecisa');" href="/yapilacaklar" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                   <i class="fa fa-cubes" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                   Yapılacaklar
                                </div>
                            </a>
                        </li>
						
						 <li class="waves-effect">
                            <a onclick="goster('sayfagecisa');" href="/hizmetler" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                 <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                   Hizmetler
                                </div>
                            </a>
                        </li>
						
							 <li class="waves-effect">
                            <a onclick="goster('sayfagecisa');" href="/calisanlar" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                   Çalışanlar
                                </div>
                            </a>
                        </li>
						
						
						
							<li>
                            <a onclick="goster('sayfagecisa');" href="/borclar" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                   <i class="fa fa-book" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                   Karar Defteri
                                </div>
                            </a>
                        </li>
						
						<li>
                            <a onclick="goster('sayfagecisa');" href="/borclar" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                Avukat İşlemleri
                                </div>
                            </a>
                        </li>
						
						
						 <li class="waves-effect">
                            <a onclick="goster('sayfagecisa');" href="/smsyonetim" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                                   Toplu Sms
                                </div>
                            </a>
                        </li>
						 <li class="waves-effect">
                            <a onclick="goster('sayfagecisa');" href="/raporcikar" class="item">
                                <div class="icon-box bg-<?php echo $kullanicicek['badge_renk'] ?>">
                                  <i class="fa fa-file-text" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                               Rapor
                                </div>
                            </a>
                        </li>
                            <li class="action-divider"></li>
                             <li class="waves-effect">
                            <a onclick="goster('sayfagecisa');" href="#" class="btn btn-list text-danger item" data-dismiss="modal">
                                <div class="icon-box">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                                <div class="in">
                               Kapat
                                </div>
                            </a>
                        </li>
					
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php }else{ ?>

	
  <div id="sagalt" style="height:70px;width:70px;-webkit-border-top-left-radius: 55px;
-moz-border-radius-topleft: 55px;
border-top-left-radius: 55px;" class="bg-<?php echo $kullanicicek['badge_renk'] ?>">
  <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
  <img src="/dosyalar/menu.png" style=" box-shadow: rgba(0, 0, 0, 0.55) 0px 0px 35px 6px; border-radius: 48px; height:48px;margin-left:13px;margin-top:13px;margin-right:30px;margin-bottom:30px;"alt="" border="0" />
  </a>
  </div>
  

<?php }?>


					
					

	<div style="margin-top:-107px;">


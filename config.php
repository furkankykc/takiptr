<?php 

@session_start();

include_once 'fonksiyonlar.php';

$host="localhost"; //Host adınızı girin varsayılan olarak Localhosttur eğer bilginiz yoksa bu şekilde bırakın
$veritabani_ismi="takiptr_mca5353"; //Veritabanı İsminiz
$kullanici_adi="takiptr_mca5353"; //Veritabanı kullanıcı adınız
$sifre="mca5353425"; //Kullanıcı şifreniz

try {

	$db=new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {
	echo "Veritabanı Bağlantı Hatası, Lütfen Bilgilerinizi Kontrol Edin <hr>";
	echo $e->getMessage();
	exit;
}


$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, 'tr_TR');

$gunler = array(
    'Pazartesi',
    'Salı',
    'Çarşamba',
    'Perşembe',
    'Cuma',
    'Cumartesi',
    'Pazar'
);

$aylar = array(
    'Ocak',
    'Şubat',
    'Mart',
    'Nisan',
    'Mayıs',
    'Haziran',
    'Temmuz',
    'Ağustos',
    'Eylül',
    'Ekim',
    'Kasım',
    'Aralık'
);

function isXHR(){

    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');


}



?>
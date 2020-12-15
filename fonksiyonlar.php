<?php
/*
Aksoyhlc Apartman Yönetim Scripti

Bu script "Aksoyhlc | Ökkeş Aksoy" tarafından hazırlanmıştır. Dağıtımı YAPILAMAZ, satışı YAPILAMAZ, 
izinsiz olarak herhangi bir platformda PAYLAŞILAMAZ, kodlar ve dosyalar izinsiz olarak herkese açık olarak YAYINLANAMAZ. 
 */

function turkce($isim) {
	$isim = trim($isim);
	$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
	$replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
	$isim_fin = str_replace($search,$replace,$isim);
	$yeniisim = 	mb_strtolower($isim_fin, 'utf8');
	return $yeniisim;
};


function yetkikontrol() {
	if (empty($_SESSION['kul_mail']) OR empty($_SESSION["kul_yetki"]) OR empty($_SESSION["kul_id"]) OR $_SESSION["kul_yetki"]!=2) {
		return FALSE;
	} elseif ($_SESSION["kul_yetki"]==2) {
		return TRUE;
	}
};


function yonetici($apartman,$yonlendirme="h") {
	if (yetkikontrol()) {
		return TRUE;
	} else {
		if (isset($_SESSION['yonetici_apartman'])) {
			if ($_SESSION['yonetici_apartman']==$apartman) {
				return TRUE;
			} else {
				if ($yonlendirme=="h") {
					return FALSE;
				} else {
					git("index.php","izinsiz");
				}
			}
		} else {
			return FALSE;
		}
	}
};

function daire($daire,$yonlendirme="h")
{
	if (yetkikontrol()) {
		return TRUE;
	} else {
		if ($_SESSION["kul_daire"]==$daire) {
			return TRUE;
		} else {
			if ($yonlendirme=="h") {
				return FALSE;
			} else {
				git("index.php","izinsiz");
			}
		}
	}
}

function yoneticimi($yonlendirme="h",$link="index.php")
{
	if (yetkikontrol()) {
		return TRUE;
	} else {
		if (isset($_SESSION['yonetici_apartman'])) {
			return TRUE;
		} else {
			if ($yonlendirme!="h") {
				git("$link","izinsiz");
				exit;
			} else {
				return FALSE;
			}
		}
	}
}

function apt_sakini($apartman,$yonlendirme="h")
{
	if (yetkikontrol()) {
		return TRUE;
	} else {
		if ($_SESSION["kul_apartman"]==$apartman) {
			return TRUE;
		} else {
			if ($yonlendirme=="h") {
				return FALSE;
			} else {
				git("index.php", "izinsiz");
				exit;
			}
		}
	}
}


function daire_sakinimi($daire,$yonlendirme="h")
{
	global $crud;
	if (yetkikontrol()) {
		return TRUE;
	} else {
		$apartmanid=$crud->tek("SELECT apartman.apt_id FROM apt_daire INNER JOIN apartman ON apt_daire.apt_id=apartman.apt_id	WHERE apt_daire.daire_id=$daire")['apt_id'];

		if (yonetici($apartmanid)) {
			return TRUE;
		} else {
			if ($_SESSION["kul_daire"]==$daire) {
				return TRUE;
			} else {
				if ($yonlendirme=="h") {
					return FALSE;
				} else {
					git("daireler.php", "izinsiz");
					exit;
				}
			}
		}

		
	}
}

function oturumkontrol() {
	global $db;
	if (!isset($_SESSION['kul_mail']) OR !isset($_SESSION['kul_id']) OR !isset($_SESSION['kul_yetki']) OR !isset($_SESSION['kul_isim'])) {	
		@session_destroy();
		header("location:login.php");
		exit;	
	}
};

function izin($modul,$islem)
{
	global $db;
	$ayarsor=$db->prepare("SELECT kul_baslangic_onay FROM ayarlar");
	$ayarsor->execute();
	$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

	if (yetkikontrol()) {
		return TRUE;
		exit;
	}

	
	$izin=$db->prepare("SELECT * FROM izin WHERE kul_id=:kul_id AND modul_kisa=:modul_kisa");
	$izin->execute(array(
		'kul_id' => $_SESSION['kul_id'],
		'modul_kisa' => $modul
	));
	$izincek=$izin->fetch(PDO::FETCH_ASSOC);

	$say=$izin->rowcount();

	if ($say=="0") {
		if ($ayarcek['kul_baslangic_onay']==1) {
			return TRUE;		
		} else {
			return FALSE;
		}		
	} else {
		if ($islem=="e") {
			if ($izincek['ekleme']=="1") {
				return true;
			} else {
				return false;
			}
		}

		if ($islem=="d") {
			if ($izincek['duzenleme']=="1") {
				return true;
			} else {
				return false;
			}
		}

		if ($islem=="s") {
			if ($izincek['silme']=="1") {
				return true;
			} else {
				return false;
			}
		}

		if ($islem=="g") {
			if ($izincek['gorme']=="1") {
				return true;
			} else {
				return false;
			}
		}

		if ($islem=="t") {		
			if ($izincek['silme']=="0" AND $izincek['duzenleme']=="0" AND $izincek['ekleme']=="0" AND $izincek['gorme']=="0") {
				return false;
			} else {
				return true;
			}
		}
	}
}



function guvenlik($gelen){
	$giden = htmlspecialchars($gelen);
	//$giden = htmlentities($giden);	
	//$giden = strip_tags($giden);
	return $giden;
};



function sendRequest($site_name,$send_xml,$header_type) {

    	//die('SITENAME:'.$site_name.'SEND XML:'.$send_xml.'HEADER TYPE '.var_export($header_type,true));
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$site_name);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$send_xml);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$header_type);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);

	$result = curl_exec($ch);

	return $result;
};

?>
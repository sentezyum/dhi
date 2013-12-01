<?php

App::uses('AppHelper', 'View/Helper');

class GenelHelper extends AppHelper {

	var $helpers = Array('Html');
	function menu($data = Array(),$css = Null){
		$veri = '';
		$veri = "<div class='$css'><ul>";
		foreach($data as $baslik => $degerler) {
			if ($degerler['Page']['seen'] == 1) {
				$veri .= "<li><span>" . $degerler['Page']['name'] . "</span>";
				if (count($degerler['Subpage']) > 0) {
					$veri .="<ul>";
					foreach($degerler['Subpage'] as $basliklink => $link) {
						if ($link['type'] != 'span') {
							if ($link['seen'] != 0) {
								$veri .= "<li>" . $this->Html->link($link['name'],$link['link']) . "</li>";
							}
						} else {
							$veri .= "<li><span></span></li>";
						}
					}
					$veri .="</ul>";
				}
				$veri .= "</li>";
			}
		}
		$veri .= "</ul></div>";
		return $veri;
	}
	function tarih_al($tarih) {
		$aylarKisa=array("Oca", "Şub", "Mar", "Nis", "May", "Haz", "Tem", "Ağu", "Eyl", "Eki", "Kas", "Ara");
		$aylarSayi=array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
		$tarih = str_replace($aylarKisa, $aylarSayi, $tarih);
		$tarih = explode(" ",$tarih);
		$tarih = $tarih[2] . "-" . $tarih[1] . "-" . $tarih[0];
		return $tarih;
	}
	function strip_word_html($text, $allowed_tags = '<b><i><sup><sub><em><strong><u><br>') 
    { 

        //replace MS special characters first 
        $search = array('/&lsquo;/u', '/&rsquo;/u', '/&ldquo;/u', '/&rdquo;/u', '/&mdash;/u'); 
        $replace = array('\'', '\'', '"', '"', '-'); 
        $text = preg_replace($search, $replace, $text); 
        //make sure _all_ html entities are converted to the plain ascii equivalents - it appears 
        //in some MS headers, some html entities are encoded and some aren't 

        //try to strip out any C style comments first, since these, embedded in html comments, seem to 
        //prevent strip_tags from removing html comments (MS Word introduced combination) 
        if(mb_stripos($text, '/*') !== FALSE){ 
            $text = mb_eregi_replace('#/\*.*?\*/#s', '', $text, 'm'); 
        } 
        //introduce a space into any arithmetic expressions that could be caught by strip_tags so that they won't be 
        //'<1' becomes '< 1'(note: somewhat application specific) 
        $text = preg_replace(array('/<([0-9]+)/'), array('< $1'), $text); 
        $text = strip_tags($text, $allowed_tags); 
        //eliminate extraneous whitespace from start and end of line, or anywhere there are two or more spaces, convert it to one 
        $text = preg_replace(array('/^\s\s+/', '/\s\s+$/', '/\s\s+/u'), array('', '', ' '), $text); 
        //strip out inline css and simplify style tags 
        $search = array('#<(strong|b)[^>]*>(.*?)</(strong|b)>#isu', '#<(em|i)[^>]*>(.*?)</(em|i)>#isu', '#<u[^>]*>(.*?)</u>#isu'); 
        $replace = array('<b>$2</b>', '<i>$2</i>', '<u>$1</u>'); 
        $text = preg_replace($search, $replace, $text); 
        //on some of the ?newer MS Word exports, where you get conditionals of the form 'if gte mso 9', etc., it appears 
        //that whatever is in one of the html comments prevents strip_tags from eradicating the html comment that contains 
        //some MS Style Definitions - this last bit gets rid of any leftover comments */ 
        $num_matches = preg_match_all("/\<!--/u", $text, $matches); 
        if($num_matches){ 
              $text = preg_replace('/\<!--(.)*--\>/isu', '', $text); 
        } 
        return $text; 
    }
	function tarih($format, $zaman=null){
		$aylarIng=array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$aylarKisaIng=array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	$gunlerIng=array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$gunlerKisaIng=array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
	$aylar=array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");
	$aylarKisa=array("Oca", "Şub", "Mar", "Nis", "May", "Haz", "Tem", "Ağu", "Eyl", "Eki", "Kas", "Ara");
	$gunler=array("Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi", "Pazar");
	$gunlerKisa=array("Pt", "Sa", "Ça", "Pe", "Cu", "Ct", "Pa");
		if(!$zaman) $zaman=time();
		else{
			$zaman=str_ireplace(array("once","ay", "gun", "yil","dakika","saniye","hafta"),
							   array("ago","month","day","year","minute","second","week"), $zaman);
			$zaman=strtotime($zaman);
		}
		$format=str_ireplace(
			array("kisaaysayi","kisaay","aysayi","kisagun","hgunkisa","hgun","gun","kisayil","yil","kisasaat","saat","dakika","saniye", "ay"),
			array("n",         "M",     "m",     "j",      "D",       "l",   "d",  "y",      "Y",  "h",       "H",   "i",     "s",      "F"),
			$format);
		$tarihStr=date($format, $zaman);

			$tarihStr=str_replace($aylarIng, $aylar, $tarihStr);


			$tarihStr=str_replace($gunlerIng, $gunler, $tarihStr);

			$tarihStr=str_replace($aylarKisaIng, $aylarKisa, $tarihStr);


			$tarihStr=str_replace($gunlerKisaIng, $gunlerKisa, $tarihStr);

		return $tarihStr;
	}

	 function strtoupper_tr($deger) 
         { 
         $deger = str_replace("ç","Ç",$deger); 
         $deger = str_replace("ğ","Ğ",$deger); 
         $deger = str_replace("ı","I",$deger); 
         $deger = str_replace("i","İ",$deger); 
         $deger = str_replace("ö","Ö",$deger); 
         $deger = str_replace("ü","Ü",$deger); 
         $deger = str_replace("ş","Ş",$deger); 

         $deger = strtoupper($deger); 
         $deger = trim($deger); 

         return $deger; 
         } 

  function strtolower_tr($deger) 
         { 
         $deger = str_replace("Ç","ç",$deger); 
         $deger = str_replace("Ğ","ğ",$deger); 
         $deger = str_replace("I","ı",$deger); 
         $deger = str_replace("İ","i",$deger); 
         $deger = str_replace("Ö","ö",$deger); 
         $deger = str_replace("Ü","ü",$deger); 
         $deger = str_replace("Ş","ş",$deger); 

         $deger = strtolower($deger); 
         $deger = trim($deger); 

         return $deger; 
         } 

  function ucwords_tr($deger) 
         { 
         $deger = split(" ",trim($deger)); 
         $deger_tr = ""; 

         for($x=0; $x < count($deger); $x++) 
             { 
             $deger_bas = substr($deger[$x],0,1); 
             $deger_son = substr($deger[$x],1); 
             $deger_bas = $this->strtoupper_tr($deger_bas); 

             $deger_tr .= $deger_bas.$deger_son." "; 
             } 

         $deger_tr = trim($deger_tr); 

         return $deger_tr; 
         } 
	function ilk_harf($deger) {
		$deger = $this->ucwords_tr($this->strtolower_tr($deger));
		return $deger;
	}
	function replace_tr($text) {
		$text = trim($text);
		$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü');
		$replace = array('C','c','G','g','i','I','O','o','S','s','U','u');
		$new_text = str_replace($search,$replace,$text);
		return $new_text;
	}
	function seo_tr($s) {
		$tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç');
		$eng = array('s','s','i','i','g','g','u','u','o','o','c','c');
		$s = str_replace($tr,$eng,$s);
		$s = strtolower($s);
		$s = preg_replace('/&.+?;/', '', $s);
		$s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
		$s = preg_replace('/\s+/', '-', $s);
		$s = preg_replace('|-+|', '-', $s);
		$s = trim($s, '-');
	
		return $s;
	}
	function dosya_adi($deger) {
		$deger = $this->strtolower_tr($deger);
		$deger = str_replace(" ","",$deger);
		$deger = $this->replace_tr($deger);
		$deger = preg_replace('/&.+?;/', '', $deger);
		$deger = preg_replace('/[0-9]/', '', $deger);
		$deger = preg_replace('/[^%a-z0-9 _-]/', '', $deger);
		$deger = preg_replace('/\%/', '', $deger);
		return $deger;
	}
	function sembol_at($deger) {
		$deger = preg_replace('/&.+?;/', '', $deger);
		$deger = preg_replace('/[0-9]/', '', $deger);
		$deger = preg_replace('/[^%a-z0-9 _-]/', '', $deger);
		$deger = preg_replace('/\%/', '', $deger);
		return $deger;
	}
	function makelink($data=Array(),$class = Null,$controller = Null,$action = Null){
		$veri = '';
		$veri .= "<div class='$class'><ul>";
		$tmp = Array();
		foreach ($data as $key => $values) {
			$temp = $values['Page']['link'];
			$temp = explode("/",$temp);
			$tmp[$temp[1]]['Label'] = $values['Page']['label'];
			$tmp[$temp[1]]['Icon'] = $values['Page']['icon'];
			$tmp[$temp[1]]['Link'] = $values['Page']['link'];
			foreach ($values['Subpage'] as $keya => $valuesa) {
				if ($valuesa['type'] != 'span') {
					$temp = $valuesa['link'];
					$temp = explode("/",$temp);
					$tmp[$temp[1]][$temp[2]]['Label'] = $valuesa['label'];
					$tmp[$temp[1]][$temp[2]]['Icon'] = $valuesa['icon'];
					$tmp[$temp[1]][$temp[2]]['Link'] = $valuesa['link'];
				}
			}
		}
		if ($action != 'display') {
			if ($action == 'index') {
				$veri .= "<li>" .  $this->Html->link($this->Html->image('home.png') . 'Ana Sayfa', '/',array('escape' => false)) . "</li>";
				$veri .= "<li>" . $this->Html->image('arrow-000-medium.png') . "</li>";
				$veri .= "<li><span>" . $this->Html->image($tmp[$controller]['Icon']) . $tmp[$controller]['Label'] . "</span></li>";
			} else {
				$veri .= "<li>" .  $this->Html->link($this->Html->image('home.png') . 'Ana Sayfa', '/',array('escape' => false)) . "</li>";
				$veri .= "<li>" . $this->Html->image('arrow-000-medium.png') . "</li>";
				$veri .= "<li>" . $this->Html->link($this->Html->image($tmp[$controller]['Icon']) . $tmp[$controller]['Label'], $tmp[$controller]['Link'],array('escape' => false)) . "</li>";
				$veri .= "<li>" . $this->Html->image('arrow-000-medium.png') . "</li>";
				$veri .= "<li><span>" . $this->Html->image($tmp[$controller][$action]['Icon']) . $tmp[$controller][$action]['Label'] . "</span></li>";
			}
		} else {
			$veri .= "<li><span>" . $this->Html->image('home.png') . "Ana Sayfa</span></li>";
		}
		$veri .= "<ul></div>";
		return $veri;

	}
	function hataGoster($errors,$class) {
		if (count($errors) != 0 ){
			$veri ='';
			$veri .= "<div class='$class'><ul>";
			foreach ($errors as $no => $error) {
				$veri .= "<li><b>Hata:</b> $error</li>";
			}
			$veri .= "</ul></div>";
			return $veri;
		}
	}
	function _getDiff($from = array() , $to = array() ) { 
        $dateDiff =     mktime( $to['hour']    , $to['minutes']   , $to['seconds'] , 
                        $to['month']   , $to['day'] - 1       , $to['year'] ) 
                        - 
                        mktime( $from['hour']  , $from['minutes'] , $from['seconds'] , 
                        $from['month'] , $from['day']     , $from['year'] ); 
        return $dateDiff; 
    } 
     
    function _isValidDate( $sDate = "01/01/1980 00:00:00" ) { 
        $dateString = split( " "    , $sDate      ); 
        $dateParts  = split( "[/-]" , $dateString[0] ); 
        $dateParts2 = isset($dateString[1]) ? split( "[:]"  , $dateString[1] ) : array('00','00','00'); 
        if( !checkdate($dateParts[1], $dateParts[2], $dateParts[0]) ) 
        {  return false; } 
        return array 
               ( 
                 'month'   => $dateParts[1] , 
                 'day'     => $dateParts[2] , 
                 'year'    => $dateParts[0] , 
                 'hour'    => $dateParts2[0] , 
                 'minutes' => $dateParts2[1] , 
                 'seconds' => $dateParts2[2] 
               ); 
    } 
     
    function getDiff($dateFrom, $dateTo) { 
        $return = '';
		$from   = $this->_isValidDate($dateFrom); 
        $to     = $this->_isValidDate($dateTo); 
		$now	= $this->_isValidDate(date('Y-m-d'));
        $yearinseconds  = (60*60*24*365.242199); 
        $monthinseconds = (60*60*24*30.4); 
        $dayinseconds   = (60*60*24); 
        $hourinseconds  = (60*60); 
		$weekseconds = $dayinseconds * 7;
        $minuteinseconds = 60; 


        if($from AND $to) { 
            $dateDiff = $this->_getDiff($from, $to); 
            $r = $dateDiff; 
            $dd['years'] =     floor ( $dateDiff / $yearinseconds ); 
            $r -= $dd['years']*$yearinseconds; 
            $remainder['years'] = $r/$yearinseconds; 
            $dd['months'] =    floor ($r / $monthinseconds); 
            $r -= $dd['months']*$monthinseconds; 
            $remainder['months'] = $r/$monthinseconds; 
            $dd['days']  =     floor ($r / $dayinseconds ); 
            $r -= $dd['days']*$dayinseconds; 
            $remainder['days'] = $r/$dayinseconds; 
            $dd['hours'] =     floor ($r  / $hourinseconds); 
            $r -= $dd['hours']*$hourinseconds; 
            $remainder['hours'] = $r/$hourinseconds; 
            $dd['minutes'] =   floor ($r / $minuteinseconds); 
            $r -= $dd['minutes']*$minuteinseconds; 
            $remainder['minutes'] = $r/$minuteinseconds; 
            $dd['seconds'] =   $r; // $dateDiff; 
            $remainder['seconds'] = 0; 
            $rmn = 0;
			$rmn = $dateDiff;
			if (floor($dateDiff / $weekseconds) > 0) {
				$return .= floor($dateDiff / $weekseconds) . " Hafta ";
				$rmn = $dateDiff - (floor($dateDiff / $weekseconds) * $weekseconds);
			}
			if (floor($rmn / $dayinseconds) > 0) {
				$return .= floor($rmn / $dayinseconds) . " Gün";
			}
			if ($return == '') {
				return "Yayında";
			} else {
				return $return . " Kaldı";
			}
        } 
        return false;
		
    } 
}
?>
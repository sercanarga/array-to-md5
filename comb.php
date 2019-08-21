<?php

//Git test

ini_set('memory_limit', '1G');

function kombinasyon($elemanlar, $sonuclar = '') {
    global $sonuc;

	if ($sonuclar != null) {
        $sonuc[] = $sonuclar;
    }

    for ($i = 0; $i < count($elemanlar); $i++) {
        $kalan_elemanlar = $elemanlar;
        $eleman = array_splice($kalan_elemanlar, $i, 1);
        if (count($kalan_elemanlar) > 0) {
            kombinasyon($kalan_elemanlar, $sonuclar . ' ' . $eleman[0]);
		} else {
            array_push($sonuc, $sonuclar . ' ' . $eleman[0]);
        }
    }
	return $sonuc;
}

function karsilastir($dizi, $md5) {
    for ($i = 0; $i < count($dizi); $i++) {
        if (md5(ltrim($dizi[$i])) == $md5) {
            return ltrim($dizi[$i]);
        }
    }
}

$olasiliklar = [
    'Ekrem',
    'İmamoğlu',
    'ateistveri',
    'ateist'
];
$md5 = 'e84b485007cf154a69b5713996bea15a';

$kombinasyon = kombinasyon($olasiliklar);
$karsilastir = karsilastir($kombinasyon, $md5);

if ($karsilastir) {
    echo '<b>Eşleşme Bulundu:</b> ' , $karsilastir;
    echo '<p>Kombinasyonlar:</p>';
    echo '<pre>';
    print_r($kombinasyon);
    echo '</pre>';
} else {
    echo 'Eşleşme Yok!';
}

?>

<?php
declare(strict_types = 1);
#bu altaki ikisini silersin.
//$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
//define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);

##$array değişkenine transaction_files içindeki dosyalarin verilerini yazar.
$dir=(scandir(FILES_PATH));
$csvFiles = array_slice($dir, 2);
$array=[];
$array2=[];

foreach($csvFiles as $csvfile){
    if (($handle = fopen(FILES_PATH.$csvfile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000)) !== FALSE) {
            array_push($array,$data);
        }   
        fclose($handle);
        array_push($array2, count($array));
    }
}

##csv dosylarının ilk satırlarını siler.
##reverse yapıp siliyoruz çünkü unset yapıldığında indexler tekrardan veriliyor.
array_reverse($array2);
foreach ($array2 as $ar){
    unset($array[$ar]);
}
array_shift($array);

//float tipine çevirmek için "$" ve "," leri silip işlem 
$kar=0.0;
$zarar=0.0;
foreach ($array as $arr){
    $ar= str_ireplace(['$', ','], '', (string)$arr[3]);
    if ($ar[0]!== '-'){
        $kar+=$ar;
    } else $zarar+=$ar;
}


?>
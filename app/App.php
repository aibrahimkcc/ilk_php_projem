<?php
declare(strict_types = 1);
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
$dir=(scandir(FILES_PATH));
$csvFiles = array_slice($dir, 2);
//var_dump($dir);
$array=[];
foreach($csvFiles as $csvfile){
    if (($handle = fopen(FILES_PATH.$csvfile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000)) !== FALSE) {
            $num = count($data);
            array_push($array,$data);

        }
        
        fclose($handle);
    }
}
echo '<pre>';
print_r($array);
echo '<pre/>';

//$a=fopen(FILES_PATH.$csvFiles[0],'r');
////fopen(FILES_PATH.$csvFiles[1],'r');
//
//while(($line = fgets($a))!==false){
//    echo $line. '<br/>';
//}
//echo '<br/>';
//var_dump($a);
//echo '<br/>';
//while(($line = fgets($a))!==false){
//    echo $line. '<br/>';
//}

file_put_contents('toplam.csv',$csvFiles,FILE_APPEND);

//$asd=fopen(FILES_PATH . DIRECTORY_SEPARATOR. 'sample_1.csv','r');
//$csv=fgetcsv($asd);
//print_r($csv);
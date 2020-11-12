<?php

error_reporting(E_ALL);
$dirname = "magento/Export/XML/Itemgroups/_PROCESSED";
$datum = date("d-m-y");

$bestanden = scandir($dirname);
foreach ($bestanden as $bestand){
    if($bestand <= $datum){
        if(is_dir($dirname)){
            $dir = new RecursiveDirectoryIterator($dirname, RecursiveDirectoryIterator::SKIP_DOTS);
            foreach (new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST) as $filename => $file){
                if(is_file($filename))
                    unlink($filename);
                else
                    rmdir($filename);
            }
            rmdir($dirname);
            if(file_exists("_PROCESSED")){
                echo "Map: _PROCESSED bestaat al";
            }
            else{
                echo "Map: _PROCESSED bestaat niet word aangemaakt";
                mkdir($dirname);
            }

        }

    }
    else{
        echo "$bestand komt niet in aanmerking voor verwijdering";
    }
}



/*foreach ($files as $file){
   // echo $file;
    //echo "<br>";
   if($file <= $datum_vandaag){
       echo "Bestand: $file is ouder dan vandaag:";

       echo "<br>";
   }
}*/


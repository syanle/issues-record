<?php
    function grabImage($url,$filename) {
       ob_start();
       readfile($url);
       $img = ob_get_contents();
       ob_end_clean();
       $size = strlen($img);
    
       $fp2=@fopen($filename, "a");
       fwrite($fp2,$img);
       fclose($fp2);
    
       return $filename;
    }
    
    $urlPrefix = "http://code.google.com/p/goagent/issues/detail?id=";
    for($i = 1; $i < 21551; $i++){
        $url = $urlPrefix . $i;
        $fileContents = file_get_contents($url);
        if(preg_match('/goagent.+attachment.+token.+"/', $fileContents, $matches)) {
            foreach ($matches as $matchedInOnePage) {
                $picNumber++;
                $matchedInOnePage = "http://" . str_replace("&amp;", "&", $matchedInOnePage, $count);
                $matchedInOnePage = str_replace("\"", "", $matchedInOnePage);
                echo $matchedInOnePage . "<br>"; //. "count = " . $count;
                
                //for checking the url in a txt file
                // $urlTestFile = fopen("1.txt", "w") or die("Unable to open file!");
                // fwrite($urlTestFile, $matchedInOnePage);
                // fclose($urlTestFile);
                
                $img = GrabImage($matchedInOnePage, $i . " - " . $picNumber);
            }
        }
    }
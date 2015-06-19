<?php
    $t = 1;
    for($j = 1; $j <= 216; $j++){
        $dirname = (($j - 1)*100) . " - " . ($j *100 - 1);
        mkdir($dirname);
    }
    for($i = 1; $i <= 21550; $i++){
        if($i/100 == $t){
            $t++;
        }
        if($i < $j * 100){
            copy("/home/ubuntu/workspace/o/" . $i . ".html" ,"/home/ubuntu/workspace/o/" . (($t - 1)*100) . " - " . ($t *100 - 1) . "/" . $i . ".html");
        }
    }

<?php
     $participant_file = "participant.txt";
     $fopen = fopen($participant_file,'r');
     $fread = fread($fopen,filesize($participant_file));
     fclose($fopen);
     $remove=" ";
     $split = explode($remove,$fread);
     $array[] = null;
     foreach($split as $string)
     {
          $row=explode($tab,$string);
          array_push($array,$row);
     }


?>
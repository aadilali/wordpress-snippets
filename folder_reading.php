<?php 

$dir = "events/";

//Dir Level 1
$cdir = scandir($dir); 
foreach ($cdir as $key => $value) 
{ 
   if (!in_array($value,array(".",".."))) 
   { 
      if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
      { 
        // $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
        echo "dir -- ".$value."<br>";
        // Dir Level 2
        $dir_2 = $dir . DIRECTORY_SEPARATOR . $value;
        $cdir_lvl2 = scandir($dir_2); 

        foreach ($cdir_lvl2 as $value_lvl2) {
            if (!in_array($value_lvl2,array(".",".."))) 
            { 
               if (is_dir($dir_2 . DIRECTORY_SEPARATOR . $value_lvl2)) 
               { 
                    echo "dir 2 -- ".$value_lvl2  ."<br>";

                     // Dir Level 3 For Images Saving
                    $dir_3 = $dir_2 . DIRECTORY_SEPARATOR . $value_lvl2;
                    $cdir_lvl3 = scandir($dir_3); 

                    foreach ($cdir_lvl3 as $value_lvl3) {
                        if (!in_array($value_lvl3,array(".",".."))) 
                        { 
                            if (!is_dir($dir_3 . DIRECTORY_SEPARATOR . $value_lvl3)) 
                            { 
                                    echo "File -- ".$value_lvl3  ."<br>";
                            }
                        }
                    }
               }
            }
        }

      }  
   } 
} 

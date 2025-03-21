<?php
    $languages = array ("a" => "A",
                        "b" => "B",
                        "q" => "Q");
    
    print "<table>";
    reset ($languages);
    $hd1 = key ($languages);
    $hd2 = $languages[$hd1];
    print "<tr><th>$hd1</th><th>$hd2</th></tr>";
    next($languages);
    
    while ( list ($ctry,$lang) = each ($languages)) :
         print "<tr><td>$ctry</td><td>$lang</td></tr>";
    endwhile;
    
    print "</table>";
?>
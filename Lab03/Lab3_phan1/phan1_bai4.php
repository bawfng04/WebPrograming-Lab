<?php
function printMatrix(){
    // css
    echo "<style>
        table { border-collapse: collapse; margin: 20px; }
        td { border: 1px solid #ccc; padding: 8px; text-align: right; width: 40px; text-align: center; }
    </style>";

    // bảng
    echo "<table>";

    for ($i = 1; $i <= 7; $i++){
        echo "<tr><td>$i</td>";
        for($j = 1; $j <= 7; $j++){
            echo "<td>" . ($i * $j) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

printMatrix();
?>
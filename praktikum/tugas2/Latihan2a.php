<?php
function gantiStyle($tulisan,$style1,$style2){
    
    echo "
    <div style='$style1'>
        <p style='$style2'>$tulisan</p>
    </div>
    ";

}

echo gantiStyle("Selamat datang di praktikum PW","border : 1px solid black; box-shadow: 2px 2px blur black;","font-size: 28px; font-family: arial; color: #8c782d; font-style : italic;");

?>
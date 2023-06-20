<?php
$favicons = array("./Image/Chris.png" => 10, "./Image/vinylA.png" => 1.500, "./Image/vinylB.png" => 4, "./Image/vinylC.png" => 4, "./Image/vinylD.png" => 4, "./Image/vinylE.png" => 1.500, "./Image/vinylF.png" => 4, "./Image/vinylG.png" => 4, "./Image/vinylH.png" => 4, "./Image/vinylI.png" => 1.500, "./Image/vinylJ.png" => 4, "./Image/vinylK.png" => 4, "./Image/vinylM.png" => 4, "./Image/vinylN.png" => 4, "./Image/vinylO.png" => 4, "./Image/vinylP.png" => 4, "./Image/vinylQ.png" => 4, "./Image/vinylR.png" => 4, "./Image/vinylS.png" => 4, "./Image/vinylT.png" => 4, "./Image/vinylU.png" => 1.500, "./Image/vinylV.png" => 4, "./Image/vinylW.png" => 4, "./Image/vinyl-Hexa.png" => 4, "./Image/vinyl-Hexa1.png" => 4);

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$rand = rand(1,100);
$sum = 0;
$chosenFav;
if($url === "http://127.0.0.1/index.php"){
    $chosenFav="./Image/vinyl-Index.png";
}
else{
foreach ($favicons as $f=>$v) {
    $sum += $v;
    if ( $sum >= $rand ) {
        $chosenFav = $f;
        break;
    }
}
}
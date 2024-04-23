<?php
function main($m,$k){
    global $keyarr,$len;
    $encmessage = "";
    $key = $k;
    $keyarr = str_split($key);

    $message = strtoupper($m);
    $len = 0;
    $encmessage = Vigilante_enc($message);
    echo "<p id='output'>$encmessage</p>";

    // $decmessage = Vigilante_dec($encmessage);
    // echo $decmessage;
}

function Vigilante_enc($message){
    global $alphabetDictionary,$keyarr;
    $temp = "";
    $cutstr = str_split($message,3);
    foreach ($cutstr as $index => $letter){
        $characters1= str_split($letter);
        foreach($characters1 as $index => $alpha) {
            $encpair = $alphabetDictionary[$keyarr[$index]];
            if (isset($alphabetDictionary[$alpha])){
                $val = $alphabetDictionary[$alpha] + $encpair;
                if ($val > 26){
                    $val -= 26;
                }
                $temp .= array_search($val,$alphabetDictionary);
            } else {
                $temp .= $alpha;
            }
        }
    }
    return $temp;
}

function Vigilante_dec($encmessage){
    global $alphabetDictionary, $keyarr;
    $temp = "";
    $cutstr = str_split($encmessage,3);
    foreach ($cutstr as $index => $letter){
        $characters1= str_split($letter);
        foreach($characters1 as $index => $alpha) {
            $encpair = $alphabetDictionary[$keyarr[$index]];
            if (isset($alphabetDictionary[$alpha])){
                $val = $alphabetDictionary[$alpha] - $encpair;
                if ($val < 0){
                    $val += 26;
                }
                $temp .= array_search($val,$alphabetDictionary);
            } else {
                $temp .= $alpha;
            }
        }
    }
    return $temp;
}

$alphabet = range('A', 'Z');
$alphabetDictionary = [];

foreach ($alphabet as $index => $letter) {
    $alphabetDictionary[$letter] = $index;
}

if (isset($_POST['submit'])){
    $m = $_POST["message"];
    $k = $_POST["key"];
    main($m,$k);
}
?>
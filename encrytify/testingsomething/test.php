<?php
include("html_blocks/menu.html");
$alphabet = range('A', 'Z');
$alphabetDictionary = [];

foreach ($alphabet as $index => $letter) {
    $alphabetDictionary[$letter] = $index;
}
$encmessage = "";
$key = "ANK";
$keyarr = str_split($key);

$message = strtoupper(readline("Enter meesage: "));
$len = 0;
$encmessage = Vigilante_enc($message);
echo $encmessage."\n";

$decmessage = Vigilante_dec($encmessage);
echo $decmessage;

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

?>
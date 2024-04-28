<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Simonetta:ital,wght@0,400;0,900;1,400;1,900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Encryptify</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="crypt_style.css">
</head>
<body>
    <header>
        <h1>ENCRYPTIFY</h1>
        <div id="upper-menu">
            <div class="upper-menu-btn">
                <button onclick="window.location.href='index.html'">Home</button>
                <button onclick="window.location.href='enc_desc.php'">Encryption</button>
                <button onclick="window.location.href='desc.php'">Decryption</button>
                <button onclick="window.location.href='data_store.php'">Data Store</button>
                <button onclick="window.location.href='#credits'">Contact</button>
            </div>
        </div>
        <div class="login-btn">
            <button>
                <strong>Login</strong>
            </button>
            <button id="register-btn">
                <strong>Register</strong>
            </button>
        </div>
    </header>
    <div class="content">
        <div id="center_text"><h2>Encryption</h2></div>
        <form action="" name="mainForm" method="POST">
            <div id="type-select">
                <select id="enctype" name="enctype">
                    <option value="vignere"> Vignere Cipher</option>
                    <option value="xor"> XOR Cipher</option>
                </select>            
            </div>
            <textarea name="message" placeholder="Enter Your Message here.."></textarea>
            <input name="key" type="password" id="password" name="password" placeholder="Enter Key">
            <div id="center">
                <input type="submit" value="submit" id="submit" name="submit">
            </div>
        </form>
    </div>    
        <?php
function main($m,$k){
    global $keyarr,$len;
    $encmessage = "";
    $key = strtoupper($k);
    $keyarr = str_split($key);

    $message = strtoupper($m);
    $len = 0;
    $encmessage = Vigilante_enc($message);
    echo "<p id='output'><h1>ENCRYPTED TEXT:</H1><BR>$encmessage</p>";

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
    <hr>
    <div id="footer">
        <p id="end-head">ENCRYPTIFY</p>
        <div id="credits">
            <p>Made By MasterANK(Ankit Aggarwal)</p> <br>
            <div>
                <a href="https://github.com/MasterANK" target=”_blank”><img class="social-media" src="https://i.gyazo.com/85e7ce9196ae635161fec921602903a7.png"></a>
                <a href="https://www.instagram.com/masterank15/" target=”_blank”><img class="social-media" src="https://freelogopng.com/images/all_img/1683193139instagram-icon-png-white.png"></a>
                <a href="https://twitter.com/masterank" target=”_blank”><img class="social-media" src="https://freelogopng.com/images/all_img/1690643777twitter-x%20logo-png-white.png"></a>
                <a href="https://www.linkedin.com/in/ank-agg" target=”_blank”><img class="social-media" src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/linkedin-app-white-icon.png"></a>
                <a href="https://masterank15.wixsite.com/ank4code" target=”_blank”><img class="social-media" src="https://static.wixstatic.com/media/6405a3_75efb70c651a4ce3adc533a46676fe2d~mv2.png/v1/fill/w_89,h_89,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/logo%20test_PNG.png"></a>
            </div>
        </div>
    </div>
</body>
</html>

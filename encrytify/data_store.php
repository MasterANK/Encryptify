<!DOCTYPE html>
<html>
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

    <title>Data Store</title>
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
        <div id="center_text"><h2>Data Store</h2></div>
        <form action="" name="mainForm" method="POST">
            <input type="text" id="password" name="key" placeholder="Enter The Key" required><br>
            <textarea id="mes" name="mes" placeholder="Enter Your Message or Leave empty to retrive the message"></textarea><br>
            <div id="center">
                <input type="submit" value="submit" id="submit" name="submit">
                <input type="submit" name="delete" id="submit" value="Delete">
            </div>
        </form>
    </div>
    <?php 
    if(isset($_SERVER["REQUEST_METHOD"])&&($_SERVER["REQUEST_METHOD"] == "POST")){
        $key = $_POST['key'];
        $message = $_POST['mes'];

        if(isset($_POST['submit']) && empty($message)){
            displayMessage($key);
        } else if(isset($_POST['submit'])){
            saveMessage($key, $message);
        } else if(isset($_POST['delete'])){
            deleteMessage($key);
        }
    }
    function saveMessage($key, $message) {
        $folder = "data_folder"; 
        $filename = $folder . DIRECTORY_SEPARATOR . "$key.txt";
    
        $file = fopen($filename, "w");
        if ($file) {
            fwrite($file, $message);
            fclose($file);
            echo "Message Saved Successfully;<br>";
            echo "To view the Message, Simply Write the Key and press Submit keeping the message field empty.<br>";
        } else {
            echo "Error saving message.";
        }
    }
    function displayMessage($key) {
        $folder = "data_folder";
        $filename = $folder . DIRECTORY_SEPARATOR . "$key.txt";
        
        if (file_exists($filename)) {
            $message = file_get_contents($filename);
            echo "<pre id='output'><h1>Message:</h1><br>$message<br></pre>";
        } else {
            echo "Message not found for the provided key.";
        }
    }

    function deleteMessage($key) {
        $folder = "data_folder"; 
        $filename = $folder . DIRECTORY_SEPARATOR . "$key.txt";
        
        if (file_exists($filename)) {
            unlink($filename);
            echo "Message deleted successfully.";
        } else {
            echo "Message not found for the provided key.";
        }
    }
    ?>


    <p id="output"></p>
    </div>
    <hr>
    <div id="footer">
        <p id="end-head">ENCRYPTIFY</p>
        <div id="credits">
            <p>Made By: <br> MasterANK(Ankit Aggarwal) <br> Jatin Garg</p> <br>
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

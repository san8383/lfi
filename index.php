<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>redblue</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Redblue</h1>
    <i>a gallery of red and blue teamers</i>

    <div>
        <h2>What would you like to see?</h2>
        <a href="/?view=red"><button id="red">RED</button></a> <a href="/?view=blue"><button id="blue">BLUE</button></a><br>
        <?php
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
            function containsStr($str, $substr) {
                return strpos($str, $substr) !== false;
            }
        $ext = isset($_GET["ext"]) ? $_GET["ext"] : '.php';
            if(isset($_GET['view'])) {
                if (containsStr($_GET['view'], '../..')) {
                    echo 'Hacker detected! Try harder!';
                }elseif((containsStr($_GET['view'], 'red') || containsStr($_GET['view'], 'blue')) && !containsStr($_GET['view'], '../..')) {

		$filename = array($_GET['view']);
		$pattern = '/(flag)\S+/';
		$check = preg_grep($pattern, $filename);
			if (!$check) {
                  	include ($filename[0]) . $ext;
               		}else{
                  	print("All is not simple as you think! Try harder!");
               		}		
		
                    //echo 'Here you go!';
                    //include $_GET['view'] . $ext;
                } else {
                    echo 'Sorry, only red or blue allowed. Parameter $_GET["ext"] is not defined, so default file extension is applied.';
                }
            }
        ?>
    </div>
            <form  method="POST">
               <div >
                  <input type="text" id="input" name="InputData">
               </div>
               <button type="submit" >Submit</button>
            </form>
        <?php
        if (!empty($_POST['InputData'])){
            $_SESSION['data'] = $_POST['InputData'];
        }
        ?>
</body>

</html>

<?php 

    function needToCensor($s, $cen){
        $result = true;

        $s = strtoupper($s);
        $cen = strtoupper($cen);

        if(strlen($s) == strlen($cen) || (strlen($s) == strlen($cen) + 1 && ($s[strlen($s) - 1] == '.' || $s[strlen($s) - 1] == ',' || $s[strlen($s) - 1] == ':' || $s[strlen($s) - 1] == ';' || $s[strlen($s) - 1] == '!' || $s[strlen($s) - 1] == '?')))
            for($i = 0; $i < strlen($cen) && $result; $i++){
                if($s[$i] != $cen[$i])
                    $result = false;
            }
        else
            $result = false;

        return $result;
    }

    function censor(&$s){
        $c = "";

        if($s[strlen($s) - 1] == ',' || $s[strlen($s) - 1] == '.' || $s[strlen($s) - 1] == ':' || $s[strlen($s) - 1] == ';' || $s[strlen($s) - 1] == '!' || $s[strlen($s) - 1] == '?')
            $c = $s[strlen($s) - 1];

        $s = "***";
        if($c != "")
            $s .= $c;
    }

    $par = $_POST["par"];
    $cen = $_POST["cen"];
    $prova;
    $elements = explode(" ", $par);

    for($i = 0; $i < count($elements); $i++)
        if(needToCensor($elements[$i], $cen))
            censor($elements[$i]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <title>PHP Badwords</title>
</head>
<body>
    <div class="container px-2 pt-5 text-center">
        <?php for($i = 0; $i < count($elements); $i++)
            echo $elements[$i] . " ";
        ?>

        <div class="pt-5 mt-2">
            <a href="./index.html" class="al-button">Torna alla home</a>
        </div>
    </div>
</body>
</html>
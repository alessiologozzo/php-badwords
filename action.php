<?php 

    function isLetter($s, $p){
        $result = true;

        for($i = $p; $i < strlen($s) && $result; $i++)
            if(ord($s[$i]) < 65 || ord($s[$i]) > 90)
                $result = false;

        return $result;
    }

    function isFirstLetter($s, $p){
        $result = true;

        if(ord($s[$p + 1]) < 65 || ord($s[$p + 1]) > 90)
                $result = false;
            

        return $result;
    }

    function needToCensor($s, $cen){
        $result = true;

        $s = strtoupper($s);
        $cen = strtoupper($cen);

        if(strlen($s) >= strlen($cen)){
            for($i = 0; $i < strlen($cen) && $result; $i++){
                if($s[$i] != $cen[$i])
                    $result = false;
                }
            
            if(strlen($s) > strlen($cen) && $result)
                if(isFirstLetter($s, strlen($cen) - 1))
                    $result = false;
        }
        else
            $result = false;

        return $result;
    }

    function censor(&$s){
        $final = "***";
        $copy = strtoupper($s);

        if(!isLetter($copy, 0)){
            $index = 0;
            while(ord($copy[$index]) >= 65 && ord($copy[$index]) <= 90 && $index < strlen($copy))
                $index++;

            for($i = $index; $i < strlen($s); $i++)
                $final .= $s[$i];
        }

        $s = $final;
    }

    $par = $_POST["par"];
    $cen = $_POST["cen"];
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
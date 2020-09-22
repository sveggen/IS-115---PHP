<!-- Oppgave 3 -->
<html>
<head>
<title>Nytt medlem</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/modul-4/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<form method="post" action="">
<input name="submit" type="submit" value="Send" class="btn btn-dark">
</form>

<?php

$game = false;
if (isset($_POST['submit'])){
    $game = true;
}

$deltakere = array("Frank" => 0, "Hans" => 0, "Oliver" => 0, "Hobbe" => 0, "Franker" => 0, "Mona" => 0);
$runde = 0;
while (count($deltakere) >= 2 && $game == true){
    echo "<h2>Runde: " . ++$runde . "\n</h2>";

    # Trekke tall
    foreach($deltakere as $key => $value){
        $deltakere[$key] = random_int(1, 50);
        echo "<p> $key fikk poengsummen $deltakere[$key] \n</p>";
    }

    # Returner deltaker(e) med lavest poengsum
    $laveste = array_keys($deltakere, min($deltakere));
    
    # Anonnsere flere vinnere
    if (count(array_unique($deltakere)) == 1){
        echo '<h3><div class="p-3 mb-2 bg-success text-white">Deltaker ' . implode(" og ", array_keys($deltakere)) . ' vant</h3></div>';
    break;
}
    #Fjern deltaker(e)
    foreach($laveste as $item){
            unset($deltakere[$item]);
            echo '<p class="text-danger">Deltaker ' . $item . ' røk ut</p>';
        }

    # Anonnsere vinner
    if (count(array_unique($deltakere)) == 1){
        if (count($deltakere) == 1){
            echo '<h3><div class="p-3 mb-2 bg-success text-white">Deltaker ' . implode(" og ", array_keys($deltakere)) . ' vant</div></h3></u>';
    break;
            }
        }
    }

?>
    </body>
</html>
<!-- Oppgave 3 -->

<?php

//variabler
$runde = 0;
$game = true;

$deltakere = array(
    "markus" => 0,
    "jørn" => 0,
    "frank" => 0,
    "ole" => 0
);

annonceContestants($deltakere);
newRound($deltakere, $runde);

function drawNumber($deltakere){
    foreach($deltakere as $key => $value){
        $value+=random_int(1, 50);
        echo "<p>Deltaker: {$key} | Poeng: {$value} </p>";
    };
};

function annonceContestants($deltakere){
    foreach($deltakere as $key => $value){
        echo"<p>{$key}</p>";
    };
};

function newRound($deltakere, $runde){
    echo "<h1>Runde: {$runde}</h1>";
    drawNumber($deltakere);
    $runde++;
};

function gameOn($deltakere){
    while($deltakere > 1){
        $game = true;
    }
}

?>
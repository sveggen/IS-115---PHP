<!-- Oppgave 4 -->

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
  
<h1>Registrere nytt medlem</h1>

<form action="" method="get">
<div class="form-group">
<div class="col-xs-4">
<p>Fornavn: <input type="text" class="form-control" name="fornavn" />
Etternavn: <input type="text" class="form-control" name="etternavn" />
Epost: </br><input type="email" class="form-control" name="epost" />
Mobilnummer: </br><input type="tel" class="form-control" name="mobilnummer" pattern="[0-9]{8}" />
Fødselsdato: </br><input type="date" class="form-control" name="dato" />
<label class="radio-inline"><input type="radio" name="optradio" checked>Mann</label>
<label class="radio-inline"><input type="radio" name="optradio">Dame</label>
<label class="radio-inline"><input type="radio" name="optradio">Annet</label>
Gateadresse: <input type="text" class="form-control" name="gateadresse" />
Postnummer: <input type="text" class="form-control" name="postnummer" pattern="[0-9]{4}" required/>
Poststed: <input type="text" class="form-control" name="poststed" />


Interesser:


Kursaktiviteter:

Roller:

    <input type="submit" class="btn btn-primary" name="knapp" value="Submit"/>
</div>
</div>
</div>
</p>


<?php
echo "<p> ". $_GET['fornavn'] ." </p>";

$medlem = array();
$ikkeutfylt = array();

if (isset($_POST['fornavn'])) {
  array_push($medlem, $_POST['fornavn']);
} else{
  array_push($ikkeutfylt, $verdi="Fornavn");
}
if (isset($_POST['etternavn'])) {
  array_push($medlem, $_POST['etternavn']);
} else{
  array_push($ikkeutfylt, $verdi="Etternavn");
}
if (isset($_POST['telefonnummer'])) {
  array_push($array, $_POST['telefonnummer']);
} else{
  array_push($ikkeutfylt, $verdi="Telefonnummer");
}

if(isset($_POST['submit']) && !empty($ikkeutfylt)){
  echo "Følgende felt mangler verdi: " .  implode(", ", $array);
}
?>



</form>

<div class="card">
  <div class="card-body">Basic card</div>
</div>
</body>
</html>
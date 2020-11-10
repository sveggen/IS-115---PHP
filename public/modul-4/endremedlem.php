<!-- Oppgave 5 -->

<?php
include './include/header.inc.php';
$title = "Endre medlem";
?>

<div style="background-image: url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.hdwallpapers.in%2Fdownload%2Fcold_night_mountains_hd-2560x1440.jpg&f=1&nofb=1');">
<?php

$medlem = array(
  "fornavn" => "Markus",
   "etternavn" => "Sveggen", 
   "epost" => "m.k@gmail.com",
   "mobilnummer" => 98121102, 
   "dato" => "1998-12-03", 
   "kjonn" => "mann", 
   "medlemsnr" => 123139,
   "kontigent" => "betalt",
   "innmeldt" => "2010-10-10",
   "gateadresse" => "Fjellveien 12",
   "postnummer" => "4563",
   "poststed" => "Kristiansand",
   "interesser" => array(
     "klatring",
     "gaming"
    ),
   "kursaktiviteter" => array(
     "lederkurs"
   )
  );

function alleFeltUtfylt(){
    if (!empty($_POST['fornavn']) && !empty($_POST['etternavn']) 
    && !empty($_POST['epost']) && !empty($_POST['mobilnummer']) 
    && !empty($_POST['dato']) && !empty($_POST['kjonn']) 
    && !empty($_POST['gateadresse']) && !empty($_POST['postnummer'])
    && !empty($_POST['poststed']) && !empty($_POST['interesser'])){
      return true;
    }
  }

  function setVerdi($felt){
      global $medlem;
      $value = "value =" . $medlem[$felt];
    echo (string) $value;
  }

?>
<div class="registrer-medlem">
<form action="" method="post" id="oppdater" name="oppdater">
  <div class="form-group">
<h3>Medlemskap</h3>
  </div>

<?php 
if (isset($_POST['submit']) && alleFeltUtfylt() == true){
  $endringer_gjort = false;
  if ($medlem['interesser'] != $_POST['interesser'] 
  or $medlem['kursaktiviteter'] != $_POST['kursaktiviteter']
  or count(array_diff($medlem, $_POST)) >= 4 ){
    $endringer_gjort = true;
    $medlem = array_replace($medlem, $_POST);
    echo '<small class="form-text text-success">Nye endringer ble lagret.</small><br>';
  } else {
    echo '<small class="form-text text-danger">Ingen nye endringer ble lagret.</small><br>';
  }
}
?>

<div class="form-row">
<div class="form-group">
<label for="fornavn">Fornavn: </label>
<input type="text" class="form-control" name="fornavn" placeholder="Navn" 
<?php echo (!empty($medlem['fornavn'])) ? ('value = "'.$medlem["fornavn"].'"') : "value = \"\"";  ?> />
<?php if (empty($_POST['fornavn']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn et fornavn.</small>
<?php }?>
</div>
<div class="form-group ">
<label for="etternavn">Etternavn: </label>
 <input type="text" class="form-control" name="etternavn" placeholder="Navnesen" 
 <?php echo (!empty($medlem['etternavn'])) ? ('value = "'.$medlem["etternavn"].'"') : "value = \"\"";  ?> />
 <?php if (empty($_POST['etternavn']) && isset($_POST['submit'])){
   ?>
  <small class="form-text text-danger">Fyll inn et etternavn.</small>
<?php }?>
</div>
</div>
<div class="form-group ">
<label for="email">Email: </label>
<input type="email" class="form-control" name="epost" placeholder="ola@mail.no" <?php setVerdi("epost")?> />
<?php if (empty($_POST['epost']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn en gyldig epostadresse.</small>
<?php }?>
</div>
<div class="form-group">
<label for="mobilnummer">Mobilnummer: </label>
<input type="tel" class="form-control" name="mobilnummer" pattern="[0-9]{8}" placeholder="12345678" <?php setVerdi("mobilnummer")?> />
<?php if (empty($_POST['mobilnummer']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn et mobilnummer med 8 tall.</small>
<?php }?>
</div>
<div class="form-group">
<label for="dato">Fødselsdato: </label>
<input type="date" class="form-control" name="dato" min="1900-01-01" max="2010-01-01" <?php date("d.m.Y", strtotime(setVerdi("dato")))?> placeholder/>
<?php if (empty($_POST['dato']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn en gyldig fødselsdato.</small>
<?php }?>
</div>
<div class="form-group">
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="mann" name="kjonn" value="mann" class="custom-control-input"
  <?php if(($medlem['kjonn']) == "mann"){?> checked=true <?php } ?> />
  <label class="custom-control-label" for="mann">Mann</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="dame" name="kjonn" value="dame" class="custom-control-input"
  <?php if(($medlem['kjonn']) == "dame"){?> checked=true <?php } ?> />
  <label class="custom-control-label" for="dame">Dame</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="annet" name="kjonn" value="annet" class="custom-control-input"
  <?php if(($medlem['kjonn']) == "annet"){?> checked=true <?php } ?> />
  <label class="custom-control-label" for="annet">Annet</label>
</div>
</div>
<div class="form-row">
<div class="form-group ">
<label for="gateadresse">Gateadresse: </label>
<input type="text" class="form-control" name="gateadresse" placeholder="Grindvegen 47"
<?php echo (!empty($medlem['gateadresse'])) ? ('value = "'.$medlem["gateadresse"].'"') : "value = \"\"";  ?> />
<?php if (empty($_POST['gateadresse']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn en gateadresse.</small>
<?php }?>
</div>
<div class="form-group ">
<label for="postnummer">Postnummer: </label>
<input type="text" class="form-control" name="postnummer" pattern="[0-9]{4}" placeholder="1431" <?php setVerdi("postnummer")?> />
<?php if (empty($_POST['postnummer']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn et gyldig postnummer.</small>
<?php }?>
</div>
<div class="form-group "> 
<label for="poststed">Poststed: </label>  
<input type="text" class="form-control" name="poststed" placeholder="Stabekk" <?php setVerdi("poststed")?> />
<?php if (empty($_POST['poststed']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Fyll inn et poststed.</small>
<?php }?>
</div>
</div>

<?php 
function valgteInteresser($interesse){
    global $medlem;
  $checked = "";
  if (isset($medlem['interesser']) && in_array($interesse ,$medlem['interesser'])){
    $checked = "checked";
  } else {
    $checked = "";
  }
  echo (string) $checked;
}
?>

<div class="form-group "> 
<label for="checkboxes">Interesser:</label>
<div class="checkboxes" id="sjekkbokser">
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="ballsport" <?php valgteInteresser("ballsport") ?>>
    <label class="form-check-label" for="ballsport">Ballsport</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="dans" <?php valgteInteresser("dans") ?>>
    <label class="form-check-label" for="dans">Dans</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="sminke" <?php valgteInteresser("sminke") ?>>
    <label class="form-check-label" for="sminke">Sminke</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="programmering" <?php valgteInteresser("programmering") ?>>
    <label class="form-check-label" for="programmering">Programmering</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="klatring" <?php valgteInteresser("klatring") ?>>
    <label class="form-check-label" for="klatring">Klatring</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="gaming" <?php valgteInteresser("gaming") ?>>
    <label class="form-check-label" for="gaming">Gaming</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="musikk" <?php valgteInteresser("musikk") ?>>
    <label class="form-check-label" for="musikk">Musikk</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="matlaging" <?php valgteInteresser("matlaging") ?>>
    <label class="form-check-label" for="matlaging">Matlaging</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="trening" <?php valgteInteresser("trening") ?>>
    <label class="form-check-label" for="trening">Trening</label>
</div>
<div class="form-check form-check-inline">
    <input type="checkbox" name="interesser[]" class="form-check-input" value="sminke" <?php valgteInteresser("sminke") ?>>
    <label class="form-check-label" for="sminke">Sminke</label>
</div>
<?php if (empty($_POST['interesser']) && isset($_POST['submit'])){?>
  <small class="form-text text-danger">Velg minst en interesse.</small>

<?php }
function valgteKurs($kurs){
    global $medlem;
  $selected = "";
  if (isset($medlem['kursaktiviteter']) && in_array($kurs ,$medlem['kursaktiviteter'])){
    $selected = "selected";
  } else {
    $selected = "";
  }
  echo (string) $selected;
}
?>

</div>
</div>
<div class="form-group"> 
<label for="kursaktiviteter">Kursaktiviteter:</label>
<select name="kursaktiviteter[]" class="form-control kurs-select" id="kurs" multiple>
<option <?php valgteKurs("klatrekurs") ?> value="klatrekurs">Klatrekurs</option>
  <option <?php valgteKurs("lederkurs") ?> value="lederkurs">Lederkurs</option>
    <option <?php valgteKurs("gitarkurs") ?> value="gitarkurs">Gitarkurs</option>
    <option <?php valgteKurs("matlagingskurs") ?> value="matlagingskurs">Matlagingskurs</option>
    <option <?php valgteKurs("sangkurs") ?> value="sangkurs">Sangkurs</option>
    <option <?php echo (isset($_POST['kursaktiviteter']) && in_array('sminkekurs' ,$_POST['kursaktiviteter'])) ? "selected" : "" ?> value="sminkekurs">Sminkekurs</option>
</select>
</div>
<h4>Medlemsopplysninger: </h4>
<div class="form-group">
 <label for="medlemsnr" class="disabled">Medlemsnummer: </label>
 <input type="text" id="medlemsnr" class="form-control" disabled placeholder=<?php echo $medlem['medlemsnr'] ?> >
</span>
</div>
<div class="form-group">
 <label for="kontigent" class="disabled">Kontigentstatus: </label>
 <input type="text" id="kontigent" class="form-control" disabled placeholder=<?php echo ucfirst($medlem['kontigent']) ?> >
</div>
<div class="form-group">
 <label for="innmeldt" class="disabled">Dato for innmelding: </label>
 <input type="text" id="innmeldt" class="form-control" disabled placeholder=<?php echo date("d.m.Y", strtotime($medlem['innmeldt'])) ?> >
</span>
</div>

<script>
    readOnly();
function readOnly(){
    var form = document.oppdater;
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].readOnly = true;
        }
    var radios = document.oppdater.kjonn;
    for (var i=0, len = radios.length; i < len; i++) {
        radios[i].disabled = true;
        } 
    var checkboxes = document.getElementById("sjekkbokser");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; i++) {
        elements[i].disabled = true;
        }
    var options = document.getElementById("kurs");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; i++) {
        options[i].disabled = true;
        }
}
function readAndWriteOnly(){
    var form = document.oppdater;
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
        elements[i].readOnly = false;
        }
    var radios = document.oppdater.kjonn;
    for (var i=0, len = radios.length; i < len; i++) {
        radios[i].disabled = false;
        } 
    var checkboxes = document.getElementById("sjekkbokser");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; i++) {
        elements[i].disabled = false;
        }
    var options = document.getElementById("kurs");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; i++) {
        options[i].disabled = false;
        }
}
function hide (elements) {
  elements = elements.length ? elements : [elements];
  for (var index = 0; index < elements.length; index++) {
    elements[index].style.display = 'none';
  }
}

function show() {
  elements = document.getElementById('submitButton');
  elements = elements.length ? elements : [elements];
  for (var index = 0; index < elements.length; index++) {
    elements[index].style.display = 'unset';
  }
}

function hideAndWritable(){
  show();
  hide(document.getElementById('endreButton'));
  readAndWriteOnly();
}

</script>
<div class="form-group" id="submitButton" style="visibility: none">
<button class="btn btn-primary btn-block" id="submitBtn" name="submit" style="background-color: green" type="submit">Lagre</button>
</div>
<div class="form-group">
<button type="button" id="endreButton" onclick=hideAndWritable() class="btn btn-primary btn-block">Endre</button> 
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>

<script>
hide(document.getElementById('submitButton'));
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
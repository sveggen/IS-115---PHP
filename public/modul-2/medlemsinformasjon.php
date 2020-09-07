<!-- Oppgave 5 -->
<?php 
$medlemsnummer = "238949824"; 
$medlemsiden = "10.05.2018"; 
$kontigentstatus = "Medlem"; 
$fornavn = "Konrad"; 
$etternavn = "Koenigsegg"; 
$fulltnavn = $fornavn . " " . $etternavn; 
$adresse = "Grovikveien 54";
$postnummer = 4635;
$poststed = "Kristiansand";
$land = "Norge";
$mobilnummer = "98121102"; 
$epost = "konrad18@uia.no"; 
$fødselsdato = "09.08.2006";
$kjønn = "Mann"; 
$interesser = array("Friluftsliv", "Trening", "Programmering", "Gaming");
$kursaktiviteter = array("Skredkurs", "Kurs i skiteknikk", "Klatrekurs");
$roller = array("Leder", "Kursarrangør");
?>

<html>
    <head>
        <title>Medlemsinformasjon</title>
        <link rel="stylesheet" href="/modul-2/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

<div class="w3-card">
<table class="w3-table">
<tr>
  <th><h3>Medlem</h3></th>
</tr>
<table class="w3-table">
<tr>
  <th>Navn</th>
  <th>Medlemsnummer</th>
  <th>Medlem siden</th>
  <th>Kontigentstatus</th>
</tr>
<tr>
  <td><?php echo $fulltnavn; ?></td>
  <td><?php echo $medlemsnummer; ?></td>
  <td><?php echo $medlemsiden; ?></td>
  <td><?php echo $kontigentstatus; ?></td>
</tr>
</table>
<hr width=100%”>
<table class="w3-table">
<tr>
  <th><h3>Personopplysninger</h3></th>
</tr>
</table>
<table class="w3-table">
<tr>
  <th>Mobilnummer</th>
  <th>Epost</th>
  <th>Kjønn</th>
  <th>Fødselsdato</th>
</tr>
<tr>
  <td><?php echo $mobilnummer; ?></td>
  <td><?php echo $epost; ?></td>
  <td><?php echo $kjønn; ?></td>
  <td><?php echo $fødselsdato; ?></td>
</tr>
</table>
<hr width=100%”>
<table class="w3-table">
<tr>
  <th><h3>Adresse</h3></th>
</tr>
</table>
<table class="w3-table">
<tr>
  <th>Adresse</th>
  <th>Postnummer</th>
  <th>Poststed</th>
  <th>Land</th>
</tr>
<tr>
<td><?php echo $adresse; ?></td>
  <td><?php echo $postnummer; ?></td>
  <td><?php echo $poststed; ?></td>
  <td><?php echo $land; ?></td>
</tr>
</table>
<hr width=100%”>
<table class="w3-table">
<tr>
  <th><h3>Diverse</h3></th>
</tr>
</table>
<table class="w3-table">
<tr>
  <th>Interesser</th>
  <th>Kursaktiviteter</th>
  <th>Roller</th>
</tr>
<tr>
<td><?php echo implode(", ", $interesser); ?></td>
  <td><?php echo implode(", ", $kursaktiviteter); ?></td>
  <td><?php echo implode(", ", $roller); ?></td>
</tr>
</table>
</div>
    </body>
</html>
<!-- Oppgave 1 -->
<?php
$alder =  $_POST['alder'];
$navn =  $_POST['navn'];
?>
<html>
    <head>
        <title>Navn og Alder</title>
        <link rel="stylesheet" href="/modul-2/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <h1>Navn og Alder</h1>
    <hr width=100%”>

    <form method="post" action="">
          <input name="navn" type="text" placeholder="Navn" class="form-control" style="width:20%">
	        <input name="alder" type="number" placeholder="Alder" min="1" class="form-control" style="width:10%">
	        <input name="submit" type="submit" value="Send inn" class="w3-circle w3-green">
	    </form>
        </div>

      <!-- Variabler inne i paragraf -->
      <p class="w3-wide">
        <?php echo "<b>Navn:</b> " . $navn . "</br> <b>Alder:</b> " . $alder; ?>
      </p>
      
      <!-- Variabler inne i tabell -->
      <table class="w3-table-all w3-card-4" style="width:50%">
        <tr>
          <th>Navn</th>
          <th>Alder</th>
        </tr>
        <tr>
          <td><?php echo $navn; ?></td>
          <td><?php echo $alder; ?></td>
        </tr>
      </table>
</br>
      <!-- Variabler inne i nummerert liste -->
      <ul class="w3-ul w3-card-4" style="width:50%">
      <ol type="1">
              <li><?php echo $navn; ?></li>
              <li><?php echo $alder; ?></li>
            </ol>
</ul>
</br>

<!-- Variabler inne i punktliste -->
<ul class="w3-ul w3-card-4" style="width:50%">
<ul style="list-style-type:disc;">
<li><?php echo $navn; ?></li>
  <li><?php echo $alder; ?></li>
</ul>
</ul>
</body>
</html>
<?php
$alder = 1;
$navn = "navn";
?>

<html>
    <head>
        <title>Dagens dato</title>
    </head>
    <body>
    <p>
<?php echo "Navn på medlem: " . $navn . " alder: " . $alder; ?>
</p>

<table style="25%">
<tr>
<th>Navn</th>
<th>Alder</th>
</tr>
<tr>
<td><?php echo $navn; ?></td>
<td><?php echo $alder; ?></td>
</tr>
</table>

<ol type="1">
  <li><?php echo $navn; ?></li>
  <li><?php echo $alder; ?></li>
</ol>


<ul style="list-style-type:disc;">
<li><?php echo $navn; ?></li>
  <li><?php echo $alder; ?></li>
</ul>


</body>
</html>
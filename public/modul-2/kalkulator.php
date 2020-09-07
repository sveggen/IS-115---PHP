<!-- Oppgave 2 -->
<html>
    <head>
        <title>Kalkulator</title>
        <link rel="stylesheet" href="/modul-2/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <body>
        <h1>Kalkulator</h1>
        <hr width=100%”>

<form method="post" action="">
            <input name="første" type="text" class="form-control" style="width:10%">
            
	        <select name="operator">
	        	<option value="pluss">pluss</option>
	            <option value="minus">minus</option>
	            <option value="gjenomsnitt">gjenomsnitt</option>
	        </select>
	        <input name="andre" type="text" class="form-control" style="width:10%">
	        <input name="submit" type="submit" value="Kalkuler" class="w3-circle w3-green">
	    </form>
        </div>

<?php
$første = $_POST['første'];
$andre = $_POST['andre'];
$operator = $_POST['operator'];
$result = '';
if (isset($_POST['submit']) && is_numeric($_POST['første']) && is_numeric($_POST['andre'])){
    switch ($operator){
        case "pluss":
            $result= $første + $andre;
            echo "<p>{$_POST['første']} {$_POST['operator']} {$_POST['andre']} er lik " . $result . "</p>";
            break;
        case "minus":
            $result = $første - $andre;
            echo "<p>{$_POST['første']} {$_POST['operator']} {$_POST['andre']} er lik " . $result . "</p>";
            break;
        case "gjenomsnitt":
            $result = ($første + $andre) / 2;
            echo "<p> {$_POST['operator']}et av {$_POST['første']} og {$_POST['andre']} er " . $result . "</p>";
            break;
    }
}
?>
</body>
</html>
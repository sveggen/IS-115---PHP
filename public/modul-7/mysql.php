<?php
# Definerer konstanter for å koble til databasen /
define('MYSQL_VERT', 'db');
define('MYSQL_BRUKER', 'root');
define('MYSQL_PASSORD', 'BSBACIT2020');
define('MYSQL_DB', 'ergotests');

# Kobler til database med oppkoblingsdata 
$connection = new mysqli(MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB);
if ($connection->connect_error) {
    die('Tilkoblingen til databasen feilet. Vennligst forsøk igjen senere.');
    exit();
}

$sql = "SELECT * FROM Members WHERE paid = ? ORDER BY ? DESC LIMIT ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("isi", $paid, $sort, $limit);

$paid = 0;
$sort = "lastname";
$limit = 1;
$stmt->execute();
$result = $stmt->get_result();


?>

<html>

<head>
    <title>Medlemmer</title>
</head>

<body>
    <!-- Lager en tabell som viser medlemmene i databasen -->
    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
        </tr>
        <?php
        # Henter en rad om gangen fra databasen (dvs. ett og ett medlem)
        # Det legges til ett <tr>-element for hvert nytt medlem

        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $row['memberid']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
            </tr>
        <?php
        }
        # Lukk spørring 
        $stmt->close();
        ?>
    </table>
    <?php
    # Avslutt databasetilkobling
    $connection->close();
    ?>

</body>

</html>
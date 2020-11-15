<!-- Oppgave 2 -->
<?php

require_once "models/ActivitiesModel.php";
include './include/header.inc.php';

$title = "Activities";

?>

<h1>Activities</h1>

<?php

$model = new ActivitiesModel();
$array = $model->getAllFutureActivities();

foreach ($array as $row) {
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Activity-ID</th>
            <th scope="col">Activity</th>
            <th scope="col">Responsible</th>
            <th scope="col">Start-time</th>
            <th scope="col">End-time</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $row['activityid']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['leader']; ?></td>
            <td><?php echo $row['start']; ?></td>
            <td><?php echo $row['end']; ?></td>
        </tr>
    </table>
    <?php
}
?>
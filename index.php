<?php
require 'TopicData.php';
require 'table.php';
//require 'tbBuild.php';

//********************************************************
// The tables available are:
// scouts
// parents
// badges
// adventures
// activities
// tasks
// subTasks
//********************************************************
?>

<head>
    <link rel="stylesheet" href="style.css">	
</head>

<?php
$topics = array();
$table = 'badges';
$constraint = "badge = 'wolf'";
$data = new TopicData();
$data->connect();

?>
<!--Fill in location for form to be sent once it is determined-->
<form action="index.php" method="post">
   <legend><span class="legend">Select the badge you want to view.</span></legend>
    <fieldset>
       
        <input type="radio" name="bobcat" id="bobcat">
        <label for='bobcat'>Bobcat</label>

        <input type="radio" id='tiger' name="tiger">
        <label for='tiger'>Tiger</label>

        <input type="radio" id='wolf' name="wolf">
        <label for='wolf'>Wolf</label>

        <input type="radio" id='bear' name="bear">
        <label for='bear'>Bear</label>

        <input type="radio" id="webelo" name="webelo">
        <label for='webelo'>Webelo</label>

        <input type="radio" id='arrow' name='arrow'>
        <label for='arrow'>Arrow of Light</label>

        <input type="submit" >
        
    </fieldset>
</form>
<?php
//    print_r($_POST);
$tbl = array_keys($_POST);
$const = $tbl[0];
$constraint = "badge = '$const'";


$topics = $data->getAllTopics($table, $constraint);

//print_r($topics);
//Table Columns

$col = $data->getColumns($table);
$column = '<tr>';
foreach ($col as $c) {
    $column .= '<th>' . $c . '</th>';
}
$column .= '</tr>';

$t = '';
foreach ($topics as $topic) {
    $t .= '<tr>';
    foreach ($topic as $scout) {
        $t .= '<td>' . $scout . '</td>';
    }
    $t .= '</tr>';
}



// build logic for entire table

// determine badge


// get adventure 

// for each adventure, get activity

// for each activity, get task

// for each task, get sub-task

//display badge, adventure, activity, task, subtask.

?>

<!--Display below here-->

<table>	<?php echo "<table>$column $t</table>";
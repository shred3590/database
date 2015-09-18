<?php

require './TopicData.php';

class Table extends TopicData {

	// Table names

	// badges
	// activities
	// tasks
	// subtasks
	// scouts
	// tracker

	public $badge;
	public $x;
		
	public function getBadgeID($badge) {
		$this->badge = new Table();

		// connect to database

		$this->badge->connect();

		// select badge specific information

		$x = $this->badge->getAlltopics('badges', "badges = $badge");
//		$id = $x[0];
		return $x;
	}
	
}
// list all options and sub options

$a = new Table;
$a->getBadgeID('bobcat');
foreach ($a as $b) {
	echo $b . '<br>';
}
echo '<br>';
var_dump($a);
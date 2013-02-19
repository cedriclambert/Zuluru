<?php
$this->Html->addCrumb (__('Players', true));
$this->Html->addCrumb ($person['Person']['full_name']);
$this->Html->addCrumb (__('Team History', true));
?>

<div class="teams index">
<h2><?php echo __('Team History', true) . ': ' . $person['Person']['full_name'];?></h2>

<?php
$rows = array();
$last_year = null;
foreach ($teams as $team) {
	$year = date ('Y', strtotime ($team['Division']['open']));
	if ($last_year != $year) {
		$last_year = $year;
	} else {
		$year = null;
	}
	$rows[] = array($year,
			$this->element('teams/block', compact('team')),
			$team['TeamsPerson']['role'],
			$this->Html->link ($team['Division']['full_league_name'], array('controller' => 'divisions', 'action' => 'view', 'division' => $team['Division']['id'])),
	);
}
echo $this->Html->tag ('table', $this->Html->tableCells ($rows), array('class' => 'list'));
?>

</div>

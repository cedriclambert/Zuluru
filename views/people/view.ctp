<?php
$this->Html->addCrumb (__('Players', true));
$this->Html->addCrumb ($person['full_name']);
$this->Html->addCrumb (__('View', true));
?>

<div class="people view">
<h2><?php
if (!empty($photo)) {
	echo $this->element('people/player_photo', array('person' => $person, 'upload' => $photo['Upload']));
}
echo $person['full_name'];
$view_contact = $is_me || $is_admin || $is_manager || $is_coordinator || $is_captain || $is_my_captain || $is_my_coordinator || $is_division_captain;
?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<?php if ($is_me || $is_admin):?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('System User Name'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $person['user_name']; ?>

			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Website User Id'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $person['id']; ?>

			</dd>
		<?php endif; ?>
		<?php if ($view_contact || ($is_logged_in && $person['publish_email'])):?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email Address'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php
				echo $this->Html->link($person['email'], "mailto:{$person['email']}");
				echo ' (' . __($person['publish_email'] ? 'published' : 'private', true) . ')';
				?>

			</dd>
		<?php endif; ?>
		<?php if (Configure::read('profile.home_phone') && !empty($person['home_phone']) &&
					($view_contact || ($is_logged_in && $person['publish_home_phone']))):?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone (home)'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php
				echo $person['home_phone'];
				echo ' (' . __($person['publish_home_phone'] ? 'published' : 'private', true) . ')';
				?>

			</dd>
		<?php endif; ?>
		<?php if (Configure::read('profile.work_phone') && !empty($person['work_phone']) &&
					($view_contact || ($is_logged_in && $person['publish_work_phone']))):?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone (work)'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php
				echo $person['work_phone'];
				if (!empty($person['work_ext'])) {
					echo ' x' . $person['work_ext'];
				}
				echo ' (' . __($person['publish_work_phone'] ? 'published' : 'private', true) . ')';
				?>

			</dd>
		<?php endif; ?>
		<?php if (Configure::read('profile.mobile_phone') && !empty($person['mobile_phone']) &&
					($view_contact || ($is_logged_in && $person['publish_mobile_phone']))):?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone (mobile)'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php
				echo $person['mobile_phone'];
				echo ' (' . __($person['publish_mobile_phone'] ? 'published' : 'private', true) . ')';
				?>

			</dd>
		<?php endif; ?>
		<?php if ($is_me || $is_admin):?>
			<?php if (Configure::read('profile.addr_street')): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Address'); ?></dt>
			<dd<?php if ($i % 2 == 0) echo $class;?>>
				<?php echo $person['addr_street']; ?>

			</dd>
			<?php endif; ?>
			<?php if (Configure::read('profile.addr_city') || Configure::read('profile.addr_prov') || Configure::read('profile.addr_country')): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>>&nbsp;</dt>
			<dd<?php if ($i % 2 == 0) echo $class;?>>
				<?php
				$addr = array();
				if (Configure::read('profile.addr_city')) {
					$addr[] = $person['addr_city'];
				}
				if (Configure::read('profile.addr_city')) {
					$addr[] = __($person['addr_prov'], true);
				}
				if (Configure::read('profile.addr_city')) {
					$addr[] = __($person['addr_country'], true);
				}
				echo implode(', ', $addr);
				?>

			</dd>
			<?php endif; ?>
			<?php if (Configure::read('profile.addr_postalcode')): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>>&nbsp;</dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $person['addr_postalcode']; ?>

			</dd>
			<?php endif; ?>
			<?php if (Configure::read('profile.birthdate')): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Birthdate'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->ZuluruTime->date($person['birthdate']); ?>
				&nbsp;
			</dd>
			<?php endif; ?>
		<?php endif; ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gender'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php __($person['gender']); ?>

		</dd>
		<?php if ($is_me || $is_admin || $is_coordinator || $is_captain):?>
			<?php if (Configure::read('profile.height')): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Height'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $person['height'] . ' ' . __('inches', true); ?>

			</dd>
			<?php endif; ?>
			<?php if (Configure::read('profile.shirt_size')): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Shirt Size'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php __($person['shirt_size']); ?>

			</dd>
			<?php endif; ?>
		<?php endif; ?>
		<?php if (Configure::read('profile.skill_level') && !empty ($person['skill_level'])):?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Skill Level'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php __(Configure::read("options.skill.{$person['skill_level']}")) ; ?>

		</dd>
		<?php endif; ?>
		<?php if ($is_logged_in && !empty ($person['skill_level'])):?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Year Started'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $person['year_started']; ?>

			</dd>
		<?php endif; ?>
		<?php if ($is_me || $is_admin):?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Account Class'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php __($group['name']); ?>

			</dd>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Account Status'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php __($person['status']); ?>

			</dd>
			<?php if (Configure::read('feature.dog_questions')):?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Has Dog'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php __($person['has_dog'] ? 'yes' : 'no'); ?>

			</dd>
			<?php endif; ?>
			<?php if (Configure::read('profile.willing_to_volunteer')): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Willing To Volunteer'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php __($person['willing_to_volunteer'] ? 'yes' : 'no'); ?>

			</dd>
			<?php endif; ?>
			<?php if (Configure::read('profile.contact_for_feedback')): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Contact For Feedback'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php __($person['contact_for_feedback'] ? 'yes' : 'no'); ?>

			</dd>
			<?php endif; ?>
		<?php endif; ?>
		<?php if (!empty($note)): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Private Note'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $note['Note']['note']; ?>

			</dd>
		<?php endif; ?>
	</dl>
</div>
<div class="actions">
	<ul>
		<?php
		if ($is_logged_in && Configure::read('feature.annotations')) {
			if (!empty($note)) {
				echo $this->Html->tag ('li', $this->Html->link(__('Delete Note', true), array('action' => 'delete_note', 'person' => $person['id'])));
				$link = 'Edit Note';
			} else {
				$link = 'Add Note';
			}
			echo $this->Html->tag ('li', $this->Html->link(__($link, true), array('action' => 'note', 'person' => $person['id'])));
		}
		if ($is_me || $is_admin) {
			echo $this->Html->tag ('li', $this->Html->link(__('Edit Profile', true), array('action' => 'edit', 'person' => $person['id'], 'return' => true)));
			echo $this->Html->tag ('li', $this->Html->link(__('Edit Preferences', true), array('action' => 'preferences', 'person' => $person['id'])));
		}
		if ($is_admin) {
			echo $this->Html->tag ('li', $this->Html->link(__('Delete Player', true), array('action' => 'delete', 'person' => $person['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $person['id'])));
		}
		?>
	</ul>
</div>

<?php if ($is_logged_in):?>
<div class="related">
	<h3><?php __('Teams');?></h3>
	<?php if (!empty($teams)):?>
	<table class="list">
	<?php
		$i = 0;
		foreach ($teams as $team):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php
			echo $this->element('people/roster_role', array('roster' => $team['TeamsPerson'], 'division' => $team['Division'])) .
				' ' . __('on', true) . ' ' .
				$this->element('teams/block', array('team' => $team['Team'])) .
				' (' . $this->element('divisions/block', array('division' => $team['Division'], 'field' => 'long_league_name')) . ')';
			if (!empty($team['Team']['division_id'])) {
				Configure::load("sport/{$team['Division']['League']['sport']}");
				$positions = Configure::read('sport.positions');
				if (!empty($positions)) {
					echo ' (' . $this->element('people/roster_position', array('roster' => $team['TeamsPerson'], 'division' => $team['Division'])) . ')';
				}
			}
			?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Show Team History', true), array('controller' => 'people', 'action' => 'teams', 'person' => $person['id'])); ?> </li>
		</ul>
	</div>
</div>

	<?php if (Configure::read('feature.badges') && !empty($badges['Badge'])): ?>
<div class="related">
	<h3><?php __('Badges');?></h3>
	<p><?php
	foreach ($badges['Badge'] as $badge) {
		echo $this->ZuluruHtml->iconLink("{$badge['icon']}_64.png", array('controller' => 'badges', 'action' => 'view', 'badge' => $badge['id']),
			array('alt' => $badge['name'], 'title' => $badge['description']));
	}
	?></p>
	<?php endif; ?>
<?php endif; ?>

<?php if (!empty($divisions)):?>
<div class="related">
	<h3><?php __('Divisions');?></h3>
	<table class="list">
	<?php
		$i = 0;
		foreach ($divisions as $division):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo __(Configure::read("options.division_position.{$division['DivisionsPerson']['position']}"), true) . ' ' . __('of', true) . ' ' .
					$this->element('divisions/block', array('division' => $division['Division'], 'field' => 'long_league_name'));?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php endif; ?>

<?php if (Configure::read('scoring.allstars') && ($is_admin || $is_coordinator)):?>
<div class="related">
	<h3><?php __('Allstar Nominations');?></h3>
	<?php if (!empty($allstars)):?>
	<table class="list">
	<tr>
		<th><?php __('Date'); ?></th>
		<th><?php __('Home Team'); ?></th>
		<th><?php __('Away Team'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($allstars as $allstar):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link($this->ZuluruTime->datetime("{$allstar['GameSlot']['game_date']} {$allstar['GameSlot']['game_start']}"), array('controller' => 'games', 'action' => 'view', 'game' => $allstar['Game']['id']));?></td>
			<td><?php echo $this->element('teams/block', array('team' => $allstar['HomeTeam'])); ?></td>
			<td><?php echo $this->element('teams/block', array('team' => $allstar['AwayTeam'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'allstars', 'action' => 'delete', 'allstar' => $allstar['Allstar']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $allstar['Allstar']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php if (Configure::read('feature.registration')):?>
<?php if ($is_admin || ($is_me && !empty($preregistrations))):?>
<div class="related">
	<h3><?php __('Preregistrations');?></h3>
	<?php if (!empty($preregistrations)):?>
	<table class="list">
	<tr>
		<th><?php __('Event'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($preregistrations as $preregistration):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link($preregistration['Event']['name'], array('controller' => 'events', 'action' => 'view', 'event' => $preregistration['Event']['id']));?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'preregistrations', 'action' => 'delete', 'prereg' => $preregistration['Preregistration']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $preregistration['Preregistration']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<?php if ($is_admin):?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Add Preregistration', true), array('controller' => 'preregistrations', 'action' => 'add', 'person' => $person['id']));?> </li>
		</ul>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php if (($is_admin || $is_me) && !empty($registrations)):?>
<div class="related">
	<h3><?php __('Recent Registrations');?></h3>
	<table class="list">
	<tr>
		<th><?php __('Event'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Payment'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($registrations as $registration):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link($registration['Event']['name'], array('controller' => 'events', 'action' => 'view', 'event' => $registration['Event']['id']));?></td>
			<td><?php echo $this->ZuluruTime->date($registration['Registration']['created']);?></td>
			<td><?php __($registration['Registration']['payment']);?></td>
			<td class="actions">
			<?php if ($is_admin): ?>
				<?php echo $this->Html->link(__('View', true), array('controller' => 'registrations', 'action' => 'view', 'registration' => $registration['Registration']['id']));?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'registrations', 'action' => 'edit', 'registration' => $registration['Registration']['id'], 'return' => true)); ?>
			<?php endif; ?>
				<?php echo $this->Html->link(__('Unregister', true), array('controller' => 'registrations', 'action' => 'unregister', 'registration' => $registration['Registration']['id'], 'return' => true), null, sprintf(__('Are you sure you want to delete # %s?', true), $registration['Registration']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Show Registration History', true), array('controller' => 'people', 'action' => 'registrations', 'person' => $person['id'])); ?> </li>
		</ul>
	</div>
</div>
<?php endif; ?>
<?php endif; ?>

<?php if (($is_admin || $is_me) && !empty($waivers)):?>
<div class="related">
	<h3><?php __('Waivers');?></h3>
	<table class="list">
	<tr>
		<th><?php __('Waiver');?></th>
		<th><?php __('Signed');?></th>
		<th><?php __('Valid From');?></th>
		<th><?php __('Valid Until');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($waivers as $waiver):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $waiver['Waiver']['name']; ?></td>
			<td><?php echo $this->ZuluruTime->fulldate($waiver['WaiversPerson']['created']); ?></td>
			<td><?php echo $this->ZuluruTime->fulldate($waiver['WaiversPerson']['valid_from']); ?></td>
			<td><?php echo $this->ZuluruTime->fulldate($waiver['WaiversPerson']['valid_until']); ?></td>
			<td class="actions"><?php echo $this->ZuluruHtml->iconLink('view_24.png', array('controller' => 'waivers', 'action' => 'review', 'waiver' => $waiver['Waiver']['id'], 'date' => $waiver['WaiversPerson']['valid_from'])); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Show Waiver History', true), array('controller' => 'people', 'action' => 'waivers', 'person' => $person['id'])); ?> </li>
		</ul>
	</div>
</div>
<?php endif; ?>

<?php if (Configure::read('feature.documents') && ($is_admin || $is_me)):?>
<div class="related">
	<h3><?php __('Documents');?></h3>
<?php if (!empty($documents)): ?>
	<table class="list">
	<tr>
		<th><?php __('Document'); ?></th>
		<th><?php __('Valid From'); ?></th>
		<th><?php __('Valid Until'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($documents as $document):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			$rand = 'row_' . mt_rand();
		?>
		<tr<?php echo $class;?> id="<?php echo $rand; ?>">
			<td><?php echo $document['UploadType']['name'];?></td>
<?php if ($document['Upload']['approved']): ?>
			<td><?php echo $this->ZuluruTime->date($document['Upload']['valid_from']);?></td>
			<td><?php echo $this->ZuluruTime->date($document['Upload']['valid_until']);?></td>
<?php else: ?>
			<td colspan="2" class="highlight"><?php __('Unapproved');?></td>
<?php endif; ?>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('action' => 'document', 'id' => $document['Upload']['id']), array('target' => 'preview'));?>
<?php if ($is_admin):?>
<?php if ($document['Upload']['approved']): ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit_document', 'id' => $document['Upload']['id'], 'return' => true));?>
<?php else: ?>
				<?php echo $this->Html->link(__('Approve', true), array('action' => 'approve_document', 'id' => $document['Upload']['id'], 'return' => true));?>
<?php endif; ?>
<?php endif; ?>
				<?php echo $this->Js->link (__('Delete', true),
					array('action' => 'delete_document', 'id' => $document['Upload']['id'], 'row' => $rand),
					array('update' => "#temp_update", 'confirm' => sprintf(__('Are you sure you want to delete # %s?', true), $document['Upload']['id']))); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Upload New Document', true), array('action' => 'document_upload', 'person' => $person['id'])); ?> </li>
		</ul>
	</div>
</div>
<?php endif; ?>

<?php if (($is_admin || $is_me) && !empty($tasks)):?>
	<div class="related">
<h3><?php __('Assigned Tasks'); ?></h3>
<table class="list">
<tr>
	<th><?php __('Task'); ?></th>
	<th><?php __('Time'); ?></th>
	<th><?php __('Report To'); ?></th>
</tr>
<?php
$i = 0;
foreach ($tasks as $task):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td class="splash_item"><?php
			echo $this->Html->link($task['Task']['name'], array('controller' => 'tasks', 'action' => 'view', 'task' => $task['Task']['id']));
		?></td>
		<td class="splash_item"><?php
		echo $this->ZuluruTime->day($task['TaskSlot']['task_date']) . ', ' .
					$this->ZuluruTime->time($task['TaskSlot']['task_start']) . '-' .
					$this->ZuluruTime->time($task['TaskSlot']['task_end'])
		?></td>
		<td class="splash_item"><?php
		echo $this->element('people/block', array('person' => $task['Task']));
		?></td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php endif; ?>

<?php if (!empty($teams)) echo $this->element('people/roster_div'); ?>

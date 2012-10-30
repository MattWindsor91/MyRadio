<?php

require 'Views/MyURY/Scheduler/bootstrap.php';

$tabledata = array();
foreach ($demos as $demo) {
  $demo['join'] = '<a href="'.CoreUtils::makeURL('Scheduler', 'attendDemo', array('demoid' => $demo['show_season_timeslot_id'])).'">Join</a>';
  $tabledata[] = $demo;
}
//print_r($tabledata);
$twig->setTemplate('table.twig')
        ->addVariable('title', 'Upcoming Demo Slots')
        ->addVariable('tabledata', $tabledata)
        ->addVariable('tablescript', 'myury.scheduler.demolist');
if (isset($_REQUEST['msg'])) {
  switch($_REQUEST['msg']) {
    case 0: //joined
      $twig->addInfo('You have successfully been added to this demo.');
      break;
    case 1: //full
      $twig->addError('Sorry, but a maximum two people can join a demo.');
      break;
  }
}

$twig->render();
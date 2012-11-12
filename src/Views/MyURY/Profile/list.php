<?php
/**
 * 
 * @todo Proper Documentation
 * @author Lloyd Wallis <lpw@ury.org.uk>
 * @version 21072012
 * @package MyURY_Profile
 */
require 'Views/MyURY/Profile/bootstrap.php';

foreach ($members as $k => $v) {
  $members[$k]['name'] = array(
      'display' => 'text',
      'url' => CoreUtils::makeURL('Profile', 'default', array('memberid' => $v['memberid'])),
      'value' => $v['name']
      );
}

$twig->setTemplate('table.twig')
        ->addVariable('tablescript', 'myury.profile.list')
        ->addVariable('heading', 'Members List')
        ->addVariable('tabledata', $members)
        ->render();
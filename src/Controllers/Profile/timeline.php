<?php
/**
 * 
 * @todo Proper Documentation
 * @todo Permissions
 * @author Lloyd Wallis <lpw@ury.org.uk>
 * @version 21072012
 * @package MyURY_Profile
 */
$data = User::getInstance(isset($_GET['memberid']) ? $_GET['memberid'] : $_SESSION['memberid'])->getTimeline();
require 'Views/Profile/timeline.php';
<?php
/**********************************************
 * Module jsjobs last resume with photos
 */
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once(dirname(__FILE__).DS.'helper.php');

$resumeCount = $params->get('resumecount');
$items = ModLastResumesHelper::getItems($resumeCount);
$loadJQuery = $params->get('load_JQuery');

//print_r($items);
require(JModuleHelper::getLayoutPath('mod_lastresumephotos'));
?>

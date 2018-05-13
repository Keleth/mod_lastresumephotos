<?php defined('_JEXEC') or die('Restricted access');
/**
 * Created by PhpStorm.
 * User: Danila Shkerin
 * Date: 25.10.16
 * Time: 19:21
 */

$document =& JFactory::getDocument();
$document->addStyleSheet(JURI::base()."/modules/mod_lastresumephotos/css/modlastresume.css");
if ($loadJQuery == 1) {
    $document->addScript(JURI::base() . 'modules/mod_lastresumephotos/js/jquery-1.4.2.min.js');
}


?>

<div class="mod-last-photos-block">
<ul>
    <?php

    $ttl = 1;
    $size = count($items);
    foreach ($items as $item) { ?>
        <li>
            <?php $link = 'index.php?option=com_jsjobs&c=jsjobs&view=jobseeker&layout=view_resume&vm=3&rd='.$item->id.'&bd=0&Itemid=';
            if (isset($_SESSION['Itemid'])) {
                $link.= $_SESSION['Itemid'];
            } ?>
            <a href="<?php echo JRoute::_($link); ?>">
                <img src="/jsjobsdata/data/jobseeker/resume_<?php echo $item->id; ?>/photo/<?php echo $item->photo; ?>" width="138" height="180">
                <span>
                    <?php if (!empty($item->application_title)) {
                        echo strip_tags($item->application_title);
                        echo "<br />";
                    } ?>
                    <?php if (!empty($item->resume)) {
                        echo strip_tags($item->resume);
                    } else {
                        echo strip_tags($item->last_name);
                    }?>
                </span>
            </a>
        </li>
        <?php
        $ttl ++;
    } ?>
</ul>
</div>

<script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function() {
        jQuery('div.mod-last-photos-block ul li').hover(function(){
            jQuery(this).find('img').animate({top:'160px'},{queue:false,duration:500});
        }, function() {
            jQuery(this).find('img').animate({top:'0px'},{queue:false,duration:500});
        });
    });
</script>

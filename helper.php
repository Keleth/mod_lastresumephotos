<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

class ModLastResumesHelper
{
    /**
     * Returns a list of post items
     */
    public static function getItems($resumeCount)
    {
        if (!is_numeric($resumeCount)) {
            return null;
        }

        $db = &JFactory::getDBO();

        $query = 'SELECT a.id, a.uid, a.photo, a.resume, a.created, a.skills, a.application_title  FROM `#__js_job_resume` AS a
                  where a.photo is not null AND a.photo != \'\'
                  ORDER BY a.created desc LIMIT ' . $resumeCount;

        $db->setQuery($query);
        $items = ($items = $db->loadObjectList()) ? $items:array();

        return $items;
    }

}
?>

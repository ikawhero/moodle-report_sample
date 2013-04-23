<?php
/**
 * Sample report
 *
 * Navigation and settings
 *
 * @package    report
 * @subpackage sample
 * @author     Shane Elliott <shane@pukunui.com>
 * @copyright  2013 #mootnz13
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

$ADMIN->add('reports', new admin_externalpage('reportsample', get_string('pluginname', 'report_sample'),
                                              "$CFG->wwwroot/report/sample/index.php",'report/sample:view'));

// No report settings.
$settings = null;

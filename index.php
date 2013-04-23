<?php
/**
 * Sample report
 *
 * @package    report
 * @subpackage sample
 * @author     Shane Elliott <shane@pukunui.com>
 * @copyright  2013 #mootnz13
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

// Required files.
require_once('../../config.php');

// Check permissions.
$context = context_system::instance();
require_login();
require_capability('report/sample:view', $context);

// Set up the page.
$url = new moodle_url('/report/sample/index.php');
$title = get_string('title', 'report_sample');
$PAGE->set_url($url);
$PAGE->set_context($context);
$PAGE->set_title($title);
$PAGE->set_pagelayout('report');
$PAGE->set_heading($title);

// Output to browser.
echo $OUTPUT->header();
echo $OUTPUT->heading($title);

echo "Hello World";

echo $OUTPUT->footer();

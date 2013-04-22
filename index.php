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

// Set up the page.
$context = context_system::instance();
$url = new moodle_url('/report/sample/index.php');
$title = 'Sample Report';
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

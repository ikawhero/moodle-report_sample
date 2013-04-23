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
require_once('./index_form.php');

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

$sampleform = new sampleform();

if ($data = $sampleform->get_data()) {
    $datefrom = $data->startdate;
    $dateto = $data->enddate + 86400;
    $sql = "SELECT p.id, p.discussion, p.subject, p.userid, u.firstname, u.lastname
            FROM {forum_posts} p
            JOIN {user} u ON u.id=p.userid
            WHERE p.created > $datefrom
              AND p.created < $dateto";
    if ($records = $DB->get_records_sql($sql)) {
        // Do nothing for now.
    }
}

// Output to browser.
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('searchforusers', 'report_sample'));

echo $OUTPUT->box(get_string('searchdescription', 'report_sample'));

$sampleform->display();

if (!empty($records)) {
    print_object($records);
}

echo $OUTPUT->footer();


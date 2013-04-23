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
require_once($CFG->libdir.'/tablelib.php');

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
    $sql = "SELECT p.id, p.created, p.discussion, p.subject, p.userid, u.firstname, u.lastname
            FROM {forum_posts} p
            JOIN {user} u ON u.id=p.userid
            WHERE p.created > $datefrom
              AND p.created < $dateto";
    if ($records = $DB->get_records_sql($sql)) {
        $table = new flexible_table('report-sample-display');
        $table->define_baseurl($url);
        $table->define_columns(array('fullname', 'date', 'post'));
        $tableheaders = array(
                get_string('fullname'),
                get_string('date'),
                get_string('forumpost', 'report_sample')
                );
        $table->define_headers($tableheaders);
        $table->set_attribute('cellspacing', '0');
        $table->set_attribute('align', 'center');
        $table->column_style_all('text-align', 'left');
    }
}

// Output to browser.
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('searchforusers', 'report_sample'));

echo $OUTPUT->box(get_string('searchdescription', 'report_sample'));

$sampleform->display();

if (!empty($table)) {
    $table->setup();
    foreach ($records as $rec) {
        $link = "<a href=\"$CFG->wwwroot/mod/forum/discuss.php?d=$rec->discussion#p$rec->id\">$rec->subject</a>";
        $user = "<a href=\"$CFG->wwwroot/user/profile.php?id=$rec->userid\">".fullname($rec).'</a>';
        $table->add_data(array($user, userdate($rec->created), $link));
    }
    $table->print_html();
}

echo $OUTPUT->footer();


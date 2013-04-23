<?php
/**
 * Sample report
 *
 * Form definition
 *
 * @package    report
 * @subpackage sample
 * @author     Shane Elliott <shane@pukunui.com>
 * @copyright  2013 #mootnz13
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

require_once($CFG->libdir.'/formslib.php');

class sampleform extends moodleform {

    /**
     * Form definition
     */
    public function definition() {

        $mform =& $this->_form;
    
        $strrequired = get_string('required');

        $mform->addElement('date_selector', 'startdate', get_string('datefrom', 'report_sample'));
        $mform->setType('startdate', PARAM_INT);
        $mform->addRule('startdate', $strrequired, 'required', '', 'client');
        $mform->addElement('date_selector', 'enddate', get_string('dateto', 'report_sample'));
        $mform->setType('enddate', PARAM_INT);
        $mform->addRule('enddate', $strrequired, 'required', '', 'client');

        $this->add_action_buttons(true, get_string('search', 'report_sample'));

    }

    public function validation($data, $files) {
        $errors = parent::validation($data, $files);

        if ($data['enddate'] < $data['startdate']) {
            $errors['enddate'] = get_string('error_enddate', 'report_sample');
        }

        return $errors;
    }
}


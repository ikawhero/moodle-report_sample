<?php
/**
 * Sample report
 *
 * Capability definitions
 *
 * @package    report
 * @subpackage sample
 * @author     Shane Elliott <shane@pukunui.com>
 * @copyright  2013 #mootnz13
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'report/sample:view' => array(
        'riskbitmask' => RISK_CONFIG,
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    )
);


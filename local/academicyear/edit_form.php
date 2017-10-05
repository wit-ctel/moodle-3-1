<?php

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');
require_once($CFG->libdir.'/completionlib.php');

class academicyear_edit_form extends moodleform {
    protected $course;
    protected $context;

    function definition() {
        global $USER, $CFG, $DB;

        $mform    = $this->_form;

        $course   = $this->_customdata['course'];
        $academicyears = $this->_customdata['academicyears'];
        $contextid = $this->_customdata['contextid'];
        
        // hidden fields
        $mform->addElement('hidden', 'contextid', null);
        $mform->setType('contextid', PARAM_INT);
        $mform->setConstant('contextid', $contextid);
        
        $mform->addElement('hidden', 'id', null);
        $mform->setType('id', PARAM_INT);
        $mform->setConstant('id', $course->id);
        
        foreach ($academicyears as $id => $academicyearinfo) {
            $mform->addElement('checkbox', $id, $academicyearinfo->title);
        }
        
        $this->add_action_buttons();
    }
    
    
    
}
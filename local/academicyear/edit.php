<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
 
 
/**
 * Edit course academic year
 *
 *
 * @package    local
 * @subpackage academicyear
 * @copyright  2013 Cathal O'Riordan
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . '/../../config.php');
require_once('edit_form.php');
require_once('lib.php');

$contextid = required_param('contextid',PARAM_INT);

$PAGE->set_pagelayout('admin');

list($context, $course, $cm) = get_context_info_array($contextid);

require_login($course, false, $cm);
require_capability('moodle/site:config', $context);

$contextname = $context->get_context_name();

$PAGE->set_context($context);

$args = array('contextid'=>$contextid);
$baseurl = new moodle_url('/local/academicyear/edit.php', $args);
$PAGE->set_url($baseurl, $args);

$academicyears = local_academicyear_available_academic_years();

$mform = new academicyear_edit_form(NULL, array('course'=>$course, 'academicyears' => $academicyears, 'contextid'=>$contextid));

$toform = local_academicyear_get_academic_years($course);

if ($mform->is_cancelled()) {
    redirect($context->get_url());
} else if ($data = $mform->get_data()) {
    $data = (array) $data;
    
    $yearids = array();
    
    foreach ($academicyears as $year => $academicyearinfo) {
        if (isset($data[$academicyearinfo->id])) {
            $yearids[] = $academicyearinfo->id;
        }
    }  
    
    local_academicyear_set_academic_years($course, $yearids);
    redirect($context->get_url());
}

// Print the form
$editacademicyear = get_string('editacademicyearin','local_academicyear', $contextname);

if (!empty($course->id)) {
    $title = $editacademicyear;
    $fullname = $course->fullname;
} 

$PAGE->set_cacheable(false);
$PAGE->set_title($title);
$PAGE->set_heading($fullname);

echo $OUTPUT->header();
echo $OUTPUT->heading($editacademicyear);

$mform->set_data($toform);
$mform->display();

echo $OUTPUT->footer();



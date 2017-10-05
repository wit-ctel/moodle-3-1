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
 * academic_year set current year
 *
 * @package    block_academic_year
 * @copyright  2013 Cathal O'Riordan, WIT <caoriordan@wit.ie>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__).'/../../config.php');

$academicyearid = required_param('academicyear', PARAM_INT);

require_login();

// Load academic year
$academicyear = $DB->get_record('local_academicyear', array('id' => $academicyearid), '*', MUST_EXIST);
$SESSION->academic_year_id = $academicyear->id;

if (empty($CFG->academic_year_id)) {
    $CFG->academic_year_id = $SESSION->academic_year_id;
}

redirect($CFG->wwwroot.'/my');
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
 * This is a one-line short description of the file.
 *
 *
 * @package    local
 * @category   academicyear
 * @copyright  2016 Cathal O'Riordan
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/**
 * Event handler for academic year plugin.
 *
 * When a course is created, associate it with an academic year;
 * lmb enrolment plugin injects a 'term' value into the course idnumber field,
 * we use this to identify the course target academic year
 */
class academicyear_course_observer {
  
  /**
   * Adds an entry in the local_academicyear table for
   * newly created course.
   *
   * @param stdClass $eventdata The event data object passed from the event source
   * @return bool A status indicating success or failure
   */
  
  public static function course_created(\core\event\course_created $event) {
    global $DB;

    $course = get_course($event->objectid);
    
    // extract academic year from course idnumber field, e.g. 55555.201200
    $extractedcourseyear = self::extract_course_year($course->idnumber);
    
    if (empty($extractedcourseyear)) {
      return true;
    }

    // get the record for the course academic year
    if (!$academicyear = $DB->get_record('local_academicyear', array('startyear'=>$extractedcourseyear), 'id')) {
      return true;
    }

    $courseacademicyear = new stdClass();
    $courseacademicyear->courseid = $event->objectid;
    $courseacademicyear->academicyearid = $academicyear->id;

    $DB->insert_record('local_academicyear_course', $courseacademicyear, true);
  
    return true;
  }
  
  /**
   * Removes the entry or entries in the local_academicyear table for
   * a deleted course.
   *
   * @param stdClass $eventdata The event data object passed from the event source
   * @return bool A status indicating success or failure
   */
  public static function course_deleted(\core\event\course_deleted $event) {

    return true;
  }
  
  /**
  * Extract target academic year from course idnumber field 
  *
  * @param string $idnumber
  * @return string $courseyear
  */
  protected static function extract_course_year($idnumber) {
    $courseyear = '';
    
    if (preg_match('/\.(\d{4})/is', $idnumber, $matches)) {
      $courseyear = $matches[1];
    }
    
    return $courseyear;
  }
}
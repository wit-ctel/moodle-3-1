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
 * Post-install code for the academicyear plugin.
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    local
 * @subpackage academicyear
 * @copyright  2013 Cathal O'Riordan
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . '/../../../config.php'); 
 
/**
 * Code run after the academicyear local plugin table(s) have been created.
 * 
 */
function xmldb_local_academicyear_install() {
  global $DB;
  
  $startmonth = 9; // TODO make start of academic year configurable
  
  if (date('n') >= $startmonth) { 
    $years = array(date('Y'), date('Y', strtotime('+1 year'))); // current year, next year
  } else {
    $years = array(date('Y', strtotime('-1 year')), date('Y')); // previous year, current year
  }
  
  // create an entry for the current academic year
  $record = new stdClass();
  $record->title = implode($years,'–');
  $record->startyear = $years[0];
  
  $DB->insert_record('local_academicyear', $record);  
}
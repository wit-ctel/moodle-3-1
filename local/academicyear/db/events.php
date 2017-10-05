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
 * List of core events we wish to register for.
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

$observers = array (
    
    array(
        'eventname'   => '\core\event\course_created',
        'callback'    =>  'academicyear_course_observer::course_created',
        'includefile' => '/local/academicyear/locallib.php'
    ),
    
    array(
        'eventname'   => '\core\event\course_deleted',
        'callback'    => 'academicyear_course_observer::course_deleted',
        'includefile' => '/local/academicyear/locallib.php'
    ),
);
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
 * Academic year block
 *
 * @package    block_academic_year
 * @copyright  2012 onwards Cathal O'Riordan, WIT (http://www.wit.ie)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->dirroot.'/blocks/academic_year/locallib.php');

/**
 * Academic year block
 *
 * @copyright  2013 onwards Cathal O'Riordan, WIT (http://www.wit.ie)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_academic_year extends block_base {
 
    /**
     * Block initialization
     */
    public function init() {
        $this->title   = get_string('pluginname', 'block_academic_year');
    }
    
    /**
     * Return contents of academic_year block
     *
     * @return stdClass contents of block
     */
    public function get_content() {
        if ($this->content !== null) {
              return $this->content;
        }
 
        $this->content         =  new stdClass;
        $this->content->text   = '';
        $this->content->footer = '';
        
        $academic_years = block_academic_year_get_years();
        $renderer = $this->page->get_renderer('block_academic_year');
        $this->content->text = $renderer->academic_year($academic_years);
        
        return $this->content;
    }
    
    /**
     * Sets block header to be hidden or visible
     *
     * @return bool if true then header will be visible.
     */
    public function hide_header() {
      return true;
    }
    
    /**
     * Locations where block can be displayed
     *
     * @return array
     */
    public function applicable_formats() {
        return array('my-index' => true);
    }
    
}
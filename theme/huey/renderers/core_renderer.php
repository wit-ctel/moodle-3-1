<?php
// This file is part of The Bootstrap 3 Moodle theme
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
defined('MOODLE_INTERNAL') || die();
/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_edgy
 * @copyright  2017 Waterford Institute of Technology
 * @authors    Pete Windle - based on Bootstrap 3 theme by Bas Brands, David Scotson
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

include_once($CFG->dirroot . "/theme/bootstrap/renderers/core_renderer.php"); 

class theme_huey_core_renderer extends theme_bootstrap_core_renderer {


	/**
     * Login Notification.
     *
     * Login notification to output general updates and information to users when logging into Moodle
     *
     * Content for this area is entered in the admin section
     * Sid administration -> Appearance -> Themes -> Huey
     *
     * @return string
     */
    
    public function login_notification() {    
        $template = new stdClass();   
        $loginnotification = get_config('theme_huey', 'loginnotification');  
        
        if($loginnotification !='<br>' && $loginnotification != ''){  
            $template->loginnotificationcontent = $loginnotification;
            return $this->render_from_template('theme_huey/login_notification', $template);
        }
    }
    
}
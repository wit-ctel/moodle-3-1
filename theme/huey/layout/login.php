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


$hassidepre = false;
$hassidepost = false;

$regions = huey_grid($hassidepre, $hassidepost);
$PAGE->set_popup_notification_allowed(false);
$PAGE->requires->jquery();

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?> class="login">
    <?php if (preg_match('/^https?:\/\/staging./', $PAGE->url)) { ?>
      <div class="alert alert-warning">
        <p class="text-center">You are using Moodle Staging site</p>
      </div>
    <?php } ?>

    <?php echo $OUTPUT->standard_top_of_body_html() ?>
  <div id="login__banner">
    
    <img id="login__banner-logo" src="<?php echo $OUTPUT->pix_url('wit_logo', 'theme'); ?>"/>
    <?php echo $OUTPUT->login_notification(); ?>
  </div>
  <div id="login__container">
    <div id="login__moodle-logo">
      <img src="<?php echo $OUTPUT->pix_url('moodle-wit-logo', 'theme'); ?>">
    </div>
    <div id="login__avatar-container">
      <img src="<?php echo $OUTPUT->pix_url('no_profile_img', 'theme'); ?>">
    </div>
    <?php echo $OUTPUT->main_content(); ?>
    <div id="login__support-container">
      <a class="login__support login__student-support" href="http://ctel.wit.ie/support/students"><img src="<?php echo $OUTPUT->pix_url('support-icon', 'theme'); ?>"><span class="login__support-text">Student Support</span></a>
      <a class="login__support login__staff-support" href="http://ctel.wit.ie/support/staff/"><img src="<?php echo $OUTPUT->pix_url('academic-icon', 'theme'); ?>"><span class="login__support-text">Staff Support</span></a>
    </div>
  </div>

</body>
</html>
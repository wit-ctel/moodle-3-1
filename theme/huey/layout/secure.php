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

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$regions = huey_grid($hassidepre, $hassidepost);

$PAGE->requires->jquery();

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

    <?php if (preg_match('/^https?:\/\/staging./', $PAGE->url)) { ?>
      <div class="alert alert-warning">
        <p class="text-center">You are using Moodle Staging site</p>
      </div>
    <?php } ?>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header pull-left">
        <?php echo $OUTPUT->navbar_brand(); ?>
    </div>
    <div class="navbar-header pull-right">
        <?php echo $OUTPUT->user_menu(); ?>
        <?php echo $OUTPUT->navbar_button(); ?>
    </div>
    <div id="moodle-navbar" class="navbar-collapse collapse navbar-right">
        <?php echo $OUTPUT->custom_menu(); ?>
        <ul class="nav pull-right">
            <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
        </ul>
    </div>
    
    </div>
</nav>

<div id="page" class="container">

    <header id="page-header" class="clearfix">
        <?php echo $OUTPUT->page_heading(); ?>
    </header>

    <div id="page-content" class="row">
        <div id="region-main" class="<?php echo $regions['content']; ?>">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </div>

        <?php
        if ($hassidepre) {
            echo $OUTPUT->blocks('side-pre', $regions['pre']);
        }?>
        <?php
        if ($hassidepost) {
            echo $OUTPUT->blocks('side-post', $regions['post']);
        }?>
    </div>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>

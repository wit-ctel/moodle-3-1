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
$hassidefooterleft = $PAGE->blocks->region_has_content('footer-left', $OUTPUT);
$hassidefootermid = $PAGE->blocks->region_has_content('footer-mid', $OUTPUT);
$hassidefooterright = $PAGE->blocks->region_has_content('footer-right', $OUTPUT);

$knownregionpre = $PAGE->blocks->is_known_region('side-pre');
$knownregionpost = $PAGE->blocks->is_known_region('side-post');
$knownregionfooterleft = $PAGE->blocks->is_known_region('footer-left');
$knownregionfootermid = $PAGE->blocks->is_known_region('footer-mid');
$knownregionfooterright = $PAGE->blocks->is_known_region('footer-right');

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
        <?php // echo $OUTPUT->navbar_brand(); ?>
        <a href="/" title="Homepage"><img src="<?php echo $OUTPUT->pix_url('moodle-wit-small', 'theme'); ?>" alt="moodle.wit Logo" class="moodle-wit-logo"/></a>
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

<div id="page" class="container-fluid">    
    <div id="page-content" class="row">
        <div id="region-main" class="<?php echo $regions['content']; ?>">
            <header id="page-header" class="clearfix page-header-content">
                <div id="course-header">
                    <?php echo $OUTPUT->course_header(); ?>
                </div>
                <div class="container-fluid">
                  <?php echo $OUTPUT->page_heading(); ?>

                  <?php echo $OUTPUT->navbar(); ?>  
                  <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
                </div>
            </header>
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </div>

        <?php
        if ($knownregionpre) {
            echo $OUTPUT->blocks('side-pre', $regions['pre']);
        }?>
    </div>

</div> <!-- end #page -->

<?php if($hassidefooterleft || $hassidefootermid || $hassidefooterright) { ?>
<aside id="pre-footer" class="pre-footer"> 
  <div class="container">
    <section class="col-md-4 footer-region footer-region--left">
    <?php
      if ($knownregionfooterleft) {
          echo $OUTPUT->blocks('footer-left');
      }?>
    </section> <!-- end .footer-region--left -->

    <section class="col-md-4 footer-region footer-region--mid">
      <?php
        if ($knownregionfootermid) {
            echo $OUTPUT->blocks('footer-mid');
        }?>
    </section> <!-- end .footer-region--mid --> 

    <section class="col-md-4 footer-region footer-region--right">
      <?php
        if ($knownregionfooterright) {
            echo $OUTPUT->blocks('footer-right');
        }?>
    </section> <!-- end .footer-region--right -->
  </div>
</aside> <!-- end .pre-footer -->
<?php } ?>

  <footer id="page-footer">
    <section class="footer-section">
      <div class="container footer-inner">
        <div class="row">
            <div class="col-md-6">
            <a title="go to Waterford Institute of Technology homepage" class="logo site-brand__logo" href="http://wit.ie/">
              <img src="<?php echo $OUTPUT->pix_url('brand-logo', 'theme'); ?>" alt="Waterford Institute of Technology" />
            </a>
            <nav>
              <ul class="footer-nav">
                <li><a href="http://elearning.wit.ie/support">Help</a></li>
                <li><a href="http://docs.moodle.org">Moodle.org Docs</a></li>
                <li><a href="http://elearning.wit.ie/about">Contact Us</a></li>
               </ul>
             </nav>
        </div>
        <div class="col-md-6">
            <p class="site-usage-policy">Users of Moodle in Waterford Institute of Technology are reminded that your use of the Virtual Learning Environment may be logged and this information, with other personal data contained within the system, may be used by lecturers and/or facilitators to monitor progress and completion of modules.</p> 
        </div>     
         </div> <!-- end .row -->
       </div> <!-- end .container -->
     </section>
  </footer>

<?php echo $OUTPUT->standard_end_of_body_html() ?>

</body>
</html>

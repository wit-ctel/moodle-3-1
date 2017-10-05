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

/**
 * This layout file is designed maintenance related tasks such as upgrade and installation of plugins.
 *
 * It's ultra important that this layout file makes no use of API's unless it absolutely needs to.
 * Under no circumstances should it use API calls that result in database or cache interaction.
 *
 * If you are modifying this file please be extremely careful, one wrong API call and you could end up
 * breaking installation or upgrade unwittingly.
 */
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);

$regions = huey_grid($hassidepre, $hassidepost);
$PAGE->set_popup_notification_allowed(false);
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

    <?php echo $OUTPUT->standard_top_of_body_html() ?>

    <div id="page" class="container">

      <div id="page-content" class="row">
        <div id="region-main" class="<?php echo $regions['content']; ?>">
          <?php echo $OUTPUT->main_content(); ?>
        </div>
      </div>
  
    </div> <!-- end #page -->
  
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

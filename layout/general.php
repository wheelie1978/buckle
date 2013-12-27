<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$haslogininfo = (empty($PAGE->layout_options['nologininfo']));
$hastitledate = (!empty($PAGE->theme->settings->titledate));
$hasgeneralalert = (!empty($PAGE->theme->settings->generalalert));
$hassnowalert = (!empty($PAGE->theme->settings->snowalert));
$haslogo = (!empty($PAGE->theme->settings->logo));
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$hashidemenu = (!empty($PAGE->theme->settings->hidemenu));
$hasemailurl = (!empty($PAGE->theme->settings->emailurl));


$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));


$courseheader = $coursecontentheader = $coursecontentfooter = $coursefooter = '';
if (empty($PAGE->layout_options['nocourseheaderfooter'])) {
    $courseheader = $OUTPUT->course_header();
    $coursecontentheader = $OUTPUT->course_content_header();
    if (empty($PAGE->layout_options['nocoursefooter'])) {
        $coursecontentfooter = $OUTPUT->course_content_footer();
        $coursefooter = $OUTPUT->course_footer();
    }
}

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    if (!right_to_left()) {
        $bodyclasses[] = 'side-pre-only';
    }else{
        $bodyclasses[] = 'side-post-only';
    }
} else if ($showsidepost && !$showsidepre) {
    if (!right_to_left()) {
        $bodyclasses[] = 'side-post-only';
    }else{
        $bodyclasses[] = 'side-pre-only';
    }
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}
$bodyclasses[] = $layout;

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>

    <title><?php echo $PAGE->title ?></title>
     <link rel="apple-touch-icon-precomposed" href="<?php echo $OUTPUT->pix_url('apple-touch-icon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
    <style type="text/css">
        @font-face {
  		font-family: 'FontAwesome';
  		src: url('<?php echo $CFG->wwwroot ?>/theme/buckle/fonts/fontawesome-webfont.eot?v=3.2.1');
  		src: url('<?php echo $CFG->wwwroot ?>/theme/buckle/fonts/fontawesome-webfont.eot?#iefix&v=3.2.1') format('embedded-opentype'), 
  			url('<?php echo $CFG->wwwroot ?>/theme/buckle/fonts/fontawesome-webfont.woff?v=3.2.1') format('woff'), 
  			url('<?php echo $CFG->wwwroot ?>/theme/buckle/fonts/fontawesome-webfont.ttf?v=3.2.1') format('truetype'), 
  			url('<?php echo $CFG->wwwroot ?>/theme/buckle/fonts/fontawesome-webfont.svg#fontawesomeregular?v=3.2.1') format('svg');
  		font-weight: normal;
  		font-style: normal;
		}
    </style>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join($bodyclasses)) ?>">

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
        
            <a href="<?php echo $CFG->wwwroot;?>"><?php if ($haslogo) {
 echo html_writer::empty_tag('img', array('src'=>$PAGE->theme->settings->logo, 'class'=>'logo')); }

 else { ?><a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo $SITE->shortname; }?></a>
			
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
          <?php  if ((!isloggedin()) && ($hashidemenu)){}

		  else if ($hascustommenu) {
                echo $custommenu;
				
            } ?>
            <ul class="nav pull-right">
            <li><?php echo $PAGE->headingmenu;
			include('profileblock.php');?></li>
            </ul>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">

    <header id="page-header" class="clearfix">
        <div id="page-navbar">
            <nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
            <?php echo $OUTPUT->navbar(); ?>
        </div>
        <?php echo $OUTPUT->page_heading(); ?>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
       	<div id="page-header-date"><h1><?php echo date("l d F Y"); ?></h1></div>
	</div>
    
    <?php if ($hasgeneralalert) {?>
		<div id="page-header-generalalert">
	<?php echo $PAGE->theme->settings->generalalert; ?>
	</div>
	<?php } ?>
    
    <?php if ($hassnowalert) {?>
		<div id="page-header-snowalert">
	<?php echo $PAGE->theme->settings->snowalert; ?>
	</div>
    <?php } ?>
	</header>
<!-- END OF HEADER -->
<div id="page-content-wrapper" class="clearfix">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">

                <div id="region-main-wrap">
                    <section id="region-main">
                        <div class="region-content">
                            <?php echo $coursecontentheader; ?>
                            <?php echo $OUTPUT->main_content() ?>
                            <?php echo $coursecontentfooter; ?>
                        </div> <!-- close region-content -->
                    </section> <!-- close region-main -->
                </div> <!-- close region-main-wrap -->

                <?php if ($hassidepre OR (right_to_left() AND $hassidepost)) { ?>
                <aside id="region-pre" > <div class="block-region">
                    <div class="region-content">
                            <?php
                        if (!right_to_left()) {
                            echo $OUTPUT->blocks_for_region('side-pre');
                        } elseif ($hassidepost) {
                            echo $OUTPUT->blocks_for_region('side-post');
                    } ?>

                    </div> <!-- close region-content -->
                </div></aside> <!-- close region-pre block-region -->
                <?php } ?>

                <?php if ($hassidepost OR (right_to_left() AND $hassidepre)) { ?>
                <aside id="region-post"> <div class="block-region">
                    <div class="region-content">
                           <?php
                       if (!right_to_left()) {
                           echo $OUTPUT->blocks_for_region('side-post');
                       } elseif ($hassidepre) {
                           echo $OUTPUT->blocks_for_region('side-pre');
                    } ?>
                    </div> <!-- close region-content -->
                </div> </aside> <!-- close region-post block-region -->
                <?php } ?>

            </div> <!-- close region-post-box -->
        </div> <!-- close region-main-box -->
    </div> <!-- close page content -->
</div> <!-- close page-content-wrapper -->

<!-- START OF FOOTER -->
    <?php if (!empty($coursefooter)) { ?>
        <div id="course-footer"><?php echo $coursefooter; ?></div>
    <?php } ?>
    <?php if ($hasfooter) { ?>
    <div id="page-footer" class="clearfix">
        <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </div>
    <?php } ?>
    <div class="clearfix"></div>
</div>
<?php
    $useragent = '';
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $useragent = $_SERVER['HTTP_USER_AGENT'];
    }
    if (strpos($useragent, 'MSIE 8') || strpos($useragent, 'MSIE 7')) {
$PAGE->requires->js(new moodle_url('https://raw.github.com/scottjehl/Respond/master/respond.min.js'));
    }
?>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>

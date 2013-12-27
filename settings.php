<?php

/*
 * @author    Shaun Daubney
 * @package   theme_buckle
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Basic Heading
    $name = 'theme_buckle/basicheading';
    $heading = get_string('basicheading', 'theme_buckle');
    $information = get_string('basicheadingdesc', 'theme_buckle');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);
	
// Logo file setting
$name = 'theme_buckle/logo';
$title = get_string('logo','theme_buckle');
$description = get_string('logodesc', 'theme_buckle');
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$settings->add($setting);	

// Hide Menu
$name = 'theme_buckle/hidemenu';
$title = get_string('hidemenu','theme_buckle');
$description = get_string('hidemenudesc', 'theme_buckle');
$default = 1;
$choices = array(1=>get_string('yes',''), 0=>get_string('no',''));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Email url setting

$name = 'theme_buckle/emailurl';
$title = get_string('emailurl','theme_buckle');
$description = get_string('emailurldesc', 'theme_buckle');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Custom CSS file
$name = 'theme_buckle/customcss';
$title = get_string('customcss','theme_buckle');
$description = get_string('customcssdesc', 'theme_buckle');
$default = '';
$setting = new admin_setting_configtextarea($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$settings->add($setting);

	// Frontpage Heading
    $name = 'theme_buckle/frontpageheading';
    $heading = get_string('frontpageheading', 'theme_buckle');
    $information = get_string('frontpageheadingdesc', 'theme_buckle');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);

    // Colour Heading
    $name = 'theme_buckle/colourheading';
    $heading = get_string('colourheading', 'theme_buckle');
    $information = get_string('colourheadingdesc', 'theme_buckle');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);
	
// Background colour setting
$name = 'theme_buckle/backcolor';
$title = get_string('backcolor','theme_buckle');
$description = get_string('backcolordesc', 'theme_buckle');
$default = '#fafafa';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);

// Graphic Wrap (Background Image)
$name = 'theme_buckle/backimage';
$title=get_string('backimage','theme_buckle');
$description = get_string('backimagedesc', 'theme_buckle');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$settings->add($setting);

// Graphic Wrap (Background Position)
$name = 'theme_buckle/backposition';
$title = get_string('backposition','theme_buckle');
$description = get_string('backpositiondesc', 'theme_buckle');
$default = 'no-repeat';
$choices = array('no-repeat'=>get_string('backpositioncentred','theme_buckle'), 'no-repeat fixed'=>get_string('backpositionfixed','theme_buckle'), 'repeat'=>get_string('backpositiontiled','theme_buckle'), 'repeat-x'=>get_string('backpositionrepeat','theme_buckle'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Menu hover background colour setting
$name = 'theme_buckle/menuhovercolor';
$title = get_string('menuhovercolor','theme_buckle');
$description = get_string('menuhovercolordesc', 'theme_buckle');
$default = '#f42941';
$previewconfig = NULL;
$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
$settings->add($setting);	

// Title Date setting

$name = 'theme_buckle/titledate';
$title = get_string('titledate','theme_buckle');
$description = get_string('titledatedesc', 'theme_buckle');
$default = 1;
$choices = array(1=>get_string('yes',''), 0=>get_string('no',''));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// General Alert setting
$name = 'theme_buckle/generalalert';
$title = get_string('generalalert','theme_buckle');
$description = get_string('generalalertdesc', 'theme_buckle');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Snow Alert setting
$name = 'theme_buckle/snowalert';
$title = get_string('snowalert','theme_buckle');
$description = get_string('snowalertdesc', 'theme_buckle');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);
	
}


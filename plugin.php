<?php
/*
Plugin Name: Date Range Time Picker
Plugin URI: https://github.com/chrismccoy/gravityforms-date-range-picker
Description: Date Range Time Picker Field for Gravity Forms
Version: 1.0
Author: Chris McCoy
*/

add_action( 'gform_loaded', array( 'GF_Date_Range_Time_Picker_Bootstrap', 'load' ), 5 );

class GF_Date_Range_Time_Picker_Bootstrap {
    public static function load() {
        if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
            return;
        }
        require_once( 'class-gfdaterangetimepicker.php' );
    }
}

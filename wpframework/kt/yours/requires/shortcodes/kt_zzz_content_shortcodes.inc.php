<?php

/*
 * Jednoduché řešení postaru, pro složitější scénáře viz @see KT_Shortcode
 */

add_shortcode("zzz_row_start", "kt_zzz_row_start_shortcode_callback");

function kt_zzz_row_start_shortcode_callback($atts)
{
    return "<div class=\"row contentColumns\">";
}

add_shortcode("zzz_row_end", "kt_zzz_row_end_shortcode_callback");

function kt_zzz_row_end_shortcode_callback($atts)
{
    return "</div>";
}

add_shortcode("zzz_column_start", "kt_zzz_column_start_shortcode_callback");

function kt_zzz_column_start_shortcode_callback($atts)
{
    return "<div class=\"col-sm-6\">";
}

add_shortcode("zzz_column_end", "kt_zzz_column_end_shortcode_callback");

function kt_zzz_column_end_shortcode_callback($atts)
{
    return "</div>";
}

add_shortcode("zzz_clearfix", "kt_zzz_clearfix_shortcode_callback");

function kt_zzz_clearfix_shortcode_callback()
{
    return "<div class=\"clearfix\"></div>";
}

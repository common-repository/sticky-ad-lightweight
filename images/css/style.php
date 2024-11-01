<?php

if ( ! defined( 'ABSPATH' ) ) exit;


function wpgtr_stickyads_css() { ?>
<style type='text/css'>
#wpgtr_stickyads_textcss_container {position: fixed; bottom: 2px; width: 100%; padding: 5px 5px; box-shadow: 0 -6px 18px 0 rgba(9,32,76,.1); -webkit-transition: all .1s ease-in; transition: all .1s ease-in; background-color: #fefefe; z-index: 99999;}
#wpgtr_stickyads_textcss_wrap {text-align: center; min-height: 90px; max-height: 110px; width: 100%;}
#wpgtr_stickyads_textcss_ad {display: block; align-items: center; justify-content: center; text-align: center; min-height: 90px; height: auto; max-height: 120px!important; width: 100%!important; z-index: 999999;}
#wpgtr_stickyads_textcss_close {width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 12px 0 0; position: absolute; right: 0; top: -18px;}
</style><?php
}

function wpgtr_stickyads_top_css() { ?>
<style type='text/css'>
#wpgtr_stickyads_top_textcss_container {position: fixed;top: -10px; width: 100%; background: #fff; max-height: 100px; z-index: 999; box-shadow: 0 -6px 10px 5px rgba(0,0,0,0.5); z-index: 99999;}
#wpgtr_stickyads_top_textcss_wrap {text-align: center; margin: auto; min-height: 90px; max-height: 110px; width: 100%!important;}
#wpgtr_stickyads_top_textcss_ad {display: block; align-items: center; justify-content: center; text-align: center; min-height: 90px; height: auto; max-height: 120px!important; width: 100%; z-index: 999999;}
#wpgtr_stickyads_top_textcss_close {width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; border-radius: 12px 0 0; position: absolute; right: 0; bottom: -10px;}
/*#wpgtr_stickyads_top_textcss_ad img{padding: 3%;}*/
	.admin-bar #wpgtr_stickyads_top_textcss_container {
  top: 32px;
}
</style><?php
}
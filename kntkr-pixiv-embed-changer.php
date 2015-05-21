<?php
/*
Plugin Name: Kntkr pixiv embed changer
Plugin URI: http://kentakure.net
Description: 正規表現を用いてPixivの埋め込みをスマホ表示の場合に置換する。PC時：幅390px（枠付き）/スマホ時：幅220px（枠付き）
Version: 1.0
Author: KENTAKURE
Author URI: http://kentakure.net
License: KENTAKURE
*/
/*編集ここから*/
function kntkr_pixiv_embed_changer($the_content) {
  if ( is_mobile()  && strstr($the_content, 'http://source.pixiv.net/source/embed.js') ) {
	$patterns = array();
	$patterns[0] = '/data-border="off"/';
	$patterns[1] = '/data-size="large"/';
	$patterns[2] = '/data-size="medium"/';
	$replacements = array();
	$replacements[0] = 'data-border="on"';
	$replacements[1] = 'data-size="small"';
	$replacements[2] = 'data-size="small"';
	$the_content = preg_replace($patterns, $replacements, $the_content);
  } elseif ( strstr($the_content, 'http://source.pixiv.net/source/embed.js') ) {
	$patterns = array();
	$patterns[0] = '/data-border="off"/';
	$patterns[1] = '/data-size="small"/';
	$patterns[2] = '/data-size="large"/';
	$replacements = array();
	$replacements[0] = 'data-border="on"';
	$replacements[1] = 'data-size="medium"';
	$replacements[2] = 'data-size="medium"';
	$the_content = preg_replace($patterns, $replacements, $the_content);
  }
  return $the_content;
}
add_filter('the_content','kntkr_pixiv_embed_changer');
/*編集ここまで*/
?>

<?php
/*
Plugin Name: Kntkr pixiv embed changer
Plugin URI: https://github.com/Kentakure/Kntkr-pixiv-embed-changer
Description: 正規表現を用いてPixivの埋め込みをスマホ表示の場合に置換する。設定画面付き。
Version: 2.0
Author: KENTAKURE
Author URI: http://kentakure.net
License: KENTAKURE
*/
/*編集ここから*/
include("kntkr-pixiv-ec-option.php");
require_once("kntkr-pixiv-ec-code.php");
//--------------------------------------------------------------------------
//
//  プラグイン有効化の際に行うオプションの追加
//
//--------------------------------------------------------------------------
if ( function_exists('register_activation_hook') ) {
	register_activation_hook(__FILE__, 'activate_hook_kntkr_pixiv_ec');
}
function activate_hook_kntkr_pixiv_ec () {
	update_option('kntkr_pixiv_ec_pc_size','large');//PC画像サイズ初期設定
	update_option('kntkr_pixiv_ec_mobile_size','small');//モバイル画像サイズ初期設定
	update_option('kntkr_pixiv_ec_border','on');//枠の有無初期設定
}
//--------------------------------------------------------------------------
//
//  プラグインページに設定画面のリンクを表示
//
//--------------------------------------------------------------------------
function kntkr_pixiv_ec_add_settings_link( $links, $file ) {
	if ( plugin_basename(__FILE__) == $file && function_exists( 'admin_url' ) ) {
		$settings_link = '<a href="' . admin_url( 'options-general.php?page=kntkr-pixiv-embed-changer' ) . '">' . __( 'Settings' ) . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}
add_filter( 'plugin_action_links', 'kntkr_pixiv_ec_add_settings_link', 10, 2 );
//--------------------------------------------------------------------------
//
//  プラグイン削除の際に行うオプションの削除
//
//--------------------------------------------------------------------------
if ( function_exists('register_uninstall_hook') ) {
	register_uninstall_hook(__FILE__, 'uninstall_hook_kntkr_pixiv_ec');
}
function uninstall_hook_kntkr_pixiv_ec () {
	delete_option('kntkr_pixiv_ec_pc_size');
	delete_option('kntkr_pixiv_ec_mobile_size');
	delete_option('kntkr_pixiv_ec_border');
}
/*編集ここまで*/
?>

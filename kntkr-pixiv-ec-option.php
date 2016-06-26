<?php
//--------------------------------------------------------------------------
//
//  プラグインにオプションを追加する
//
//--------------------------------------------------------------------------
// 管理メニューのアクションフック
add_action('admin_menu', 'kntkr_pixiv_ec_option');
  
// アクションフックのコールバッック関数
function kntkr_pixiv_ec_option () {
    // 設定メニュー下にサブメニューを追加:
    add_options_page('Kntkr Pixiv Embed Changer Setting', 'Kntkr Pixiv Embed Changer', 'manage_options', 'kntkr-pixiv-embed-changer', 'kntkr_pixiv_ec_setting');
}
//--------------------------------------------------------------------------
//
//  プラグイン設定変更画面を構築する
//
//--------------------------------------------------------------------------
// メニューで表示されるページの内容を返す関数
function kntkr_pixiv_ec_setting() {
// POSTデータがあれば設定を更新
	if (isset($_POST['kntkr_pixiv_ec_pc_size'])|isset($_POST['kntkr_pixiv_ec_mobile_size'])|isset($_POST['kntkr_pixiv_ec_border'])) {
		// POSTデータの'"などがエスケープされるのでwp_unslashで戻して保存
		update_option('kntkr_pixiv_ec_pc_size', $_POST['kntkr_pixiv_ec_pc_size']);
		update_option('kntkr_pixiv_ec_mobile_size', $_POST['kntkr_pixiv_ec_mobile_size']);
		update_option('kntkr_pixiv_ec_border', $_POST['kntkr_pixiv_ec_border']);
	}
//設定変更画面の編集ここから ?>
<div class="wrap">
	<h2>Kntkr Pixiv Embed Changer Setting</h2>
<?php
// 更新完了を通知
if (isset($_POST['kntkr_pixiv_ec_pc_size'])) {
	echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"><p><strong>設定を保存しました。</strong></p></div>';
}
?>
<form method="post" action="">
<table class="form-table">
	<tr valign="top">
		<th scope="row">PC画像サイズ<br></th>
		<td><input name="kntkr_pixiv_ec_pc_size" type="radio" value="large" <?php checked( large, get_option( 'kntkr_pixiv_ec_pc_size' ) ); ?>/> 大 : 幅600px<br><input name="kntkr_pixiv_ec_pc_size" type="radio" value="medium" <?php checked( medium, get_option( 'kntkr_pixiv_ec_pc_size' ) ); ?>/> 中 : 幅240px<br>初期設定：大</td>
	</tr>
	<tr valign="top">
		<th scope="row">モバイル画像サイズ<br></th>
		<td><input name="kntkr_pixiv_ec_mobile_size" type="radio" value="medium" <?php checked( medium, get_option( 'kntkr_pixiv_ec_mobile_size' ) ); ?>/> 中 : 幅240px<br><input name="kntkr_pixiv_ec_mobile_size" type="radio" value="small" <?php checked( small, get_option( 'kntkr_pixiv_ec_mobile_size' ) ); ?>/> 小 : 幅150px<br>初期設定：小</td>
	</tr>
	<tr valign="top">
		<th scope="row">枠の有無<br></th>
		<td><input name="kntkr_pixiv_ec_border" type="radio" value="on" <?php checked( on, get_option( 'kntkr_pixiv_ec_border' ) ); ?>/> 枠付き<br><input name="kntkr_pixiv_ec_border" type="radio" value="off" <?php checked( off, get_option( 'kntkr_pixiv_ec_border' ) ); ?>/> 枠無し<br>初期設定：枠付き</td>
	</tr>
</table>
<?php submit_button(); ?>
</form>
</div>
<?php } //設定変更画面の編集ここまで


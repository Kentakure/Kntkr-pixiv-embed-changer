<?php
/*編集ここから*/
function kntkr_pixiv_embed_changer($the_content) {
//PC画像サイズ
$pcsize = get_option('kntkr_pixiv_ec_pc_size');
//モバイル画像サイズ
$mobilesize = get_option('kntkr_pixiv_ec_mobile_size');
//枠の有無
$border = get_option('kntkr_pixiv_ec_border');
//正規表現
$pattern = '/<script[^>]+?src="http:\/\/source\.pixiv\.net\/source\/embed\.js"[^<]+?data-id="([^"]+?)"[^<]+?<\/script><noscript>(.*)?<\/noscript>/is';
if ( wp_is_mobile() )
{
$replacement = '<div class="pixiv-embed"><script src="http://source.pixiv.net/source/embed.js" data-id="$1" data-size="'.$mobilesize.'" data-border="'.$border.'" charset="utf-8"></script><noscript>$2</noscript></div>';
$the_content = preg_replace($pattern, $replacement, $the_content);
}else{
$replacement = '<div class="pixiv-embed"><script src="http://source.pixiv.net/source/embed.js" data-id="$1" data-size="'.$pcsize.'" data-border="'.$border.'" charset="utf-8"></script><noscript>$2</noscript></div>';
$the_content = preg_replace($pattern, $replacement, $the_content);
}
return $the_content;
}
add_filter('the_content','kntkr_pixiv_embed_changer');
/*編集ここまで*/
?>
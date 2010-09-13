<?php
// PukiWiki - Yet another WikiWikiWeb clone.
// $Id: pukiwiki.skin.php,v 1.48 2006/03/07 14:03:02 henoheno Exp $
// Copyright (C)
//   2002-2006 PukiWiki Developers Team
//   2001-2002 Originally written by yu-ji
// License: GPL v2 or (at your option) any later version
//
// PukiWiki default skin

// ------------------------------------------------------------
// Settings (define before here, if you want)

// Set site identities
$_IMAGE['skin']['logo']     = 'ia-logo.gif';
//$_IMAGE['skin']['logo']     = 'pukiwiki.png';
$_IMAGE['skin']['favicon']  = ''; // Sample: 'image/favicon.ico';

// SKIN_DEFAULT_DISABLE_TOPICPATH
//   1 = Show reload URL
//   0 = Show topicpath
if (! defined('SKIN_DEFAULT_DISABLE_TOPICPATH'))
	define('SKIN_DEFAULT_DISABLE_TOPICPATH', 0); // 1, 0

// Show / Hide toolbar UI at your choice
// NOTE: This is not stop their functionalities!
if (! defined('PKWK_SKIN_SHOW_TOOLBAR'))
	define('PKWK_SKIN_SHOW_TOOLBAR', 0); // 1, 0
	//define('PKWK_SKIN_SHOW_TOOLBAR', 1); // 1, 0

// ------------------------------------------------------------
// Code start

// Prohibit direct access
if (! defined('UI_LANG')) die('UI_LANG is not set');
if (! isset($_LANG)) die('$_LANG is not set');
if (! defined('PKWK_READONLY')) die('PKWK_READONLY is not set');

$lang  = & $_LANG['skin'];
$link  = & $_LINK;
$image = & $_IMAGE['skin'];
$rw    = ! PKWK_READONLY;

// Decide charset for CSS
$css_charset = 'iso-8859-1';
switch(UI_LANG){
	case 'ja': $css_charset = 'Shift_JIS'; break;
}

// ------------------------------------------------------------
// Output

// HTTP headers
pkwk_common_headers();
header('Cache-control: no-cache');
header('Pragma: no-cache');
header('Content-Type: text/html; charset=' . CONTENT_CHARSET);

// HTML DTD, <html>, and receive content-type
if (isset($pkwk_dtd)) {
	$meta_content_type = pkwk_output_dtd($pkwk_dtd);
} else {
	$meta_content_type = pkwk_output_dtd();
}

?>
<head>
 <?php echo $meta_content_type ?>
 <meta http-equiv="content-style-type" content="text/css" />
<?php if ($nofollow || ! $is_read)  { ?> <meta name="robots" content="NOINDEX,NOFOLLOW" /><?php } ?>
<?php if (PKWK_ALLOW_JAVASCRIPT && isset($javascript)) { ?> <meta http-equiv="Content-Script-Type" content="text/javascript" /><?php } ?>

 <title><?php echo $title ?> - <?php echo $page_title ?></title>

 <link rel="SHORTCUT ICON" href="<?php echo $image['favicon'] ?>" />
 <link rel="stylesheet" type="text/css" media="screen" href="skin/pukiwiki.css.php?charset=<?php echo $css_charset ?>" charset="<?php echo $css_charset ?>" />
 <link rel="stylesheet" type="text/css" media="print"  href="skin/pukiwiki.css.php?charset=<?php echo $css_charset ?>&amp;media=print" charset="<?php echo $css_charset ?>" />
 <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $link['rss'] ?>" /><?php // RSS auto-discovery ?>

<?php if (PKWK_ALLOW_JAVASCRIPT && $trackback_javascript) { ?> <script type="text/javascript" src="skin/trackback.js"></script><?php } ?>

<?php echo $head_tag ?>
</head>
<body>

<div id="container">

<div id="header">
 <a href="<?php echo $link['top'] ?>"><img id="logo" src="<?php echo IMAGE_DIR . $image['logo'] ?>" width="700" height="79" alt="[インターネットアーキテクチャ研究会]" title="[インターネットアーキテクチャ研究会]" /></a>
</div>

<div id="navigator">
  <table id="navigator">
  <tr>
  <td class="navigator">
  <a href="<?php echo $link['top'] ?>">TOP</a></td>
  <td class="navigator">
  <a href="http://www.ieice.org/ken/program/index.php?tgid=IA&layout=&lang=jpn">
  研究会開催予定</a></td>
  <td class="navigator">
  <a href="index.php?submission">発表・論文投稿</a></td>
  <td class="navigator">
  <a href="index.php?yokou">予稿集</a></td>
  <td class="navigator">
  <a href="index.php?houkoku">開催報告</a></td>
  </tr>
  <tr>
  <td class="navigator">
  <a href="index.php?shushi">研究会趣旨</a></td>
  <td class="navigator">
  <a href="index.php?iinkai">委員構成</a></td>
  <td class="navigator">
  <a href="index.php?award">IA研究賞</a></td>
  <td class="navigator">
  <a href="index.php?studentaward">学生研究奨励賞</a></td>
  <td class="navigator">
  <a href="../eng/index.htm">English&gt;&gt;&gt</a></td>
</tr>
</table>
</div>

<?php //echo $hr ?>

<?php if (arg_check('read') && exist_plugin_convert('menu')) { ?>
<table border="0" style="width:100%">
 <tr>
  <td class="menubar">
    <div id="menubar">
<?php

// Set toolbar-specific images
$_IMAGE['skin']['reload']   = 'reload.png';
$_IMAGE['skin']['new']      = 'new.png';
$_IMAGE['skin']['edit']     = 'edit.png';
$_IMAGE['skin']['freeze']   = 'freeze.png';
$_IMAGE['skin']['unfreeze'] = 'unfreeze.png';
$_IMAGE['skin']['diff']     = 'diff.png';
$_IMAGE['skin']['upload']   = 'file.png';
$_IMAGE['skin']['copy']     = 'copy.png';
$_IMAGE['skin']['rename']   = 'rename.png';
$_IMAGE['skin']['top']      = 'top.png';
$_IMAGE['skin']['list']     = 'list.png';
$_IMAGE['skin']['search']   = 'search.png';
$_IMAGE['skin']['recent']   = 'recentchanges.png';
$_IMAGE['skin']['backup']   = 'backup.png';
$_IMAGE['skin']['help']     = 'help.png';
$_IMAGE['skin']['rss']      = 'rss.png';
$_IMAGE['skin']['rss10']    = & $_IMAGE['skin']['rss'];
$_IMAGE['skin']['rss20']    = 'rss20.png';
$_IMAGE['skin']['rdf']      = 'rdf.png';

function _toolbar($key, $x = 20, $y = 20){
	$lang  = & $GLOBALS['_LANG']['skin'];
	$link  = & $GLOBALS['_LINK'];
	$image = & $GLOBALS['_IMAGE']['skin'];
	if (! isset($lang[$key]) ) { echo 'LANG NOT FOUND';  return FALSE; }
	if (! isset($link[$key]) ) { echo 'LINK NOT FOUND';  return FALSE; }
	if (! isset($image[$key])) { echo 'IMAGE NOT FOUND'; return FALSE; }

	echo '<a href="' . $link[$key] . '">' .
		'<img src="' . IMAGE_DIR . $image[$key] . '" width="' . $x . '" height="' . $y . '" ' .
	  'alt="' . $lang[$key] . '" title="' . $lang[$key] . '" />' .
	  $lang[$key] . '</a><br/>';
	return TRUE;
}
?>
<?php _toolbar('search') ?>
<hr class="navigator"/>
<?php if ($rw) { ?>
	<?php _toolbar('new') ?>
<?php } ?>
<?php if ($is_page) { ?>
 <?php if ($rw) { ?>
	<?php _toolbar('edit') ?>
	<?php if ($is_read && $function_freeze) { ?>
		<?php //if (! $is_freeze) { _toolbar('freeze'); } else { _toolbar('unfreeze'); } ?>
	<?php } ?>
 <?php } ?>
 <?php _toolbar('diff') ?>
<?php if ($do_backup) { ?>
	<?php _toolbar('backup') ?>
<?php } ?>
<?php if ($rw) { ?>
	<?php if ((bool)ini_get('file_uploads')) { ?>
		<?php _toolbar('upload') ?>
	<?php } ?>
	<?php //_toolbar('copy') ?>
	<?php //_toolbar('rename') ?>
<?php } ?>
 <?php //_toolbar('reload') ?>
<?php } ?>
 <?php _toolbar('list')   ?>
 <?php //_toolbar('recent') ?>
 <?php //_toolbar('help') ?>
 <?php //_toolbar('rss10', 36, 14) ?>

<br/>

<span class="navigator">研究会活動</span>
<hr class="navigator"/>

<ul>
<li><a href="http://www.ieice.org/ken/program/index.php?tgid=IA&layout=&lang=jpn">研究会開催予定</a></li>
今年度開催予定の研究会について
<li><a href="index.php?houkoku">開催報告</a></li>
過去に開催された研究会について
<li><a href="index.php?submission">発表・論文投稿</a></li>
研究会への発表申込・論文の投稿方法について
<li><a href="index.php?yokou">予稿集</a></li>
予稿集の販売方法・価格について
<li><a href="index.php?award">IA研究賞</a></li>
優れた研究や将来性のある研究を対象にした表彰について
<li><a href="index.php?studentaward">IA研究会学生研究奨励賞</a></li>
学生が発表した研究・論文に対して
</ul>

<br/>

<span class="navigator">研究会について</span>
<hr class="navigator"/>

<ul>
<li><a href="index.php?shushi">研究会趣旨</a></li>
主要研究分野とトピックスについて
<li><a href="index.php?iinkai">委員構成</a></li>
</ul>
<br/>
<img id="ieice_logo" src="<?php echo IMAGE_DIR . 'ieice_logo.gif' ?>" alt="[電子情報通信学会]" title="[電子情報通信学会]" />
    </div>
  </td>
  <td valign="top">
   <div id="body"><?php echo $body ?></div>
  </td>
 </tr>
</table>
<?php } else { ?>
<div id="body"><?php echo $body ?></div>
<?php } ?>

<?php if ($notes != '') { ?>
<div id="note"><?php echo $notes ?></div>
<?php } ?>

<?php if ($attaches != '') { ?>
<div id="attach">
<?php echo $hr ?>
<?php echo $attaches ?>
</div>
<?php } ?>

<?php echo $hr ?>

<?php if ($lastmodified != '') { ?>
<div id="lastmodified">Last-modified: <?php echo $lastmodified ?></div>
<?php } ?>

<?php if ($related != '') { ?>
<!--<div id="related">Link: <?php echo $related ?></div>-->
<?php } ?>

<div id="footer">
 <?php echo S_COPYRIGHT ?>.
 Powered by PHP <?php echo PHP_VERSION ?>. HTML convert time: <?php echo $taketime ?> sec.
</div>

</div>

</body>
</html>

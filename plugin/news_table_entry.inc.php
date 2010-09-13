<?php
// $Id: news_table_entry.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// IEICE schedule table plugin
//
// Usage:
//	#news_table_entry({[date, title, description, url]})
//  date: string e.g. 2010.8.31
//	title: string
//	description: string
//	url: string

function plugin_news_table_entry_convert()
{
	global $script, $vars, $post, $get, $weeklabels, $WikiName, $BracketName;
  global $_count;

  $_count = $_count + 1;
  if ($_count % 2 == 0) {
    $color = 'white';
  } else {
    $color = 'gray';
  }

	if (func_num_args()) {
    $args = func_get_args();
    $date = htmlspecialchars($args[0]);
    $title = htmlspecialchars($args[1]);
    $description = htmlspecialchars($args[2]);
    $url = htmlspecialchars($args[3]);
  }

  $ret .= '  <tr>' . "\n" .
    '    <td class="news_left_' . $color .  '">' .
    $date .
    '</td>' . "\n" .
    '    <td class="news_right_' . $color . '">' .
    '<span class="news_title">' .
    $title .
    '</span>' .
    '</td>' . "\n" .
    '  </tr>' . "\n" .
    '  <tr class="news">' . "\n" .
    '    <td class="news_left_' . $color . '"></td>' . "\n" .
    '    <td class="news_right_' . $color . '">' .
    '<a href="' . $url . '" class="news">' .
    $description .  // news description
    '</a>' .
    '</td>' . "\n" .
    '  </tr>' . "\n";

  return $ret;
}
?>

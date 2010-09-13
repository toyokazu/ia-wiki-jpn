<?php
// $Id: link_table_entry.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// IEICE schedule table plugin
//
// Usage:
//	#link_table_entry({description, url, comment})
//  description: string e.g. ÏÂÊ¸ÏÀÊ¸»ïB
//	url: string
//	comment: string

function plugin_link_table_entry_convert()
{
	global $script, $vars, $post, $get, $weeklabels, $WikiName, $BracketName;

	if (func_num_args()) {
    $args = func_get_args();
    $description = htmlspecialchars($args[0]);
    $url = htmlspecialchars($args[1]);
    $comment = htmlspecialchars($args[2]);
  }

  $ret .= '  <tr>' . "\n" .
    '    <td class="link">' .
    '<a href="' . $url . '" class="link">' .
    '¡¦' . $description .
    '</a>';
  if ($comment != "") {
    $ret .= '</td>' . "\n" .
      '  </tr>' . "\n" .
      '  <tr>' . "\n" .
      '<td class="link">' .
      $comment;
  }
  $ret .= '</td>' . "\n" .
    '  </tr>' . "\n";

  return $ret;
}
?>

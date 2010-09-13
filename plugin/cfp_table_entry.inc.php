<?php
// $Id: cfp_table_entry.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// Call For Paper table entry plugin
//
// Usage:
//	#cfp_table_entry({[journal, theme, deadline, status, url]})
//  journal: string e.g. 和文論文誌B
//	theme: string
//	deadline: e.g. 2010/9/11 (水)
//	status: string e.g. 受付中
//	url: string

function plugin_cfp_table_entry_convert()
{
	if (func_num_args()) {
    $args = func_get_args();
    $journal = htmlspecialchars($args[0]);
    $theme = htmlspecialchars($args[1]);
    $deadline = htmlspecialchars($args[2]);
    $status = htmlspecialchars($args[3]);
    $url = htmlspecialchars($args[4]);
  }

  if ($journal == "") {
    $ret = '  <tr><td><br/></td></tr>' . "\n";
  } else {
    $ret = '  <tr>' . "\n" .
      '    <td class="cfp">' .
      $journal . ':<br/>' .
      $theme . '<br/>' .
      '論文〆切: ' . $deadline .
      '<span class="cfp_status">' .
      '・・・' . $status .
      '</span>' .
      '</td>' . "\n" .
      '  </tr>' . "\n" .
      '  <tr>' . "\n" .
      '    <td class="cfp_align_right">' .
      '<a href="' . $url . '" class="cfp">' .
      '．．．投稿要項>>>' .
      '</a>' .
      '</td>' . "\n" .
      '  </tr>' . "\n";
  }

  return $ret;
}
?>

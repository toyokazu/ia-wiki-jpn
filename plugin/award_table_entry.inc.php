<?php
// $Id: award_table_entry.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// IA Award table entry plugin
//
// Usage:
//	#award_table_entry({[id, title, authors]})
//  id: string  e.g. IA2010-1, IA2010-20 (��)
//	title: string  e.g. DNS�����ꥰ��դ��Ѥ��������ɥᥤ��̾�ꥹ��ɾ��
//	authors:  e.g. ���ж�����˭��䡦��ƣ��ƻ����¼������NTT��

function plugin_award_table_entry_convert()
{
	if (func_num_args()) {
    $args = func_get_args();
    $id = htmlspecialchars($args[0]);
    $title = htmlspecialchars($args[1]);
    $authors = htmlspecialchars($args[2]);
  }

  $ret = '  <tr class="award">' . "\n" .
    '    <td class="award_left">' .
    $id .
    '</td>' . "\n" .
    '    <td class="award_right">' .
    $title . '<br/>' .
    $authors .
    '</td>' . "\n" .
    '  </tr>' . "\n";

  return $ret;
}
?>

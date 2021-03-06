<?php
// $Id: ieice_schedule_table.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// IEICE schedule table plugin
//
// Usage:
//	#ieice_schedule_table({[title], [tgid], [from], [to], [lang]})
//  tgid: e.g. IEICE-IA
//	from: yyyy-mm-dd
//	to: yyyy-mm-dd

function get_workshop_title()
{
  $ret = "";
  if (func_num_args()) {
    $args = func_get_args();
    $schedule_vars = $args[0];
    $key = $args[1];
    $type = $args[2];
  }
  $urlj = '';
  if (strpos($schedule_vars['tgs_frm1_type'], 'STD') === 0) {
    $urlj = 'http://www.ieice.org/ken/' . $type . '/index.php?tgs_regid=' . $schedule_vars['tgs_regid'];
  } else {
    $urlj = $schedule_vars['tgs_o_frm1_urlj'];
  }
  $ret .= '  <tr>' . "\n";
  $ret .= '    <td class="ieice_schedule_left">' .
    '<a href="' . $urlj . '">' .
    '<span class="ieice_schedule_event">'.
    '■第' . ($key + 1) . '回研究会' .
    '</span>' .
    '</a>' .
    '</td>' . "\n";
  return $ret;
}

function plugin_ieice_schedule_table_convert()
{
	if (func_num_args()) {
    $args = func_get_args();
    $title = $args[0];
    $tgid = $args[1];
    $from = $args[2];
    $to = $args[3];
    $lang = $args[4];
	}

  //$from = "2010-04-01"; $to = "2011-03-31";
  //$tgid = "IEICE-IA";
  $content = file_get_contents("http://www.ieice.org/ken/program/?cmd=serialized_schedule&tgid=$tgid&from=$from&to=$to");
  // read content from file
  //$content = file_get_contents(DATA_HOME . 'test.data');
  $schedule_vars_list = unserialize($content);

  $ret = "\n" .
    '<table id="ieice_schedule">' . "\n" .
    '  <thead>' . "\n" .
    '    <tr>' . "\n" .
    '      <th colspan="2">' . $title . '</th>' . "\n" .
    '    </tr>' . "\n" .
    '  </thead>' . "\n" .
    '  <tbody>' . "\n";
  date_default_timezone_set('Asia/Tokyo');
  $now = new DateTime("now");
  foreach ($schedule_vars_list as $key => $schedule_vars) {
    $start_date = null;
    if (!empty($schedule_vars['tgs_dd'])) {
      $start_date = new DateTime($schedule_vars['tgs_yy'] . '-' . $schedule_vars['tgs_mm'] . '-' . $schedule_vars['tgs_dd']);
    } else {
      $start_date = new DateTime($schedule_vars['tgs_yy'] . '-' . $schedule_vars['tgs_mm'] . '-01');
    }
    $end_date = clone $start_date;
    if (!empty($schedule_vars['tgs_ndays'])) {
      $end_date->add(new DateInterval('P' . ($schedule_vars['tgs_ndays'] - 1) . 'D'));
    }
    $interval_now = $now->diff($end_date);
    // show workshop status
    if ($interval_now->invert == 1 && $interval_now->days > 7) { // program was finished more than a week ago
      $ret .= get_workshop_title($schedule_vars, $key, 'program');
      $ret .= '    <td class="ieice_schedule_right">' .
        '</td>' . "\n";
    } elseif ($schedule_vars['tgs_prg_openflag'] == '1') { // program is already opened
      $ret .= get_workshop_title($schedule_vars, $key, 'program');
      $ret .= '    <td class="ieice_schedule_right">' .
        '<span class="ieice_schedule_status">' .
        '・・・プログラム公開中' .
        '</span>' .
        '</td>' . "\n";
    } elseif (strpos($schedule_vars['tgs_rdl_type'], 'MANUAL') !== false || strpos($schedule_vars['tgs_rdl_type'], 'AUTO') !== false) { // paper submission page is already opened
      $ret .= get_workshop_title($schedule_vars, $key, 'form');
      $ret .= '    <td class="ieice_schedule_right">' .
        '<span class="ieice_schedule_status">' .
        '・・・発表申込受付中' .
        '</span>' .
        '</td>' . "\n";
    } else { // paper submission page is not opened yet
      $ret .= get_workshop_title($schedule_vars, $key, 'form');
      $ret .= '    <td class="ieice_schedule_right">' .
        '</td>' . "\n";
    }
    $ret .= '  </tr>' . "\n";

    // show workshop dates
    $ret .= '  <tr class="ieice_schedule">' . "\n";
    $ret .= '    <td class="ieice_schedule_left">';
    if (empty($schedule_vars['tgs_dd']) || empty($schedule_vars['tgs_ndays'])) {
      $ret .= '検討中(' . $start_date->format('n') . '月)';
    } elseif ($interval_now->invert == 1 && $interval_now->days > 7) { // program was finished more than a week ago
        $ret .= '<strike>' .
        $start_date->format('n/j') . '〜' . $end_date->format('n/j') .
        '</strike>';
    } else {
        $ret .= $start_date->format('n/j') . '〜' . $end_date->format('n/j');
    }
    $ret .= '</td>' . "\n" .
      '    <td class="ieice_schedule_right">' .
      '<a href="' . $schedule_vars['tgs_urlj'] . '" class="ieice_schedule">' .
      '<span>' .
      mb_convert_encoding($schedule_vars['tgs_placej'], 'EUC-JP', 'SJIS') .
      '</span>' .
      '</a>' .
      '</td>' . "\n" .
      '  </tr>' . "\n";
  }
  $ret .= '  <tr>' . "\n" .
    '    <td class="ieice_schedule" colspan=2>' .
    '※変更されることもございますので随時ご確認下さい。 また、各研究会の<strong>発表申込〆切日</strong>・<strong>論文提出〆切日</strong>など詳細につきましてはこちらをご確認下さい。' .
    '</td>' . "\n" .
    '  </tr>' . "\n" .
    '  <tr>' . "\n" .
    '    <td class="ieice_schedule_align_right" colspan=2>' .
    '<a href="http://www.ieice.org/ken/program/index.php?tgid=IEICE-IA&layout=&lang=' . $lang . '" class="ieice_schedule">' .
    '．．．研究会開催スケジュール&gt;&gt;&gt;' .
    '</a>' .
    '</td>' . "\n" .
    '  </tr>' . "\n" .
    '  <tr class="ieice_schedule">' . "\n" .
    '    <td class="ieice_schedule" colspan=2>' .
    '各回ごとに発表申込システムへリンクしています。なお、発表原稿のwebアップロードの〆切は研究会の概ね3週間前ですが、具体的な期日は発表申込み後にwebシステムから著者に連絡されるメールに従ってください。' .
    '</td>' . "\n" .
    '  </tr>' . "\n" .
    '  </tbody>' . "\n" .
    '</table>' . "\n";

  return $ret;
}
?>

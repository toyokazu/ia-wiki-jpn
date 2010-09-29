<?php
// $Id: ieice_submission_guideline.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// IEICE submission guideline plugin

function plugin_ieice_submission_guideline_convert()
{
  $ret = <<< GUIDELINE_CONTENTS
<table id="submission_guideline">
  <tr>
    <td rowspan="2" class="blue_box">発表申込</td>
    <td class="space_box">　</td>
    <td class="left_box">電子情報通信学会/研究会発表申込システムからお申込下さい。</td>
  </tr>
  <tr>
    <td class="space_box">　</td>
    <td class="right_box"><a href="http://www.ieice.org/ken/">．．．研究会発表申込システム&gt;&gt;&gt;</a></td>
  </tr>
  <tr>
    <td class="center_box">↓</td>
    <td class="space_box">　</td>
    <td>　</td>
  </tr>
  <tr>
    <td class="white_box">申込登録メール</td>
    <td class="space_box">　</td>
    <td>学会事務局より、原稿提出締切日・提出必要書類等・アップロード用URLに関する案内メールが届きます。</td>
  </tr>
  <tr>
    <td class="center_box">↓</td>
    <td class="space_box">　</td>
    <td>　</td>
  </tr>
  <tr>
    <td class="blue_box">原稿投稿</td>
    <td class="space_box">　</td>
    <td>原稿投稿締切日までに指定のURL（個別）にPDF原稿を投稿して下さい。
    （原稿投稿締切日までは24時間原稿差替え可能です）</td>
  </tr>
  <tr>
    <td class="center_box"></td>
    <td class="space_box">　</td>
    <td>　</td>
  </tr>
  <tr>
    <td class="center_box">　</td>
    <td class="space_box">　</td>
    <td><strong><span>※注</span></strong><br/>
印刷･研究会会場への資料発送等の時間をぎりぎりで設定していますので、</font><strong>締切日厳守</strong>です。<u>締切日翌日午前9時</u>には投稿受付を締切りますので､それを過ぎた場合は、投稿できません。<br/>
万が一、原稿締切日までに投稿できなかった場合は､研究会事務局までご連絡下さい。<br/>
技報への掲載なしの口頭のみの発表あるいは発表自体のキャンセルとして進めていただくことになります。</td>
  </tr>
  <tr>
    <td class="center_box">　</td>
    <td class="space_box">　</td>
    <td>　</td>
  </tr>
  <tr>
    <td colspan="3" class="left_box">詳細につきましては、<a href="http://www.ieice.org/jpn/toukou/cs_senyou.html">こちら</a>をご確認ください。</td>
  </tr>
</table>
GUIDELINE_CONTENTS;

  return $ret;
}
?>

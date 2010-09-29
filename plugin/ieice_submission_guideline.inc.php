<?php
// $Id: ieice_submission_guideline.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// IEICE submission guideline plugin

function plugin_ieice_submission_guideline_convert()
{
  $ret = <<< GUIDELINE_CONTENTS
<table id="submission_guideline">
  <tr>
    <td rowspan="2" class="blue_box">ȯɽ����</td>
    <td class="space_box">��</td>
    <td class="left_box">�ŻҾ����̿��ز�/�����ȯɽ���������ƥफ�餪������������</td>
  </tr>
  <tr>
    <td class="space_box">��</td>
    <td class="right_box"><a href="http://www.ieice.org/ken/">�����������ȯɽ���������ƥ�&gt;&gt;&gt;</a></td>
  </tr>
  <tr>
    <td class="center_box">��</td>
    <td class="space_box">��</td>
    <td>��</td>
  </tr>
  <tr>
    <td class="white_box">������Ͽ�᡼��</td>
    <td class="space_box">��</td>
    <td>�ز��̳�ɤ�ꡢ������������������ɬ�׽����������åץ�����URL�˴ؤ������᡼�뤬�Ϥ��ޤ���</td>
  </tr>
  <tr>
    <td class="center_box">��</td>
    <td class="space_box">��</td>
    <td>��</td>
  </tr>
  <tr>
    <td class="blue_box">�������</td>
    <td class="space_box">��</td>
    <td>��������������ޤǤ˻����URL�ʸ��̡ˤ�PDF���Ƥ���Ƥ��Ʋ�������
    �ʸ�������������ޤǤ�24���ָ��ƺ��ؤ���ǽ�Ǥ���</td>
  </tr>
  <tr>
    <td class="center_box"></td>
    <td class="space_box">��</td>
    <td>��</td>
  </tr>
  <tr>
    <td class="center_box">��</td>
    <td class="space_box">��</td>
    <td><strong><span>����</span></strong><br/>
�������������ؤλ���ȯ�����λ��֤򤮤꤮������ꤷ�Ƥ��ޤ��Τǡ�</font><strong>����������</strong>�Ǥ���<u>��������������9��</u>�ˤ���Ƽ��դ����ڤ�ޤ��Τǎ������᤮�����ϡ���ƤǤ��ޤ���<br/>
�����졢�����������ޤǤ���ƤǤ��ʤ��ä����ώ�������̳�ɤޤǤ�Ϣ��������<br/>
����ؤηǺܤʤ��θ�Ƭ�Τߤ�ȯɽ���뤤��ȯɽ���ΤΥ���󥻥�Ȥ��ƿʤ�Ƥ����������Ȥˤʤ�ޤ���</td>
  </tr>
  <tr>
    <td class="center_box">��</td>
    <td class="space_box">��</td>
    <td>��</td>
  </tr>
  <tr>
    <td colspan="3" class="left_box">�ܺ٤ˤĤ��ޤ��Ƥϡ�<a href="http://www.ieice.org/jpn/toukou/cs_senyou.html">������</a>�򤴳�ǧ����������</td>
  </tr>
</table>
GUIDELINE_CONTENTS;

  return $ret;
}
?>

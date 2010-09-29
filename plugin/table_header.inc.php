<?php
// $Id: table_header.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// table header plugin
//
// Usage:
//	#table_header({type, title})
//	type: {news, cfp, link, award}
//	title: table title

function plugin_table_header_convert()
{
	if (func_num_args()) {
    $args = func_get_args();
    $type = htmlspecialchars($args[0]);
    $title = htmlspecialchars($args[1]);
	}

  $ret = "\n" .
    '<table id="' . $type . '">' . "\n" .
    '  <thead class="' . $type . '">' . "\n" .
    '    <tr>' . "\n" .
    '      <th colspan="2">' . $title . '</th>' . "\n" .
    '    </tr>' . "\n" .
    '  </thead>' . "\n" .
    '  <tbody class="' . $type . '">' . "\n";

  return $ret;
}
?>

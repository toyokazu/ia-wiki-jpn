<?php
// $Id: table_footer.inc.php,v 0.01 2010/09/10 00:00:00 akiyama Exp $
//
// table footer plugin
//
// Usage:
//	#table_footer({})

function plugin_table_footer_convert()
{
  $ret .= '  </tbody>' . "\n" .
    '</table>' . "\n";

  return $ret;
}
?>

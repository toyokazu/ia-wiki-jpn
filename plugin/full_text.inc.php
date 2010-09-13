<?php
// PukiWiki - Yet another WikiWikiWeb clone
// $Id: full_text.inc.php,v 1.4 2010/09/10 00:00:00 akiyama Exp $
//
// Usage:
//	#full_text({})

function plugin_full_text_convert()
{
  return '<div class="full_text">' .
    '<br/>' .
    '<a href="index.php?yokou">' .
    '☆予稿集（技術研究報告）の予約購読をお願い致します。' .
    '</a><br/><br/>' .
    '※※研究会についてのご意見ご質問は' .
    '<img src="' . IMAGE_DIR . 'ia-board.gif"/>' .
    'まで<br/><br/>' .
    '<hr class="full"/>' .
    '<strong>-情報配信メーリングリスト-</strong><br/>' .
    'メーリングリストへの登録を希望される方、あるいは問い合わせは' .
    '<img src="' . IMAGE_DIR . 'ia-board.gif"/>' .
    'までメールをお送り下さい。なお、このメーリングリストは投稿制限があり、登録者以外の投稿はできませんので、ご了承ください。' .
    '<hr class="full"/>' .
    '<br/><br/><br/><br/>' .
    '<p class="full_footer">' .
    '電子情報通信学会/通信ソサエティ　インターネットアーキテクチャ研究会<br/>' .
    'Technical Committee on Internet Architecture' .
    '</p>' .
    '</div>' . "\n";
}
?>

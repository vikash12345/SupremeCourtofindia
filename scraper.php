<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

$years	= array('1995');

for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	$x = 1;
	do {
	$link	=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='.$x.'&d_yr='.$years[$mainpage];
	$html	=	file_get_html($link);
	$check	=	$html->find("h5[plaintext^=Diary No]",0)->plaintext;
	echo "$check\n";
    $x++;
	} 
	while ($check == "" || check == null);
}
?>

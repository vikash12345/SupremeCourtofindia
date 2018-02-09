<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

$years	= array('2000');

for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	$linkabc	=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='.'1'.'&d_yr='.$years[$mainpage];
	$htmlcheck		=	file_get_html($linkabc);
	$check		=	$htmlcheck->find("h5[plaintext^=Diary No]",0)->plaintext;
	$x = 1; 
	while($check != "")
	{
		$link	=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='.$x.'&d_yr='.$years[$mainpage];
		$html	=	file_get_html($link);
		$check	=	$html->find("h5[plaintext^=Diary No]",0)->plaintext;
		$record = array('link' => $link 'check' =>$check);
		scraperwiki::save(array('link','check'), $record);
		echo "$check\n";
		$x++;
		
	}
}
?>

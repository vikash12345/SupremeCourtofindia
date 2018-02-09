<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

$years	= array('1950');

for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	$x = 2;
	$link	=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='.$x.'&d_yr='.$years[$mainpage];
	$html	=	file_get_html($link);
	$not	=	$html->find("font[plaintext^=Case Not Found]",0)->plaintext;
	echo "$not\n";
	$record = array( 'check' =>$check, 'link' => $link);
		scraperwiki::save(array('check','link'), $record);
	/*while ($not != "Case Not Found")
	{	
		$check	=	$html->find("h5[plaintext^=Diary No]",0)->plaintext;
		
		echo "$check\n";
		$x++;
	}*/
	
	
}
?>

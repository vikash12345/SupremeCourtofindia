<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$years	= array('1996');
for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	 
	$linkabc		=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no=1&d_yr='.$years[$mainpage];
	$htmlcheck		=	file_get_html($linkabc);
	$checking		=	$htmlcheck->find("h5[plaintext^=Diary No]",0)->plaintext;

	$loop =   1;
    $RecordFlag =   true;
	while($RecordFlag == true) 
	{
  		if (!$checking) 
							{
								$RecordFlag =   false;
								break;
							}	
		
		$link	=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='.$loop.'&d_yr='.$years[$mainpage];
		$html	=	file_get_html($link);
		$check	=	$html->find("h5[plaintext^=Diary No]",0)->plaintext;
		$record = array('link' => $link ,  'check' =>$check);
		scraperwiki::save(array('link','check'), $record);
		echo "$check\n";
		$loop++;
		
		
	} 
}
?>

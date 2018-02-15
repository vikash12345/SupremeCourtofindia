<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$years	= array('1950');
for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	$loop =   1;
    	$RecordFlag =   true;
	while($RecordFlag == true) 
	{
	$linkabc		=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no=.$loop.&d_yr='.$years[$mainpage];
	$htmlcheck		=	file_get_html($linkabc);
	$checking		=	$htmlcheck->find("h5[plaintext^=Diary No]",0)->plaintext;
	echo "$checking\n";
			if (!$checking) 
							{
								$RecordFlag =   false;
								break;
							}	
		$record = array('link' => $linkabc ,  'check' =>$checking);
		scraperwiki::save(array('link','check'), $record);
		$loop	+=  1;
		
		
		
		
	} 
}
?>

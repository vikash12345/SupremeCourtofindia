<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$years	= array('1950');
for ($mainpage = 0; $mainpage < sizeof($years); $mainpage++)
{
	$RecordLoop =  0;
    	$RecordFlag =   true;
	while($RecordFlag == true) 
	{
	$RecordLoop	+=  1;
	$linkabc		=	'http://supremecourtofindia.nic.in/php/case_status/case_status_process.php?d_no='. $RecordLoop .'&d_yr='.$years[$mainpage];
	$htmlcheck		=	file_get_html($linkabc);
	if($htmlcheck)
	{
	$checking		=	$htmlcheck->find("/html/body/h5[1]",0)->plaintext;
	sleep(5);	
		$record = array('link' => $linkabc ,  'check' => $checking);
		scraperwiki::save(array('link','check'), $record);
	}
		
		if (!$checking) 
		{
			$RecordFlag =   false;
			break;
			echo "Link finished";
		}
		
		
		
		
		
	} 
}
?>

<?php
/*
 *	ABN Lookup sample in PHP.
 *
 *  Written by Ben Hitchcock 9th Oct 2007.
 *  Distributed under the terms of the LGPL.
 *
 *	Based on wsdlclient1.php by snichol, and clientSideValidation.htm by the Australian Government.
 *
 *  Uses the NuSoap library located here: http://sourceforge.net/projects/nusoap/, distributed under the LGPL.
 *
 *	Service: ABN Lookup
 *	Payload: document/literal
 *	Transport: http
 *	Authentication: none
 */
 
if(isset($_POST['TextBoxGUID']))
{
	require_once('lib/nusoap.php');
	$proxyhost = '';
	$proxyport = '';
	$proxyusername = '';
	$proxypassword = '';
	
	$client = new nusoap_client('http://abr.business.gov.au/abrxmlsearch/ABRXMLSearch.asmx?WSDL', 
  'true', $proxyhost, $proxyport, $proxyusername, $proxypassword);
	// $client = new soapclient('https://abr.business.gov.au/abrxmlsearch/ABRXMLSearch.asmx?WSDL', true,
							// $proxyhost, $proxyport, $proxyusername, $proxypassword);
	$err = $client->getError();
	if ($err) 
	{
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	}
	// Doc/lit parameters get wrapped
	
	
	
	$param = array('searchString' => $_POST['TextBoxABN'],
					'includeHistoricalDetails' => 'Y',
					'authenticationGuid' => $_POST['TextBoxGUID']);
	$result = $client->call('SearchByABNv201205', array('parameters' => $param), '', '', false, true);

	// Check for a fault
	if ($client->fault) 
	{
		echo '<h2>Fault</h2><pre>';
		print_r($result);
		echo '</pre>';
	} else 
	{
		// Check for errors
		$err = $client->getError();
		if ($err) 
		{
			// Display the error
			echo '<h2>Error</h2><pre>' . $err . '</pre>';
		} else 
		{
			
			// Display the result
			$resultJson = json_encode($result);
			echo $resultJson;
		}
	}

}
?>

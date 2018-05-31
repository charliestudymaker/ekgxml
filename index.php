<?php

$LINEDL = "<br>";
include_once('class.xmltoarray.php');

   $CWD = getcwd();
//    echo "BASE NAME = " .  basename($CWD . "/test.xml") . "<br>";

   $filename = "test.xml";
   $FILENAME = $filename;

    $handle = fopen ($filename, "rb");
    if ($handle)
    {
        $contents = fread ($handle, filesize ($filename));
    $xmlObj    = new XmlToArray($contents);
    $arrayData = $xmlObj->createArray();

    echo "<pre>";
    
//    print_r($arrayData["restingecgdata"]["dataacquisition"][0]["acquirer"][0]);

    $ACQ = $arrayData["restingecgdata"]["dataacquisition"][0]["acquirer"][0];

foreach ($ACQ as $f=>$val)
	{
	if (($val) && (!is_array($val)))
	   XOutPut($f,$val);
	}


//    print_r($arrayData["restingecgdata"]["patient"]);

$PATID = $arrayData["restingecgdata"]["patient"][0]["generalpatientdata"][0]["patientid"];
$LASTNAME = $arrayData["restingecgdata"]["patient"][0]["generalpatientdata"][0]["name"][0]["lastname"];
$FIRSTNAME = $arrayData["restingecgdata"]["patient"][0]["generalpatientdata"][0]["name"][0]["firstname"];

	   XOutPut("patientid",$PATID);
	   XOutPut("lastname",$LASTNAME);
	   XOutPut("firstname",$FIRSTNAME);


	}  // if file $handle


function XOutPut($n,$v)
	 {
	 global $FILENAME;
	 global $LINEDL;

		echo $FILENAME . "|" .  $n . "|" . $v . $LINEDL;	 

	 }
?>



<?php
mysql_connect('localhost', 'root', '') or die(mysql_error());
echo 'Connection to MySQL established<br />';
mysql_select_db('csv_db');
echo 'Connected to csv_db<br />';

$result = mysql_query('SELECT * FROM tbl_name WHERE company="Citigroup Inc."');
	if (!$result) {
		echo("<p>There was an error performing the query: " . mysql_error() . "</p>");
		exit();
	}
	
//Ought to change these to non-snake case
$company = mysql_query('SELECT company FROM tbl_name WHERE company="Citigroup Inc."');
$score = mysql_query('SELECT score FROM tbl_name WHERE company="Citigroup Inc."');
$rating = mysql_query('SELECT rating FROM tbl_name WHERE company="Citigroup Inc."');
$prohibit_direct = mysql_query('SELECT prohibit_direct FROM tbl_name WHERE company="Citigroup Inc."');
$prohibit_ie = mysql_query('SELECT prohibit_ie FROM tbl_name WHERE company="Citigroup Inc."');
$prohibit_trade_assoc = mysql_query('SELECT prohibit_trade_assoc FROM tbl_name WHERE company="Citigroup Inc."');
$prohibit_ballot_measure = mysql_query('SELECT prohibit_ballot_measure FROM tbl_name WHERE company="Citigroup Inc."');
$disclose_direct = mysql_query('SELECT disclose_direct FROM tbl_name WHERE company="Citigroup Inc."');
$disclose_ie = mysql_query('SELECT disclose_ie FROM tbl_name WHERE company="Citigroup Inc."');
$disclose_trade_asssoc = mysql_query('SELECT disclose_trade_asssoc FROM tbl_name WHERE company="Citigroup Inc."');
$disclose_ballot_measure = mysql_query('SELECT disclose_ballot_measure FROM tbl_name WHERE company="Citigroup Inc."');
//This is gross. Change it. Also, it's not working correctly
$archive_reports = mysql_query('SELECT archive_reports FROM tbl_name WHERE company="Citigroup Inc."');
echo mysql_result($archive_reports, 0);
if ($archive_reports == 'y')
	$archive_reports = '<td class="yes">&#10003</td>';
	else
		$archive_reports = '<td class="no">X</td>';
$board_oversight = mysql_query('SELECT board_oversight FROM tbl_name WHERE company="Citigroup Inc."');
$semiannual_reports = mysql_query('SELECT semiannual_reports FROM tbl_name WHERE company="Citigroup Inc."');
$policy_url = mysql_query('SELECT policy_url FROM tbl_name WHERE company="Citigroup Inc."');
$wiki_url = mysql_query('SELECT wiki_url FROM tbl_name WHERE company="Citigroup Inc."');

echo
'<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Corporate Cash</title>
	<link rel="stylesheet" type="text/css" href="css1.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
</head>
<body>

<div id="container">

<!-- ----------Header--------------- -->
<img id="logo" src="../Images/LogoV4.png" alt="Corporate Cash logo" height="100px" />
<div id="projectOf">
	<p>A project of <br />
	Americans for <br />
	People Powered Politics</p>
</div>
<br clear="both">

<!-- NavBar -------------------------->
<div id="navbar">
  <ul id="list-nav">
	<li><a href="#" onclick="">About</a></li>
	<li><a href="#" onclick="">The Problem</a></li>
	<li><a href="#" onclick="">The Solution</a></li>
	<li><a href="#" onclick="">Compare Corporations</a></li>
	<li><a href="#" onclick="">Act</a></li>
</ul>
</div>
<br style="clear:both" />

<!-- --------Main Body---------- -->

<div class="corpLogo">
<img src="../Images/CorpLogos/citi-logo.png" alt="Citi Logo" width="100px" >
</div>

<h1 class="corpName">', mysql_result($company, 0), '</h1>

<div>
<img src="../Images/stamp-irresponsible.png" alt="Irresponsible" width="150px;" style="float:left;"
</div>

<br style="clear: both" />

<div class="contentBox">
<p>Americans for People-Powered Politics rates <strong>', mysql_result($company, 0), '</strong>&#39s policies as 
<strong>', mysql_result($rating, 0), '</strong>.</p> 
<p><a href="#" >View APPP&#39s full rating criteria to see why</a>.</p>
</div>

<div class="thankWhipButton"></div>

<table summary="Criteria of rating">
	<tr><th colspan="2">Policies</td></tr>	
	<tr><td>Pledged to not spend treasury money in elections, indirectly or directly</td><td class="no">X</td></tr>
	<tr><td>Pledged to not directly spend treasury money in elections, such as Independent Expenditures and candidate contributions</td><td class="no">X</td></tr>
	<tr><td>Discloses all political spending</td><td class="no">X</td></tr>
	<tr><td>Discloses all direct political spending</td><td class="no">X</td></tr>
	<tr><td>Has board of directors oversight over political spending</td><td class="yes">&#10003</td></tr>
	<tr><td>Archives political spending reports online</td>', $archive_reports, '</tr>
	<tr><td>CPA-Zicklin disclosure score</td><td>44</td></tr>
</table>

<div class="contentBox">
<p><a href="http://www.citigroup.com/citi/corporategovernance/data/ccpcs.pdf?ieNocache=48">View Citigroup Inc.&#39s corporate political spending and disclosure policy.</a></p>
<p><a href="http://en.wikipedia.org/wiki/Citigroup">Learn more about Citigroup Inc. on Wikipedia.</a></p>
</div>

<!-- --------Footer---------- -->
<div id="footer">
	<p class="footerText">Americans for People-Powered Politics &copy; 2012 | 
	Site by Kwality Design </p>
	<p class="footerText"><a href="#" >Contact</a></p>
</div>

</div>

</body>
</html>'
;


?>
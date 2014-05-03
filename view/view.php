<?php

/*

    CampusRoster
    Copyright (C) <2013> <Riju M>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

*/


if($_COOKIE['auth']!="1"){
echo "<html><head>
<meta http-equiv='REFRESH' content='0;url=./'></HEAD>
</head><body></body></html>";
exit();
}

?>
<html>
<head><title>GCELT1014/CampusRoster/View</title>
<link href="../style/style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="../css/jquery-ui.custom.min.css" />
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.custom.min.js"></script>
<script src="../js/submit.js"></script>
<script src="../js/validate.js"></script>
<script>
$(function() {
$( "#tabs" ).tabs();
});

function toTab(x){
document.getElementById(x).click();
}

</script>
</head>
<body>
<div class="banner">GCELT1014/CampusRoster</div>
<div align="center"><a href="landing.html">Home</a></div>
<br>

<?php
include('../lib/opendb.php');
$st=$_GET['st'];
if(empty($st)){
	$st="CSE";
	}
	


$query = "select uniroll, name, basic.sex, basic.stream, basic.dob, contact.addrPerma, contact.addrPresent, contact.phone, mail, academ.backCurr, academ.backPrev, academ.sgpa1, academ.sgpa2, academ.sgpa3, academ.sgpa4, academ.sgpa5, academ.sgpa6, academ.sgpa7, academ.sgpa8, academ.cgpa, academ.avg, training.trainDetail, training.duration, history.pct10, history.board10, history.yop10, history.pct12, history.board12, history.yop12, history.pctDip, history.boardDip, history.yopDip, history.rankWbjee, history.rankJelet from entity inner join basic on entity.eid=basic.eid inner join contact on entity.eid=contact.eid inner join academ on entity.eid=academ.eid inner join training on entity.eid=training.eid inner join history on entity.eid=history.eid WHERE basic.stream LIKE '$st' AND delStatus=0 ORDER BY uniroll";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
	echo "<table class='viewtable'>";
	echo "<tr class='viewhead'><td>University Roll</td><td>Name</td><td>Sex</td><td> Stream</td><td>DOB</td><td>Permanent Address</td><td>Present Address</td><td>Phone</td><td>Mail</td><td> Current Backlogs</td><td> Previous Backlogs</td><td> SGPA1</td><td> SGPA2</td><td> SGPA3</td><td>SGPA4</td><td> SGPA5</td><td> SGPA6</td><td> SGPA7</td><td> SGPA8</td><td> CGPA</td><td> AVG</td><td>Industrial Training</td><td>Duration</td><td> X %age</td><td> X Board</td><td> X Year</td><td>XII %</td><td>XII Board</td><td> XII Year</td><td> Diploma %</td><td> Diploma Board</td><td> Diploma Year</td><td> WBJEE Rank</td><td> JELET rank</td></tr>";
	while($row=mysql_fetch_row($res)){
		echo "<tr>";
		
			for($j=0;$j< mysql_num_fields($res);$j++){
				echo "<td>$row[$j]</td>";
			}
		
		echo "</tr>";
	}
	echo "</table>";
}else{
echo "No registrations yet under $st";
}
}else{
echo "DB Error";
}
include('../lib/closedb.php');
?>

</body>
</html>

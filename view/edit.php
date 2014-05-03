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
<script src="../js/edit.js"></script>
<script src="../js/validate.js"></script>
</head>
<body>
<div class="banner">GCELT1014/CampusRoster</div>
<div align="center"><a href="landing.html">Home</a></div>
<br>
<div class="nav">

<?php
include('../lib/opendb.php');
$roll=$_GET['r'];
$ismod=$_COOKIE['mod'];
if($ismod!="1"){
//cannot modify, not a moderator
echo "You do not have the privilleges required to Edit this entry..";
}else{
?>
<div class="subhead" align="center">Edit</div>
<?php
if(empty($roll)){
	echo "No roll supplied";
	}else{


$query = "select uniroll, name, basic.sex, basic.stream, basic.dob, contact.addrPerma, contact.addrPresent, contact.phone, mail, academ.backCurr, academ.backPrev, academ.sgpa1, academ.sgpa2, academ.sgpa3, academ.sgpa4, academ.sgpa5, academ.sgpa6, academ.sgpa7, academ.sgpa8, academ.cgpa, academ.avg, training.trainDetail, training.duration, history.pct10, history.board10, history.yop10, history.pct12, history.board12, history.yop12, history.pctDip, history.boardDip, history.yopDip, history.rankWbjee, history.rankJelet, entity.eid, history.category from entity inner join basic on entity.eid=basic.eid inner join contact on entity.eid=contact.eid inner join academ on entity.eid=academ.eid inner join training on entity.eid=training.eid inner join history on entity.eid=history.eid WHERE uniroll = '$roll' AND delStatus=0 ORDER BY uniroll LIMIT 1";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
$row=mysql_fetch_row($res);
//////////////////////////////
?>
<table class="previewTable">
<tr><td>Roll</td><td><input type="text" id="roll" value="<?php echo $row[0]; ?>" /></td></tr>
<tr><td>Name</td><td><input type="text" id="name" value="<?php echo $row[1]; ?>" /></td></tr>
<tr><td>Sex</td><td><input type="text" id="sex" value="<?php echo $row[2]; ?>" /></td></tr>
<tr><td>Stream</td><td><input type="text" id="stream" value="<?php echo $row[3]; ?>" /></td></tr>
<tr><td>DOB</td><td><input type="text" id="dob" value="<?php echo $row[4]; ?>" /></td></tr>
</table>
<hr>
<table class="previewTable">
<tr><td>Permanent Address</td><td><input  type="text" id="add1" value="<?php echo $row[5]; ?>" /></td></tr>
<tr><td>Present Address</td><td><input type="text" id="add2" value="<?php echo $row[6]; ?>" /></td></tr>
<tr><td>Phone</td><td><input type="text" id="ph" value="<?php echo $row[7]; ?>" /></td></tr>
<tr><td>Mail</td><td><input type="text" id="mail" value="<?php echo $row[8]; ?>" /></td></tr>
</table>
<hr>
<table class="previewTable">
<tr><td>Past backlogs</td><td><input type="text" id="pb" value="<?php echo $row[10]; ?>" /></td></tr>
<tr><td>Present backlogs</td><td><input type="text" id="cb" value="<?php echo $row[9]; ?>" /></td></tr>
<tr><td>SGPA1</td><td><input type="text" id="p1" value="<?php echo $row[11]; ?>" /></td></tr>
<tr><td>SGPA2</td><td><input type="text" id="p2" value="<?php echo $row[12]; ?>" /></td></tr>
<tr><td>SGPA3</td><td><input type="text" id="p3" value="<?php echo $row[13]; ?>" /></td></tr>
<tr><td>SGPA4</td><td><input type="text" id="p4" value="<?php echo $row[14]; ?>" /></td></tr>
<tr><td>SGPA5</td><td><input type="text" id="p5" value="<?php echo $row[15]; ?>" /></td></tr>
<tr><td>SGPA6</td><td><input type="text" id="p6" value="<?php echo $row[16]; ?>" /></td></tr>
<tr><td>SGPA7</td><td><input type="text" id="p7" value="<?php echo $row[17]; ?>" /></td></tr>
<tr><td>SGPA8</td><td><input type="text" id="p8" value="<?php echo $row[18]; ?>" /></td></tr>
<tr><td>CGPA</td><td><input type="text" id="cgpa" value="<?php echo $row[19]; ?>" /></td></tr>
<tr><td>Avg</td><td><input type="text" id="avg" value="<?php echo $row[20]; ?>" /></td></tr>
</table>
<hr>
<table class="previewTable">
<tr><td>Industrial Training</td><td><input type="text" id="td" value="<?php echo $row[21]; ?>" /></td></tr>
<tr><td>Duration</td><td><input type="text" id="tw" value="<?php echo $row[22]; ?>" /></td></tr>
</table>
<hr>
<table class="previewTable">
<tr><td>X %</td><td><input type="text" id="p10" value="<?php echo $row[23]; ?>" /></td></tr>
<tr><td>X Board</td><td><input type="text" id="b10" value="<?php echo $row[24]; ?>" /></td></tr>
<tr><td>X Year</td><td><input type="text" id="y10" value="<?php echo $row[25]; ?>" /></td></tr>
<tr><td>XII %</td><td><input type="text" id="p12" value="<?php echo $row[26]; ?>" /></td></tr>
<tr><td>XII Board</td><td><input type="text" id="b12" value="<?php echo $row[27]; ?>" /></td></tr>
<tr><td>XII Year</td><td><input type="text" id="y12" value="<?php echo $row[28]; ?>" /></td></tr>
<tr><td>Category</td><td><input type="text" id="category" value="<?php echo $row[35]; ?>" /></td></tr>
<tr><td>Diploma %</td><td><input type="text" id="pDip" value="<?php echo $row[29]; ?>" /></td></tr>
<tr><td>Diploma board</td><td><input type="text" id="bDip" value="<?php echo $row[30]; ?>" /></td></tr>
<tr><td>Diploma year</td><td><input type="text" id="yDip" value="<?php echo $row[31]; ?>" /></td></tr>
<tr><td>WBJEE rank</td><td><input type="text" id="rWB" value="<?php echo $row[32]; ?>" /></td></tr>
<tr><td>JELET rank</td><td><input type="text" id="rJEL" value="<?php echo $row[33]; ?>" /></td></tr>
</table>
<br>
<div align="center"><input type="button" id="subButton" class="submitButton" value="COMMIT" onclick="editDetails('<?php echo $row[34];?>')">
<div id="status">
</div>
<br><br>
<?php
//////////////////////////////
}
else{
echo "Wrong roll... ";
}
}
}
}
include('../lib/closedb.php');
?>

<div id="status" align="center"></div>
</div>
</body>
</html>

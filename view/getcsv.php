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
exit();
}

?>
<?php
include('../lib/opendb.php');
$st=$_GET['st'];
if(empty($st)){
	$st="CSE";
	}
	
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=Registrations-$st.csv");

$query = "select uniroll, name, basic.sex, basic.stream, basic.dob, contact.addrPerma, contact.addrPresent, contact.phone, mail, academ.backCurr, academ.backPrev, academ.sgpa1, academ.sgpa2, academ.sgpa3, academ.sgpa4, academ.sgpa5, academ.sgpa6, academ.sgpa7, academ.sgpa8, academ.cgpa, academ.avg, training.trainDetail, training.duration, history.pct10, history.board10, history.yop10, history.pct12, history.board12, history.yop12, history.pctDip, history.boardDip, history.yopDip, history.rankWbjee, history.rankJelet from entity inner join basic on entity.eid=basic.eid inner join contact on entity.eid=contact.eid inner join academ on entity.eid=academ.eid inner join training on entity.eid=training.eid inner join history on entity.eid=history.eid WHERE basic.stream LIKE '$st' AND delStatus=0 ORDER BY uniroll";
$res=mysql_query($query);
if($res){
if(mysql_num_rows($res)>0){
	//echo "<table class='viewtable'>";
	echo "\"University Roll\",\"Name\",\"Sex\",\" Stream\",\"DOB\",\"Permanent Address\",\"Present Address\",\"Phone\",\"Mail\",\" Current Backlogs\",\" Previous Backlogs\",\" SGPA1\",\" SGPA2\",\" SGPA3\",\"SGPA4\",\" SGPA5\",\" SGPA6\",\" SGPA7\",\" SGPA8\",\" CGPA\",\" AVG\",\"Industrial Training\",\"Duration\",\" X %age\",\" X Board\",\" X Year\",\"XII %\",\"XII Board\",\" XII Year\",\" Diploma %\",\" Diploma Board\",\" Diploma Year\",\" WBJEE Rank\",\" JELET rank\"\n";
	while($row=mysql_fetch_row($res)){
		//echo "<tr>";
		
			for($j=0;$j< mysql_num_fields($res);$j++){
				if($j!=(mysql_num_fields($res)-1))
					echo "\"".str_replace("\"","\"\"",$row[$j])."\",";
				else
					echo "\"".str_replace("\"","\"\"",$row[$j])."\"";
			}
		
		echo "\n";
	}
	//echo "</table>";
}else{
echo "No registrations yet under $st\n";
}
}else{
echo "DB Error\n";
}
include('../lib/closedb.php');
?>

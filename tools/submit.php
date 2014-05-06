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


//submit.php
include('../lib/opendb.php');
//basics
$roll=$_POST['r'];
$mail=$_POST['m'];
$name=$_POST['n'];
$middleName=$_POST['mn'];
$surname=$_POST['sn'];
$sex=$_POST['sx'];
$stream=$_POST['str'];
$dob=$_POST['dob'];

//history
$p10=$_POST['p10'];
$b10=$_POST['b10'];
$y10=$_POST['y10'];
$p12=$_POST['p12'];
$b12=$_POST['b12'];
$y12=$_POST['y12'];
$pDip=$_POST['pDip'];
$bDip=$_POST['bDip'];
$yDip=$_POST['yDip'];
$rWB=$_POST['rWB'];
$rJEL=$_POST['rJEL'];
$category=$_POST['cat'];

//contact
$add1=$_POST['add1'];
$add2=$_POST['add2'];
$ph=$_POST['ph'];

//academics
$cb=$_POST['cb'];
$pb=$_POST['pb'];
$p1=$_POST['p1'];
$p2=$_POST['p2'];
$p3=$_POST['p3'];
$p4=$_POST['p4'];
$p5=$_POST['p5'];
$p6=$_POST['p6'];
$p7=$_POST['p7'];
$p8=$_POST['p8'];
$cgpa=$_POST['cgpa'];
$avg=$_POST['avg'];

//training
$td=$_POST['td'];
$tw=$_POST['tw'];

//eid
$eid='0';

//entity
$query="INSERT INTO entity(mail, uniroll, name, middleName, surname) VALUES('$mail','$roll','$name','$middleName','$surname')";
$res=mysql_query($query);
if($res){
$eid=mysql_insert_id();
}else{
echo "ER1";
echo "$query";
exit();
}
//basics
$query="INSERT INTO basic(eid, sex, stream, dob) VALUES('$eid','$sex','$stream','$dob')";
$res=mysql_query($query);
if($res){

}else{
echo "ER2";
echo "$query";
exit();
}
//history
$query="INSERT INTO history(eid,pct10,board10,yop10,pct12,board12,yop12,category,pctDip,boardDip,yopDip,rankWbjee,rankJelet) VALUES('$eid','$p10','$b10','$y10','$p12','$b12','$y12','$category','$pDip','$bDip','$yDip','$rWB','$rJEL')";
$res=mysql_query($query);
if($res){

}else{
echo "ER3";
echo "$query";
exit();
}
//contact
$query="INSERT INTO `contact`(`addrPerma`, `addrPresent`, `phone`, `eid`) VALUES ('$add1','$add2','$ph','$eid')";
$res=mysql_query($query);
if($res){

}else{
echo "ER4";
echo "$query";
exit();
}
//academics
$query="INSERT INTO `academ`(`eid`, `backCurr`, `backPrev`, `sgpa1`, `sgpa2`, `sgpa3`, `sgpa4`, `sgpa5`, `sgpa6`, `sgpa7`, `sgpa8`, `cgpa`, `avg`) VALUES ('$eid','$pb','$cb','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$cgpa','$avg')";
$res=mysql_query($query);
if($res){

}else{
echo "ER5";
echo "$query";
exit();
}
//training
$query="INSERT INTO `training`(`eid`, `trainDetail`, `duration`) VALUES ('$eid','$td','$tw')";
$res=mysql_query($query);
if($res){

}else{
echo "ER6";
echo "$query";
exit();
}

//success msg
echo "RS";

include('../lib/closedb.php');


?>

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


include('../lib/opendb.php');
$u=$_POST['u'];
$p=$_POST['p'];

$query="SELECT banned, moderator, mid, user, admin FROM monitors WHERE user='$u' AND pass='$p'";
$res=mysql_query($query);

if($res){
if(mysql_num_rows($res)==1){
$row=mysql_fetch_row($res);
if($row[0]=="0"){
	setCookie("auth","1"); //else banned, get lost
	setCookie("id",$row[2]);
	setCookie("user",$row[3]);
	}else{
	setCookie("auth","0");
	echo "b";
	include('../lib/closedb.php');
	exit();
	}
if($row[1]=="1" && $row[0]=="0") //can moderate if not banned
	setCookie("mod","1");
else
	setCookie("mod","0");
	
if($row[4]=="1" && $row[0]=="0") //can administer if not banned
	setCookie("gs","1"); //german shephard, administrators of a farm
else
	setCookie("gs","0");
	

echo "s";
}else{
echo 'f';
}
}else{
echo "f";
}

include('../lib/closedb.php');
?>

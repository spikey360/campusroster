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
exit(); //unauthorised access
}

if($_COOKIE['gs']!="1"){
exit(); //unauthorised access, not an admin, can't execute script
}

?>
<?php
//mode make(m) or break(b)
$m=$_GET['m'];
//action ban(b) make_mod(m) make_monitor(mo)
$a=$_GET['a'];

$id=$_GET['id'];

$u=$_GET['u'];
$p=$_GET['p'];

include('../lib/opendb.php');

//implement ban
if($a=="b"){
	if($m=="m"){
		$query="UPDATE monitors SET banned=1 WHERE mid=$id AND admin=0"; //cannot ban an admin
		$res=mysql_query($query);
		if($res){
			echo "S";
		}else{
			echo "F";
		}
		include('../lib/closedb.php');
		exit();
	}
	if($m=="b"){//break a ban
		$query="UPDATE monitors SET banned=0 WHERE mid=$id"; //anyones ban can be broken
		$res=mysql_query($query);
		if($res){
			echo "S";
		}else{
			echo "F";
		}
		include('../lib/closedb.php');
		exit();
	}
}

//implement moderation
if($a=="m"){
	if($m=="m"){
		$query="UPDATE monitors SET moderator=1 WHERE mid=$id"; //
		$res=mysql_query($query);
		if($res){
			echo "S";
		}else{
			echo "F";
		}
		include('../lib/closedb.php');
		exit();
	}
	if($m=="b"){//break a ban
		$query="UPDATE monitors SET moderator=0 WHERE mid=$id AND admin=0"; //privileges of an admin are supreme, cannot revoke moderation capability of another admin
		$res=mysql_query($query);
		if($res){
			echo "S";
		}else{
			echo "F";
		}
		include('../lib/closedb.php');
		exit();
	}
}

//implement monitor making
if($a=="mo"){
$query="INSERT INTO monitors(user, pass) VALUES('$u','$p')";
$res=mysql_query($query);
if($res){
	echo "S"; //account made
	
}else{
	echo "F"; //account creation failed
}
}

include('../lib/closedb.php');
?>

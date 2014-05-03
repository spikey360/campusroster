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
$t=$_POST['t'];
$f=$_POST['f'];
$s=$_POST['s'];
$m=$_POST['m'];
include('../lib/opendb.php');
$query="INSERT INTO `messages`(`from`, `to`, `subj`, `msg`) VALUES(\"$f\",\"$t\",\"$s\",\"$m\")";
$res=mysql_query($query);
if($res){
echo "MS";
}else{
echo "MF";
}
include('../lib/closedb.php');
?>

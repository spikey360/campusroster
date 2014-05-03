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

$query="SELECT * FROM monitors WHERE user='$u' AND pass='$p'";
$res=mysql_query($query);

if($res){
if(mysql_num_rows($res)>0){
setCookie("auth","1");
echo "s";
}else{
echo 'f';
}
}else{
echo "f";
}

include('../lib/closedb.php');
?>

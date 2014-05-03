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

function setVal(a,b){
document.getElementById(a).innerHTML="<b>"+b+"</b>";
}

function updatePreview(){
//basics and mail
mail=document.getElementById('mail').value;
setVal('pvMail',mail);
roll=document.getElementById('roll').value;
setVal('pvRoll',roll);
name=document.getElementById('name').value;
setVal('pvName',name);
stream=document.getElementById('stream');
//add
sexFemale=document.getElementById('female');
dob=document.getElementById('dob').value;
setVal('pvDob',dob);
sex="M";
if(sexFemale.checked){sex="F";}
setVal('pvSex',sex);
strm="";
for(i=0;i<stream.length;i++){
	if(stream.options[i].selected){
		strm=stream.options[i].value;
		}
	}
setVal('pvStream',strm);
	
//history
p10=document.getElementById('p10').value;
setVal('pvP10',p10);
b10s=document.getElementById('b10');
b10="";
for(i=0;i<b10s.length;i++){
	if(b10s.options[i].selected){
		b10=b10s.options[i].value;
		}
	}
if(b10=="OTHER"){b10=document.getElementById('o10').value;}
setVal('pvB10',b10);
y10=document.getElementById('y10').value;
setVal('pvY10',y10);
p12=document.getElementById('p12').value;
setVal('pvP12',p12);
b12s=document.getElementById('b12');
b12="";
for(i=0;i<b12s.length;i++){
	if(b12s.options[i].selected){
		b12=b12s.options[i].value;
		}
	}
if(b12=="OTHER"){b12=document.getElementById('o12').value;}
setVal('pvB12',b12);
y12=document.getElementById('y12').value;
setVal('pvY12',y12);
pDip=document.getElementById('pDip').value;
setVal('pvPDip',pDip);
bDip=document.getElementById('bDip').value;
setVal('pvBDip',bDip);
yDip=document.getElementById('yDip').value;
setVal('pvYDip',yDip);
rWB=document.getElementById('rWB').value;
setVal('pvRWB',rWB);
rJEL=document.getElementById('rJEL').value;
setVal('pvRJEL',rJEL);

//contact
add1=document.getElementById('add1').value;
setVal('pvAdd1',add1);
add2=document.getElementById('add2').value;
setVal('pvAdd2',add2);
ph=document.getElementById('ph').value;
setVal('pvPh',ph);

//academics
cb=document.getElementById('cb').value;
setVal('pvCb',cb);
pb=document.getElementById('pb').value;
setVal('pvPb',pb);
p1=document.getElementById('p1').value;
setVal('pvP1',p1);
p2=document.getElementById('p2').value;
setVal('pvP2',p2);
p3=document.getElementById('p3').value;
setVal('pvP3',p3);
p4=document.getElementById('p4').value;
setVal('pvP4',p4);
p5=document.getElementById('p5').value;
setVal('pvP5',p5);
p6=document.getElementById('p6').value;
setVal('pvP6',p6);
p7=document.getElementById('p7').value;
setVal('pvP7',p7);
p8=document.getElementById('p8').value;
setVal('pvP8',p8);
cgpa=document.getElementById('cgpa').value;
setVal('pvCgpa',cgpa);
avg=document.getElementById('avg').value;
setVal('pvAvg',avg);

//training
td=document.getElementById('trainDetails').value;
setVal('pvTd',td);
tw=document.getElementById('trainWeeks').value;
setVal('pvTw',tw);

}

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

//validate.js: validation script
function validateMail(x){
	mailpatrn="[a-z0-9]*[@]{1}[a-z0-9]*[\\.]{1}[a-z]{3}|[a-z0-9]*[@]{1}[a-z0-9]*[\\.]{1}[a-z]{2}[\\.]{1}[a-z]{2}";
	regex=new RegExp(mailpatrn);
	return regex.test(x);
}

function validate(x,y){
	//x is the string to be evaluated, y the string to be eval'd by
	regex=new RegExp(y);
	return regex.test(x);
}

function validateAll(){
	mail=document.getElementById('email').value;
	if(!validateMail(mail)){
		window.alert("Invalid mail");
		return false;
	}
	name=document.getElementById('name').value;
	if(!validate(name,"[a-zA-Z]*[\\s]{1}[a-zA-Z]*|[a-zA-Z]*[\\s]{1}[a-zA-Z]*[\\s]{1}[a-zA-Z]*")){
		window.alert("Invalid name. Provide full name");
		return false;
	}
	seq1=document.getElementById('seq1').value;
	seq2=document.getElementById('seq2').value;
	if(seq1.length==0 || seq2.length==0){
		window.alert("Null Protein sequence disallowed");
		return false;
	}
	
	return true;
}

function validateJobid(){
	id=document.getElementById('job').value;
	if(!validate(id,"[0-9]{10}")){
		//only allow 10-digit job id, nothing else
		return false;
	}
	return true;
}

function flashDetails(val,tab,field,gotoTab){
	if(val.length==0){
	document.getElementById('status').innerHTML="Seems like you missed the <b>"+field+"</b> in your <b>"+tab+"</b> details..! Do fill it up.";
	toTab(gotoTab);
	return false;
	}else{
	
	}
	return true;
}

function disableOtherBranch(jee){
	if(jee){
		document.getElementById('pDip').value="";
		document.getElementById('bDip').value="";
		document.getElementById('yDip').value="";
		document.getElementById('rJEL').value="";
		document.getElementById('pDip').disabled=true;
		document.getElementById('bDip').disabled=true;
		document.getElementById('yDip').disabled=true;
		document.getElementById('rJEL').disabled=true;
		document.getElementById('rWB').disabled=false;
		document.getElementById('p1').disabled=false;
		document.getElementById('p2').disabled=false;
	}else{
		document.getElementById('rWB').value="";
		document.getElementById('p1').value="";
		document.getElementById('p2').value="";
		document.getElementById('rWB').disabled=true;
		document.getElementById('p1').disabled=true;
		document.getElementById('p2').disabled=true;
		document.getElementById('pDip').disabled=false;
		document.getElementById('bDip').disabled=false;
		document.getElementById('yDip').disabled=false;
		document.getElementById('rJEL').disabled=false;

	}
}

function calcAvg(){
//k=new Array();
/*c=0;
s=0;
for(i=1;i<9;i++){
j=parseFloat(document.getElementById('p'+i).value);
if(j==NaN){
}else{
c++;
s+=j;
}

}
alert("s"+s+";c"+c);
avg=s/c;
document.getElementById('avg').value=avg;
*/
}

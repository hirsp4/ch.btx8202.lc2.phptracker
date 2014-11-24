/* 
 * tracktable.js
 *
 * This file loads the dynamic content of the main div container in the home.php.
 *
 * @author Patrick Hirschi <patrick.hirschi@students.bfh.ch>
 * @version 1.0
 * @date 24-11-2014
 *
 * Copyright (c) 2014 Berner Fachhochschule. All rights reserved.
 */
var xmlHttp
var gtin
var serial
var sscc

function generateTable() {
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null) {
	  alert ("Your browser does not support AJAX!");
	  return;
	} 
  xmlHttp.onreadystatechange=function() {
    if (xmlHttp.readyState==4 && xmlHttp.status==200) {
      // set the content of the main container
      document.getElementById("main").innerHTML=xmlHttp.responseText;
    }
  }
  // set the javascript variables based on the user input
  gtin=document.getElementById("ssccsearch").value;
  serial=document.getElementById("serialsearch").value;
  sscc=gtin=document.getElementById("ssccsearch").value;
  // check if gtin search is selected
  if(document.getElementById('gtinradio').checked) {
  var url="gettableWithGTIN.php";
  url=url+"?GTIN="+gtin;
  url=url+"&Serial="+serial;
}else if(document.getElementById('ssccradio').checked) {
  var url="gettableWithSSCC.php";
  url=url+"?SSCC="+sscc;
}
  // open and send the request 
  xmlHttp.open("GET",url,true);
  xmlHttp.send();
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}

function refreshTable(){
	// code for the refresh Button
	document.getElementById("main").innerHTML="";
	generateTable();
}
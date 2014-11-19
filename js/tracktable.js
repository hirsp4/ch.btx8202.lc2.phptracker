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
      document.getElementById("main").innerHTML=xmlHttp.responseText;
    }
  }
  gtin=document.getElementById("ssccsearch").value;
  serial=document.getElementById("serialsearch").value;
  sscc=gtin=document.getElementById("ssccsearch").value;
  if(document.getElementById('gtinradio').checked) {
  var url="gettableWithGTIN.php";
  url=url+"?GTIN="+gtin;
  url=url+"&Serial="+serial;
}else if(document.getElementById('ssccradio').checked) {
  var url="gettableWithSSCC.php";
  url=url+"?SSCC="+sscc;
}
  
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
	document.getElementById("main").innerHTML="";
	generateTable();
}
function updateInput() {
	
	if(document.getElementById("gtinradio").checked){
		document.getElementById("ssccsearch").value="";
		document.getElementById("serialsearch").value="";
		document.getElementById("ssccsearch").placeholder="GTIN";
		document.getElementById("serialsearch").placeholder="Serial";
		document.getElementById("serialsearch").style.display ='block';
    }
    
    if(document.getElementById("ssccradio").checked){
 	    document.getElementById("ssccsearch").value="";
 	    document.getElementById("serialsearch").value="";
 	    document.getElementById("ssccsearch").placeholder="SSCC";
 	    document.getElementById("serialsearch").style.display ='none';
    }
}
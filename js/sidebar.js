/* sidebar.js
 *
 * This file manages the sidebar of the home.php based on the values of 2 radio buttons.
 *
 * @author Patrick Hirschi <patrick.hirschi@students.bfh.ch>
 * @version 1.0
 * @date 24-11-2014
 *
 * Copyright (c) 2014 Berner Fachhochschule. All rights reserved.
 */

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
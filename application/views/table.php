<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  
<style>
@import url('http://fonts.googleapis.com/css?family=Amarante');


html { overflow-y: scroll; }
body { 
  background: #eee url('http://i.imgur.com/eeQeRmk.png'); /* http://subtlepatterns.com/weave/ */
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 62.5%;
  line-height: 1;
  color: #585858;
  padding: 22px 10px;
  padding-bottom: 55px;
}


br { display: block; line-height: 1.6em; } 




strong, b { font-weight: bold; } 

table,tr { border-collapse: collapse; border-spacing: 0; border:2px inset #24A198; }


h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 3.6em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
}


/** page structure **/

#keywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}

#keywords thead tr th { 
  font-weight: bold;
  padding: 12px 30px;
  padding-left: 42px;
}
#keywords thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#keywords thead tr {
  background: #1B9930;
}

#keywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#keywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}


#keywords tbody tr { 
  color: #555;
}
#keywords tbody tr td {
  text-align: center;
  padding: 15px 10px;
}
#keywords tbody tr td.lalign {
  text-align: left;
}

#links{

}

#current{

}


</style>
<link href="<?=base_url('jquery-ui-1.11.2/jquery-ui.css')?>" rel="stylesheet">
<script src="<?=base_url('jquery-ui-1.11.2/external/jquery/jquery.js')?>"></script>
<script src="<?=base_url('jquery-ui-1.11.2/jquery-ui.js')?>"></script>
 
</head>
<body>
	<?=$table?>
	<?=$links?>
	<div id="show"></div>

<script>
$(document).ready(function(){

    var tr = document.getElementsByTagName('tr');
    for(var i=1;i<tr.length;i++){
    	var str=tr[i].children[1].innerHTML;
    	var a1=tr[i].children[6].children[0];
    	a1.value="<?=base_url('index.php/table/test')?>"+'/'+str;
    }
    
   

});
function showInfo(href){
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("show").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("post",href,true);
 		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 		xmlhttp.send();
	}

</script>
</script>
</body>
</html>
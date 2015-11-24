<html>
<head>
<style>



.initial {
color:green;
text-decoration:none;

}
.latter{
color:yellow;
}
</style>

<script>
//document.getElementById('list1').onclick = changeColor;   

    function changeColor() {
	document.getElementById('list1') = changeColor;
        changeColor.style.color = "purple";
        return false;
    }   
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
		var jsonData = JSON.parse(xhttp.responseText);
	//	console.log(jsonData);
		
//parse(jsonData);  
  /* var optionsHTML = ''
        for(var i= 0; i < jsonData.length; i++){
          //optionsHTML+='<option value="'+jsonData[i].color+'">'
		  
            //         + jsonData[i].value+'</option>'
        var node = document.createElement("li");                 // Create a <li> node
		var textnode = document.createTextNode(jsonData[i].color);         // Create a text node
		node.appendChild(textnode);                              // Append the text to <li>
		var node2 = document.createElement("li");                 // Create a <li> node
		//var textnode2 = document.createTextNode(jsonData[i].color);         // Create a text node
		//node2.appendChild(textnode2);  
		document.getElementById("list").appendChild(node);
		//document.getElementById("list2").appendChild(node2);
*/
		
		//}

    }
  }
  xhttp.open("GET", "dictionary.json", true);
  xhttp.send();
}
/*parse(String json)  {
       JsonFactory factory = new JsonFactory();

       ObjectMapper mapper = new ObjectMapper(factory);
       JsonNode rootNode = mapper.readTree(json);  

       Iterator<Map.Entry<String,JsonNode>> fieldsIterator = rootNode.fields();
       while (fieldsIterator.hasNext()) {

           Map.Entry<String,JsonNode> field = fieldsIterator.next();
           console.log("Key: " + field.getKey() + "\tValue:" + field.getValue());
       }
}*/

</script>

</head>
<body>
<div>

<h1 style = "color:green" align="center"> Dictionary</h1>

Search Word: 
<form name="dictionary" id="form" method="POST">
<input id="text" type="text" name="text" value=""> 

<input id="button" type="submit" name="button" value="Search" > 
</form>

</div>

<div>
<?php

$str = file_get_contents('dictionary.json');
$json = json_decode($str, true); // decode the JSON into an associative array
$flag= false;
//print_r ($json);
if(isset ($_POST['button'])){
search();
}
function search(){
   global $flag;
	global $json;
	//print_r ($_POST);
	$word = $_POST['text'];
	//echo $word;
	foreach($json as $x => $x_value) {
   // echo "Key=" . $x . ", Value=" . $x_value;
   // echo "<br>";
   if (strcasecmp($x, $word)==0){
	   echo "<h3> " . $x .  " </h3><br>" . $x_value;
	   $flag=true;
   }
}

if($flag==false){
	
	   echo "<h3> Word not found </h3>";
	
}	
	
}





?>



 

</ul>
</div>

<script>
//loadDoc();
</script>
</body>
</html>
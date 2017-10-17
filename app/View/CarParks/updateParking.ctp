<?php  // $chart->printScripts();  ?>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->




<div id="container"><body>
    
<button onclick="myFunction()">Try it</button>
</body>
</div>


<script type="text/javascript">
    
 function myFunction()
{
alert("Hello World!");
}   
    
$(document).ready(function() {
    alert('ok');
$.get("http://localhost/cakephp-2.4.2/CarPark/nowParking", function(data){
    alert("Data Loaded: " + data);

});
    )}
    
    </script>
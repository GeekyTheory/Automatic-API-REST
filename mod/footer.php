<?php
    if(!isset($urlJson)) $urlJson = "";
    if(!isset($viewTable)) $viewTable = "";
    if(!isset($viewTree)) $viewTree = "";
?>
<script lang="javascript">
    
    if(document.getElementById("customTable")){
        document.getElementById("customTable").style.display='none';
    }
    
    function customSelect(i){
        var camp = "";
        var almostone = false;
        //Order By
        var orderby = document.getElementById("order").value;
        //Lim
        var limMin = document.getElementById("min").value;
        var limMax = document.getElementById("max").value;
        //Where
        var where = document.getElementById("where").value;
        var operation = document.getElementById("operation").value;
        var condition = document.getElementById("condition").value;
        var added = document.getElementById("added").value;
        
        for(h=0;h<i;h++){     
            
            var checkbox = document.getElementById("cbc"+h);
            
            if(checkbox.checked){
                almostone = true;
                camp += checkbox.value+",";
            }
        }
        
        if(almostone){
            document.getElementById("customTable").style.display='';
        }else{
            document.getElementById("customTable").style.display='none';
        }
        
        camp = camp.substring(0, camp.length-1);
        document.getElementById("campos").innerHTML= camp;
        
        if(camp!=""){
            camp = "&c="+camp;
        }
        
        if(orderby!="default"){
            camp += "&o="+orderby;
            camp += "&s="+document.getElementById("sense").value;
        }
        
        //LIMIT MIN - MAX
        if(limMax == "" || limMin == ""){
            
        }else{
            if(!isNaN(limMax) && !isNaN(limMin)){
                camp += "&l="+limMin+","+limMax;
            }else{
                alert("Must be a Number")
            }            
        }
        
        //WHERE
        if(where == "No Where" || condition == ""){
            
        }else{
                if(operation == "="){
                    operation = ":"
                }else if(operation == "<>"){
                    
                }        
            camp += "&w="+where+operation+condition;
        }

        camp = camp.replace(" ","");
        if(document.getElementById("camp")){
            document.getElementById("camp").innerHTML= "<?php echo $urlJson;?>"+camp;
        }
        if(document.getElementById("camp_link")){ 
            document.getElementById("camp_link").href= "<?php echo $urlJson;?>"+camp;
        }
        if(document.getElementById("table_link")){ 
            document.getElementById("table_link").href= "<?php echo $viewTable;?>"+camp;
        }
        if(document.getElementById("tree_link")){ 
            document.getElementById("tree_link").href= "<?php echo $viewTree;?>"+camp;
        }
        
    }
    
</script> 
<div id="f">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <p style="text-align: left;">License: <a target="_blank" href="http://www.apache.org/licenses/LICENSE-2.0">Apache 2.0</a></p>
                </div>
                <div class="col-sm-4">
                    <p style="text-align: center;">Copyright 2014 <a target="_blank" href="http://geekytheory.com">GeekyTheory</a></p>
                </div>
                <div class="col-sm-4">
                    <p style="text-align: right;">Developed By <a target="_blank" href="http://twitter.com/alex_esquiva">@alex_esquiva</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
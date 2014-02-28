<script lang="javascript">
    
    document.getElementById("customTable").style.display='none';
    
    function customSelect(i){
        var camp = "";
        var almostone = false;
        var orderby = document.getElementById("order").value;
        var limMin = document.getElementById("min").value;
        var limMax = document.getElementById("max").value;
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

        camp = camp.replace(" ","");
        document.getElementById("camp").innerHTML= "<?php echo $urlJson;?>"+camp;
        document.getElementById("camp_link").href= "<?php echo $urlJson;?>"+camp;
        document.getElementById("table_link").href= "<?php echo $viewTable;?>"+camp;
        //document.getElementById("advance_link").href= "<?php echo $advance;?>"+camp;
    }
    
</script> 
<div id="f">
        <div class="container">
            <div class="row">
                <p>Developed By <a target="_blank" href="http://geekytheory.com"> Geeky Theory</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
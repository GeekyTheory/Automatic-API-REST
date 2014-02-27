<script lang="javascript">
    
    document.getElementById("customTable").style.display='none';
    
    function customSelect(i){
        var camp = "";
        var almostone = false;
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
        camp = camp.replace(" ","");
        document.getElementById("camp").innerHTML= "<?php echo $urlJson;?>"+camp;
        document.getElementById("camp_link").href= "<?php echo $urlJson;?>"+camp;
        document.getElementById("table_link").href= "<?php echo $viewTable;?>"+camp;
        document.getElementById("advance_link").href= "<?php echo $advance;?>"+camp;
    }
    
</script> 

</body>
</html>
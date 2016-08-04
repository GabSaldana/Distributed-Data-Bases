$(document).on('ready',function(){
   // alert("HEY");
    var db=0;
    // 1->FP, 2->OXXO , 3->TIENDA, 4->OPTICA/CURSO
    $('#select1').change(function() {
        
        //alert(db);
        db=$('#select1 option:selected').val();
        select_login_db(db);
        
    });
    
    $('#select2').change(function() {
        
        db=$('#select2 option:selected').val();
        //alert(db);
        select_register_db(db);
        
    });
    
    function select_login_db(db){
        
        if (db == 1){
            
            $("#1").show();
            $("#2").hide();
            $("#3").hide();
            $("#4").hide();
        }
        if (db == 2){
            $("#1").hide();
            $("#2").show();
            $("#3").hide();
            $("#4").hide();
        }   
        if (db == 3){
            $("#1").hide();
            $("#2").hide();
            $("#3").show();
            $("#4").hide();
            
        }
        if (db == 4){
            $("#1").hide();
            $("#2").hide();
            $("#3").hide();
            $("#4").show();
        }    
    }
    
    function select_register_db(db){

        if (db == 1){
            
            $("#reg_fp").show();
            $("#reg_oxxo").hide();
            $("#reg_tienda").hide();
            $("#reg_op").hide();
            
        }
        if (db == 2){
   
            
            $("#reg_fp").hide();
            $("#reg_oxxo").show();
            $("#reg_tienda").hide();
            $("#reg_op").hide();
            
        }   
        if (db == 3){

            
            $("#reg_fp").hide();
            $("#reg_oxxo").hide();
            $("#reg_tienda").show();
            $("#reg_op").hide();
            
            
        }
        if (db == 4){

            
            $("#reg_fp").hide();
            $("#reg_oxxo").hide();
            $("#reg_tienda").hide();
            $("#reg_op").show();
            
        }
            
    }
     
});
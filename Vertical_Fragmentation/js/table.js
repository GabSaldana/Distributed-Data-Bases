$(document).ready(function(){
    
    var tabla="";
    var nf=0;
    var i=0;
    
    $('#Enviar').on('click',function(){
      
       /* var relation=$( "#relation" ).val();
        var number_frag=$( "#number_frag" ).val();
        var number_site=$( "#number_site" ).val();
        var nombre_frag=$( "#nombre_frag" ).val();
        
        var Atributos = new Array();
        //recorremos todos los checkbox seleccionados con .each
        $('input[name="atributos[]"]:checked').each(function() {
	       //$(this).val() es el valor del checkbox correspondiente
	       checkboxValues.push($(this).val());
        }); 
        
        var Expresiones = new Array();
        //recorremos todos los checkbox seleccionados con .each
        $('input[name="expresiones[]"]:checked').each(function() {
	       //$(this).val() es el valor del checkbox correspondiente
	       checkboxValues.push($(this).val());
        }); 
        
        data: {relation:relation,number_frag:number_frag,expresiones:Expresiones,atributos:Atributos,number_site:number_site,nombre_frag:nombre_frag},
        */
        
        $.ajax({
                
                type:'POST',
                url:$(this).attr('action'),
                data: $(this).serialize(),
                success:function(html){
                    
                }
            }); 
    });
    
    
    $('#number_frag').on('change',function(){
        var numberfrag = $(this).val();
        nf=numberfrag;
        //$( "#number_frag" ).prop( "disabled", true ); 
        
    });
    
    $('#relation').on('change',function(){
        var relationName = $(this).val();
        $( "#exp_d" ).empty();
        tabla=relationName;
        if(relationName){
            $.ajax({
                
                type:'POST',
                url:'querys.php',
                data:'relation_name='+relationName,
                success:function(html){
                    $('#tabla_d').html(html);
                }
            }); 
            
            $.ajax({
                
                type:'POST',
                url:'attquerys.php',
                data:'relation_name='+relationName,
                success:function(html){
                    $('#att_d').html(html);
                    $( "#Generar" ).prop( "disabled", false ); 
                    //$( "#relation" ).prop( "disabled", true ); 
                    
                }
            }); 
            
        }
    });
    
    
    $('#Enviar').on('change',function(){
        
        $( "#Generar" ).prop( "disabled", false ); 
        
    });
    
        $('#Generar').on('click',function(){
        
            if(i < nf || i== 0){       
                
                var checkboxValues = new Array();
                //recorremos todos los checkbox seleccionados con .each
                $('input[name="atributos[]"]:checked').each(function() {
	               //$(this).val() es el valor del checkbox correspondiente
	               checkboxValues.push($(this).val());
                });   
        
                $.ajax({
                    type: "POST",
                    data: {info:checkboxValues,tabla:tabla},
                    url: "expresiones.php",
                    success: function(msg){
                        $( "#exp_d" ).append( msg ); 
                        i++;
                    }
                });      
                
            }else{
                
               //$( "#Generar" ).prop( "disabled", true ); 
                i=0;
                //$( "#relation" ).prop( "disabled", false ); 
                //$( "#number_frag" ).prop( "disabled", false ); 
            }
        
        });
     
    
});
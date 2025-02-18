// JavaScript Document
$(document).ready(function(){
		//**************************************************************************************************************************
	
			$("#bPersona").keyup(function(){
				//obtenemos el valor del campo
			var palabra;
			$("#bPersona").focus();		
				palabra=$("#bPersona").val();
				
				$.ajax({
					type:"POST",
					url:"../Administrador/Buscar/buscarPersonal.php?persona="+palabra,
					data:"persona="+palabra,
					dataType:"html",
					beforeSend:function(){
						//$("#contenedortabla").html("");
					},
					error:function(){
						alert("error peticion ajax");
					},
					success:function(data){
							$("#datosG").html(data);
					}
				});
				
			});

			//**************************************************************************************************************************
			//**************************************************************************************************************************
	
			$("#CCT").keyup(function(){
				//obtenemos el valor del campo
			var palabra;
			$("#CCT").focus();		
				palabra=$("#CCT").val();
				
				$.ajax({
					type:"POST",
					url:"./Administrador/Consultas/buscarPersonal.php?personal="+palabra,
					data:"personal="+palabra,
					dataType:"html",
					beforeSend:function(){
						//$("#contenedortabla").html("");
					},
					error:function(){
						alert("error peticion ajax");
					},
					success:function(data){
							$("#contenedortabla2").html(data);
					}
				});
				
			});

			//**************************************************************************************************************************
	});
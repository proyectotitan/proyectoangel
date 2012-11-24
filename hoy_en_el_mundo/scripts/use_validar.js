		function use_validar(){
		
		
		
		var errores = "";
		var sw = 0;
		var datos = "";
		
			if(esBlanco(form.mult.value)){
			errores=errores+"Es necesario el estilo de musica del grupo\n";
			sw=1;
			}
			else
			{
			for ( var i=0; i<form.mult.length; i++){
			if(form.mult[i].selected){
			switch (i) { 
   	case 0: 
      	 datos = datos+"Estilo/s del grupo: Heavy Metal\n"; 
      	 break 
   	case 1: 
      	 datos = datos+"Estilo/s del grupo: Jazz\n"; 
      	 break 
   	case 2: 
      	 datos = datos+"Estilo/s del grupo: Salsa\n"; 
      	 break 
		 case 3: 
      	 datos = datos+"Estilo/s del grupo: Blues\n"; 
      	 break 
   	default: 
      	  } 
		
		}
		}
		}			
		
			if(esBlanco(form.name.value)){
			errores=errores+"Es necesario el nombre del grupo\n";
			sw=1;
					}
			else
		datos = datos+"Nombre del grupo "+form.name.value+"\n";

			if (esBlanco(form.email.value) || !esEmail(form.email.value)){
			errores=errores+"Es necesario un Email valido de contacto\n";
			sw=1;
			}
			else
			datos = datos+"Email del grupo "+form.email.value+"\n";
			
			if(esBlanco(form.n_res.value))
			{
			errores=errores+"Es necesario el nombre del responsable del grupo\n";
			sw=1;
			}
			else
			datos=datos+"Nombre responsable "+form.n_res.value+"\n";

			if(esBlanco(form.dni_res.value))
			{
			errores=errores+"Es necesario el dni del responsable del grupo\n";
			sw=1;
			}
			else
			datos=datos+"Dni responsable "+form.dni_res.value+"\n";
			
			if(esBlanco(form.fnac_res.value) || !esFechaValida(form.fnac_res.value))
			{
			errores=errores+"Es necesaria la fecha de nacimiento del responsable del grupo\n";
			sw=1;
			}
			else
			datos=datos+"Fecha de nacimiento del responsable "+form.fnac_res.value+"\n";
			
			if(esBlanco(form.dir_res.value))
			{
			errores=errores+"Es necesaria la direccion del responsable del grupo\n";
			sw=1;
			}
			else
			datos=datos+"Direccion del responsable "+form.dir_res.value+"\n";
			
			if(esBlanco(form.sity_res.value))
			{
			errores=errores+"Es necesaria la ciudad del responsable del grupo\n";
			sw=1;
			}
			else
			datos=datos+"Ciudad del responsable "+form.sity_res.value+"\n";
			
			if(esBlanco(form.tlfn_res.value) || !esTelefono(form.tlfn_res.value))
			{
			errores=errores+"Es necesaria un telefono correcto del responsable del grupo\n";
			sw=1;
			}
			else
			datos=datos+"Telefono del responsable "+form.tlfn_res.value+"\n";
			
			if(!esBlanco(form.n_m1.value) && (esBlanco(form.dni_m1.value) || esBlanco(form.fnac_m1.value)) || !esBlanco(form.n_m2.value) && (esBlanco(form.dni_m2.value) || esBlanco(form.fnac_m2.value)) || !esBlanco(form.n_m3.value) && (esBlanco(form.dni_m3.value) || esBlanco(form.fnac_m3.value)))
			alert("Faltan datos de algun miembro del grupo");
			
		
	if( !form.acept.checked ) {
	errores=errores+"Debe aceptar las condiciones\n";
	sw=1;
		}
		

	if(sw ==1)
		alert(errores);
		else
		alert(datos);
		
		
		}
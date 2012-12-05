// funcion que comprueba que el campo ha sido rellenado

function esBlanco(campo) {
    if (campo.length == 0)
        return true;
    else
        return false;
}


function esDni(dni){

  numero = dni.substr(0,dni.length-1);
  let = dni.substr(dni.length-1,1);
  numero = numero % 23;
  letra='TRWAGMYFPDXBNJZSQVHLCKET';
  letra=letra.substring(numero,numero+1);  
   
  if (letra ==let)   
  return true;  
 
 }
 
 function esCif(abc){
 
 
	par = 0;
	non = 0;
	letras = "ABCDEFGHKLMNPQS";
	let = abc.charAt(0);
 
	if (abc.length!=9) {
		//alert('El Cif debe tener 9 dígitos');
		return false;
	}
 
	if (letras.indexOf(let.toUpperCase())==-1) {
		//alert("El comienzo del Cif no es válido");
		return false;
	}
 
	for (zz=2;zz<8;zz+=2) {
		par = par+parseInt(abc.charAt(zz));
	}
 
	for (zz=1;zz<9;zz+=2) {
		nn = 2*parseInt(abc.charAt(zz));
		if (nn > 9) nn = 1+(nn-10);
		non = non+nn;
	}
 
	parcial = par + non;
	control = (10 - ( parcial % 10));
	if (control==10) control=0;
 
	if (control!=abc.charAt(8)) {
		alert("El Cif no es válido");
		return false;
	}
	
	return true;
}
 

// funcion que comprueba si el campo es numerico (positivo o negativo)
function esNumero(campo) {
    return esEntero(campo);
}


// funcion que comprueba si el campo es numerico entero (positivo o negativo)
function esEntero(campo) {
    var inLen = campo.length;
        
    for (var i=0; i < inLen; i++) {
        var ch = campo.substring(i, i + 1);
        if ((ch < "0") || ("9" < ch)) {
            if (i != 0) return false;
    		else 
                if (ch != "-") return false;
        }
    }
    return true;
}

// funcion que comprueba si el campo es numerico natural (entero positivo)
function esNatural(campo) {
	if (esEntero(campo) && campo.charAt(0) != "-") return true;
	else return false;
}
		
// funcion que comprueba si el campo es numerico decimal (positivo o negativo)
// El caracter del decimal es el punto o la coma.
function esDecimal(campo) {
    if (esEntero(campo) || esBlanco(campo))
        return true;
    
    var posPunto = campo.indexOf(".");
    if (posPunto < 0)
        posPunto = campo.indexOf(",");
    if (posPunto < 0)
        return false;
    
    if (!esEntero(campo.substring(0, posPunto)))
        return false;
    
    if (!esEntero(campo.substring(posPunto + 1)))
        return false;
        
    if (campo.charAt(posPunto + 1) == '-') 
        return false;
        
    return true;
    
}

// funcion que comprueba si el campo es un par de enteros separados
// por una barra / o un único valor.
function esMinMax(campo) {
    if (esEntero(campo) || esBlanco(campo))
        return true;
    
    var posPunto = campo.indexOf("/");
    if (posPunto < 0)
        return false;
        
    var mini = parseInt(campo.substring(0, posPunto));
    var maxi = parseInt(campo.substring(posPunto + 1));
    
    if (!esEntero(mini))
        return false;
    
    if (!esEntero(maxi))
        return false;
        
    if (mini > maxi)
    	return false;
    /*    
    if (campo.charAt(posPunto + 1) == '-') 
        return false;
        
    if (campo.charAt(0) == '-') 
        return false;
	*/
    return true;
    
}

// funcion que comprueba si el campo es numerico decimal (positivo)
// El caracter del decimal es la coma.
// Recibe los valores de precision y escala.
function esDecimal(campo, precision, escala) {
    if (esBlanco(campo))
        return true;
    if (esEntero(campo)) {
    	if (campo.length <= (precision - escala))
	        return true;
	    else
	    	return false;
	}
    
    posPunto = campo.indexOf(",");
    if (posPunto < 0)
        return false;
    
    parteEntera = campo.substring(0, posPunto);
    parteDecimal = campo.substring(posPunto + 1);
    if (!esEntero(parteEntera) || parteEntera.length > (precision - escala) || parteEntera.charAt(0) == '-')
        return false;

    if (!esEntero(parteDecimal) || parteDecimal.length > escala || parteDecimal.charAt(0) == '-')
        return false;
    
    return true;
    
}

// funcion que comprueba que el campo email contiene una @, que hay algo
// delante de la @ y que la direccion tiene un punto despues de la @
function esEmail(campo) {
    var indicearroba = campo.lastIndexOf ("@");
    var indicepunto = campo.lastIndexOf(".");
    if ((indicearroba > 0) && (indicepunto > indicearroba)){
        return true;
    } else{
        return false;
    }
}

// funcion que comprueba que el telefono tiene los digitos correctos
function esTelefono(campo) {
    var inLen = campo.length;

    // comprobar si tiene 9 digitos
    if (!esNumero(campo) || (inLen != 9)) {
        return false;
    }
    return true;
}

//funcion que comprueba si un campo es una hora valida
function esHora(campo){
	var dig1 = campo.substring(0, 2);
	var puntos = campo.substring(2, 1);
	var dig2 = campo.substring(3, 2);
	
	if((!esNumero(dig1)) || (!esNumero(dig2)) || (puntos != ":")){
		return false
	}
	return true;
}

//funcion que comprueba que el campo es una fecha valida
// El formato que entiende es el de El Corte Inglés (DDMMYYYY).
function esFecha(campo){
	if (campo.length == 0)
		return true;

	if (campo.length != 8)
		return false;

    var valido = true;

    var dia = campo.substring(0, 2);
    var mes = campo.substring (2, 4);
    var annio = campo.substring (4, 8);
    
    if (!esNumero(dia) || !esNumero(mes) || !esNumero(annio)) {
        return false;
    } else if ((annio < 0) || (mes < 1) || (mes > 12) || (dia < 1)) {
        return false;
    } else if (((mes == 1) || (mes == 3) || (mes == 5) || (mes == 7) || (mes == 8) || (mes == 10) || (mes == 12)) && (dia > 31)) {
        return false;
    } else if (((mes == 4) || (mes == 6) || (mes == 9) || (mes == 11)) && (dia > 30)) {
        return false;
    } else if ((mes == 2) && (esBisiesto(annio)) && (dia > 29)) {
        return false;
    } else if ((mes == 2) && (!esBisiesto(annio)) && (dia > 28)) {
        return false;
    } else {
    	return true;
    }
}

//funcion que comprueba si fecha1 es mayor que fecha 2. Formato DDMMYYYY
function esFechaMayorQue(fecha1, fecha2) {
    var dia1 = fecha1.substring(0, 2);
    var mes1 = fecha1.substring(2, 4);
    var annio1 = fecha1.substring (4, 8);

    var dia2 = fecha2.substring(0, 2);
    var mes2 = fecha2.substring(2, 4);
    var annio2 = fecha2.substring (4, 8);

	if (annio1 > annio2) return true;
	if (annio1 < annio2) return false;
	
	if (mes1 > mes2) return true;
	if (mes1 < mes2) return false;

	if (dia1 > dia2) return true;
	if (dia1 < dia2) return false;

	return false;
}

//funcion que comprueba si algun elemento de una check/radiobutton esta activo
function chequeado(campo){
	for(i=0;i<campo.length;i++){
		if(campo[i].checked) return true;
	}
	return false
}

//Funcion que valida fehcas (dd/mm/aaaa)
function esFechaValida(fecha){
    if (fecha != undefined && fecha.value != "" ){
        if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value)){
            alert("Formato de fecha erroneo (dd/mm/aaaa)");
            return false;
        }
        var dia  =  parseInt(fecha.value.substring(0,2),10);
        var mes  =  parseInt(fecha.value.substring(3,5),10);
        var anio =  parseInt(fecha.value.substring(6),10);
 
    switch(mes){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8: 
        case 10:
        case 12:
            numDias=31;
            break;
        case 4: case 6: case 9: case 11:
            numDias=30;
            break;
        case 2:
            if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
            break;
        default:
            alert("Fecha introducida erronea");
            return false;
    }
 
        if (dia>numDias || dia==0){
            alert("Fecha introducida erronea");
            return false;
        }
        return true;
    }
}
 
function comprobarSiBisisesto(anio){
if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
   return true;
    }
else {
    return false;
    }
}



function addElement(){
			var capa = document.getElementById("capa");
			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			td1.innerHTML = "Nuevo componente de grupo";
			var td2 = document.createElement("td");
			td2.innerHTML = "<input type=text id=n_m class=borderform></input>";
			var td3 = document.createElement("td");
			td3.innerHTML = "<input type=text id=dni_m class=borderform></input>";
			var td4 = document.createElement("td");
			td4.innerHTML = "<input type=text id=fnac_m class=borderform></input>";
			capa.appendChild(tr);
			capa.appendChild(td1);
			capa.appendChild(td2);
			capa.appendChild(td3);
			capa.appendChild(td4);
			}

function Fecha(){
	this.f = new Date();
	this.hoy=this.f.getFullYear() + "-" + (this.f.getMonth() +1) + "-" + this.f.getDate();
	this.validaFecha = function (fechaMenor,FechaMayor) {
		var f1=new Date($("#"+fechaMenor).val());
		var f2=new Date($("#"+FechaMayor).val());
		if (f1>f2) {			
			return true;
		}
		return false;
	}
	this.limpiaElemento=function(elemento){
		$('#'+ elemento).val("");
	}

	this.elementoFechaActual=function(elemento){
		$('#'+ elemento).val(this.hoy);
	}

	this.mensaje=function(msj){
		toastr.error(msj,'Error en la fecha',
			{"hideMethod": "fadeOut",
			"timeOut": "2000",
			"progressBar": true,
			"closeButton": true,
			"positionClass": "toast-top-left",
		});
	};
	
	this.cantDias=function(fechaIni,fechaFin){
		var fecha1 = moment(fechaIni);
		var fecha2 = moment(fechaFin);
		return fecha2.diff(fecha1, 'days')+1;
	}
	this.fechaElemento=function(elemento){
		return $('#'+ elemento).val();
	}
	
}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>  </title>
    
  </head>
  <body>

  <p align="right">
    <img src="{{ asset('assets/img/promo.png') }}" height="70">
  </p>

  <!--
  <p align="center" style="font-family:Arial;">
    <h1>Certificado Laboral</h1>
    <h5 style="color:green;">http://www.promoambiental.com</h5>
  </p>
  -->

  <hr style="color:green;">

  <p align="center" style="font-family:Arial;">
      <b>{{ $data->emple_desc }}</b>
      <br>
      <b>NIT: {{ $data->nit }}</b>
  </p>

  <br>


  <p align="center" style="font-family:Arial;">
      <b>  CERTIFICA </b>
  </p>
 
 <br>

<p align="justify" style="font-family:Arial;">

Que el señor  <b> {{ $data->nombres . " " . $data->apellidos }} </b> identificado con cedula de ciudadanía.  No. <b> {{ $data->cedula }} </b> labora en nuestra compañía desde <b> {{ Date::parse($data->fecha_ingreso)->format('Y-F-d') }}</b> con un contrato de trabajo a <b> {{ $data->tipo_desc }}</b>. Actualmente desempeña el cargo de <b> {{ $data->cargo_desc }}</b>, con un salario básico mensual de (<b>${{ $data->salario}}</b>). = (<b>{{ NumeroALetras::to_word($data->salario) }} m/cte)</b>.
 @if ($data->variable > 0)
Mas Comisiones durante los últimos tres meses de (<b>${{ $data->variable }}</b>). = (<b>{{ NumeroALetras::to_word($data->variable) }} m/cte)</b>. 
@endif
 @if ($data->rodaje > 0)
Mas Movilización de (<b>${{ $data->rodaje }}</b>). = (<b>{{ NumeroALetras::to_word($data->rodaje) }} m/cte)</b>.  
@endif
</p>



<p align="justify" style="font-family:Arial;">

En constancia se firma en Cali a los {{ NumeroALetras::to_word(Date::today()->format('d')) }} ({{ Date::today()->format('d') }}) días del mes de {{ ucfirst(trans(Date::today()->format('F'))) }} del {{ NumeroALetras::to_word(Date::today()->format('Y')) }} ({{ Date::today()->format('Y') }}). 
</p>


  
  

  Cordialmente,

  <br>

  <p align="left">
    <img src="{{ asset('assets/img/firma.png') }}" height="50">
  </p>

<p align="left" style="font-family:Arial;">
      <b>Eddier Vallejo Buitrago.</b>
      <br>
      Jefe Administrativo de Gestión Humana
      <br>
      Promo<b>ambiental </b>
      <br>
      <b>Pbx:</b> 2-487 70 70 
      <br>
      <img src="{{ asset('assets/img/promo.jpg') }}" height="40">
</p>

<p align="justify" style="font-family:Arial; font-size: 12px;">
  <b>Nota:</b> Este certificado fue generado de forma automática por nuestro sistema de información. Para verificar esta información, ingrese a la página
  web: <b>http://certificados.promoambiental.com</b> y use el código de verificación que se detalla a continuación.
</p>

<br>

<p align="center" style="font-family:Arial;">
      <b>  Código de Verificación </b>
      <p align="center" style="background-color:#35892d; width: 120px; margin-left: 290px;">
        <b>{{ $idcertificado }}</b>
      </p>
</p>

<br>

<p align="right" style="font-family:Arial;">
      <img src="{{ asset('assets/img/piepagina.png') }}" height="40" width="550">
      <img src="{{ asset('assets/img/bureau.png') }}" height="50" width="100">
</p>

<p align="right" style="font-family:Arial; font-size: 10px;">
      Dirección <b>Calle 70 No. 7E Bis-04</b> | Teléfono <b>487 7070 </b> | Fax: <b>656 1953</b>
</p>





  


  

  <div class="container">






    
    
  </div>
    
  </body>
</html>
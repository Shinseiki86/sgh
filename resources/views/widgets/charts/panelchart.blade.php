<div class="col-xs-12 col-sd-5 col-md-5">
	<div class="panel panel-info panel-chart">
		<div class="panel-heading">
			{{$title}}
			<div class="pull-right">
				<label>Tipo</label>
				<select class="typeChart disabled">
					<option value="bar">Barras</option>
					<option value="pie">Torta</option>
				</select>
			</div>
		</div>
		<div class="panel-body">
			<canvas class="canvas-chart" id="{{$idCanvas}}" style="height:250px"></canvas>
		</div>
	</div>
</div>

<?php

namespace SGH\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


use Illuminate\Contracts\Validation\Validator;


class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public static $modeloCreado;
    /**
     * {@inheritdoc}
     */
    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @param  string  $class
	 * @param  string  $redirect
	 * @param  array  $relations
	 * @return Response
	 */
	protected function storeModel($class, $redirect, array $relations = [])
	{
		//Datos recibidos desde la vista.
		$data = $this->getRequest();

		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$validator = $this->validator($data);

		if($validator->passes()){
			$class = $this->getClass($class);

			//Se crea el registro.
			if(array_has($data, 'password'))
				$data['password'] = bcrypt($data['password']);
			$model = $class::create($data);
			//Se crean las relaciones
			$this->storeRelations($model, $relations);

			$nameClass = str_upperspace(class_basename($model));
			// redirecciona al index de controlador
			flash_alert( $nameClass.' '.$model->id.' creado exitosamente.', 'success' );
			return redirect()->route($redirect)->send();
		} else {
			return redirect()->back()->withErrors($validator)->withInput()->send();
		}		
	}

	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @param  string  $class
	 * @param  string  $redirect
	 * @param  array  $relations
	 * @return Response
	 */
	protected function updateModel($id, $class, $redirect, array $relations = [])
	{
		//Datos recibidos desde la vista.
		$data = $this->getRequest();

		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$validator = $this->validator($data, $id);

		if($validator->passes()){
			$class = $this->getClass($class);

			// Se obtiene el registro
			$model = $class::findOrFail($id);
			//y se actualiza con los datos recibidos.
			$model->update($data);

			//Se crean las relaciones
			$this->storeRelations($model, $relations);

			$nameClass = str_upperspace(class_basename($model));
			// redirecciona al index de controlador
			flash_alert( $nameClass.' '.$id.' modificado exitosamente.', 'success' );
			return redirect()->route($redirect)->send();
		} else {
			return redirect()->back()->withErrors($validator)->withInput()->send();
		}
	}

	/**
	 * Obtiene los datos recibidos por request y elimina los input vacíos
	 *
	 * @return array
	 */
	private function getRequest()
	{
		$data = request()->all();
		foreach ($data as $input => $value) {
			if($value=='')
		 		$data[$input] = null;
		};
		return $data;
	}

	/**
	 * Guarda las relaciones entre modelos.
	 *
	 * @param  Illuminate\Database\Eloquent\Model $model
	 * @param  array $relations
	 * @return void
	 */
	private function storeRelations($model, array $relations)
	{
		//Datos recibidos desde la vista.
		$data = request()->all();

		if(!empty($relations)){
			foreach ($relations as $relation => $ids) {
				$arrayIds = [];
				//Si $ids es un string, se refiere al nombre del campo en el form, por ende debe existir en $data
				if( is_string($ids) and $ids!='' and isset($data[$ids]))
					$arrayIds =  $data[$ids];

				if( is_array($ids) and !empty($ids) )
					$arrayIds = $ids;

				$model->$relation()->sync($arrayIds, true);
			}

		}
	}

	/**
	 * Elimina un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @param  string  $class
	 * @param  string  $redirect
	 * @return Response
	 */
	protected function destroyModel($id, $class, $redirect)
	{
		// Se obtiene el registro
		$class = $this->getClass($class);
		$model = $class::findOrFail($id);

        $prefix = strtoupper(substr($class::CREATED_AT, 0, 4));
        $created_by = $prefix.'_CREADOPOR';

		$nameClass = str_upperspace(class_basename($model));

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($model->$created_by == 'SYSTEM'){
			flash_modal( $nameClass.' '.$id.' no se puede borrar (Creado por SYSTEM).', 'danger' );
		} else {

			$relations = $model->relationships('HasMany');

			if(!$this->validateRelations($nameClass, $relations)){
				$model->delete();
				flash_alert( $nameClass.' '.$id.' eliminado exitosamente.', 'success' );
			}
		}
		return redirect()->route($redirect)->send();
	}

	protected function validateRelations($nameClass, $relations)
	{
		$hasRelations = false;
		$strRelations = [];

		foreach ($relations as $relation => $info) {
			if($info['count']>0){
				$strRelations[] = $info['count'].' '.$relation;
				$hasRelations = true;
			}
		}

		if(!empty($strRelations)){
			session()->flash('deleteWithRelations', compact('nameClass','strRelations'));
		}
		return $hasRelations;
	}

	protected function buttonEdit($ruta)
	{
		return \Html::link($ruta, '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', [
			'class'=>'btn btn-small btn-info btn-xs',
			'title'=>'Editar',
			'data-tooltip'=>'tooltip'
		],null,false).' ';
	}

	protected function buttonDelete($model, $modelId, $modelDescrip, $action)
	{
		return \Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
			'class'=>'btn btn-xs btn-danger btn-delete',
			'data-toggle'=>'modal',
			'data-id'=> $model->$modelId,
			'data-modelo'=> str_upperspace(class_basename($model)),
			'data-descripcion'=> $model->$modelDescrip,
			'data-action'=> $action.'/'.$model->$modelId,
			'data-target'=>'#pregModalDelete',
			'data-tooltip'=>'tooltip',
			'title'=>'Borrar',
		]);
	}

	private function getClass($class)
	{
		return class_exists($class) ? $class : '\\SGH\\Models\\'.basename($class);
	}
}

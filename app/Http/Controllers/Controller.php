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
	 * @return Response
	 */
	protected function storeModel($class, $redirect, array $relations = [])
	{
		//Datos recibidos desde la vista.
		$data = request()->all();

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
	 * @param  int  $CLCO_ID
	 * @return Response
	 */
	protected function updateModel($id, $class, $redirect, array $relations = [])
	{
		//Datos recibidos desde la vista.
		$data = request()->all();

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
			flash_alert( $nameClass.' '.$model->id.' modificado exitosamente.', 'success' );
			return redirect()->route($redirect)->send();
		} else {
			return redirect()->back()->withErrors($validator)->withInput()->send();
		}
	}

	private function getClass($class)
	{
		return class_exists($class) ? $class : '\\SGH\\'.basename($class);
	}

	private function storeRelations($model, $relations)
	{
		//Datos recibidos desde la vista.
		$data = request()->all();

		if(!empty($relations)){
			foreach ($relations as $ids => $relation) {
				$arrayIds = isset($data[$ids]) ? $data[$ids] : [];
				$model->$relation()->sync($arrayIds, true);
			}
		}
	}

}

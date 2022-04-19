<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SubjectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SubjectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        $this->crud->setModel(\App\Models\Subject::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/subject');
        $this->crud->setEntityNameStrings('materias', 'materia');

    }

    protected function setupListOperation()
    {
        $this->crud->addColumn(['name'=> 'name','type'=>'text','label'=>'Nombre']);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(SubjectRequest::class);
        $this->crud->addField(['name' => 'name', 'type' => 'text','label' =>'Nombre']);

    }

    protected function setupUpdateOperation()
    {
        if  (!backpack_user()->hasPermissionTo('crear examenes')){
            return abort(401);
        }
        $this->setupCreateOperation();
    }
    public function destroy($id)
    {
        if  (!backpack_user()->hasPermissionTo('eliminar examenes')){
            return back();
        }else {
            $this->crud->hasAccessOrFail('delete');
            return $this->crud->delete($id);
        }

    }
}

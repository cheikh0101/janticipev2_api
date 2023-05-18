<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ResponsableClasseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ResponsableClasseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ResponsableClasseCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ResponsableClasse::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/responsable-classe');
        CRUD::setEntityNameStrings('responsable classe', 'responsable classes');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('user_id');
        $this->crud->setColumnDetails('user_id', ['attribute' => 'email']);
        CRUD::column('classe_id');
        $this->crud->setColumnDetails('classe_id', ['attribute' => 'libelle']);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ResponsableClasseRequest::class);

        CRUD::addField([
            'name'    => 'user_id',
            'label'   => 'Email de l\'utilisateur ',
            'type'    => 'select',
            'entity'    => 'classe',
            'model'     => "App\Models\User",
            'attribute' => 'email',
            'options' => (function ($query) {
                return $query->where('type', 'responsable')->get();
            }),
        ]);
        CRUD::addField([
            'name'    => 'classe_id',
            'label'   => 'Libelle de la Classe',
            'type'    => 'select',
            'entity'    => 'classe',
            'model'     => "App\Models\Classe",
            'attribute' => 'libelle',
            'options' => (function ($query) {
                return $query->orderBy('niveau_id', 'ASC')->get();
            }),
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

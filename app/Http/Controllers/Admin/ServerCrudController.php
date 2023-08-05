<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

/**
 * Class ServerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as TraitStore;
    }
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
        CRUD::setModel(\App\Models\Server::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/server');
        CRUD::setEntityNameStrings('server', 'servers');
    }

    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('user')->label('Creator');
        CRUD::column('image')
            ->value(function ($value) {
                $imageUrl = '/storage/' . $value->image;
                return $imageUrl;
            })->type('image');
        CRUD::column('description')->type('summernote');
        CRUD::column('ip_adress');
    }

    protected function setupShowOperation()
    {
        return $this->setupListOperation();
    }

    protected function setupCreateOperation()
    {
        // CRUD::setValidation(ServerRequest::class);

        CRUD::field('name');
        CRUD::field('user_id')->type('hidden');
        CRUD::field([
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'withFiles' => true
        ]);
        CRUD::field('description')->type('summernote');
        CRUD::field('ip_adress');
    }

    protected function store(Request $request)
    {
        $loggedAdmin = backpack_user();

        $request->merge(['user_id' => $loggedAdmin->id]);

        return $this->TraitStore();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

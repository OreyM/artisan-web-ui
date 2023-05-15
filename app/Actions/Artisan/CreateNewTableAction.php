<?php

namespace App\Actions\Artisan;

use App\Actions\Action;
use App\Http\Requests\Artisan\CreateNewTableRequest;
use Illuminate\Support\Facades\Artisan;

class CreateNewTableAction extends Action
{
    private CreateNewTableRequest $request;

    public function __construct(CreateNewTableRequest $request)
    {
        $this->request = $request;
    }

    protected function run(): void
    {
        $model = str_replace(' ', '',
            ucwords(
                str_replace(['-', '_'], ' ', $this->request->table_name)
            )
        );


        Artisan::call('make:model', [
            'name'          => $model,
            '--migration'   => true,
            '--factory'     => true,
            '--seed'        => true,
        ]);


        Artisan::call('migrate');
    }
}

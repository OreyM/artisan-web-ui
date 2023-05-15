<?php

namespace App\Http\Requests\Artisan;

use App\Http\Requests\RequestJSON;

/**
 * @property string $table_name
 */
class CreateNewTableRequest extends RequestJSON
{
    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        return [
            'table_name' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }
}

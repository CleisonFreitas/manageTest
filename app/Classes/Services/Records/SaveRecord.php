<?php

namespace App\Classes\Services\Records;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaveRecord
{
    public function execute(Model $model)
    {
        try {
            if (! $model->save()) {
                return;
            }

            return $model;
        } catch (ModelNotFoundException $ex) {
            return $ex;
        }
    }
}

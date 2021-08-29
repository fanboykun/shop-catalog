<?php

namespace App\Actions\Store;

use App\Models\Store;

class GetAllStore
{
    public function getAll()
    {
        $store = Store::firstOrFail();
        return $store;
    }
}

<?php

namespace App\Actions\Store;

class UpdateStore
{
    public function update($store, $data)
    {
        $store->update($data);
        return $store;
    }
}

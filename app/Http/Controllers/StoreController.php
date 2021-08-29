<?php

namespace App\Http\Controllers;

use App\Actions\Store\{GetAllStore, UpdateStore};
use App\Http\Resources\StoreResource;
use App\Http\Requests\{StoreStoreRequest, UpdateStoreRequest};
use Symfony\Component\HttpFoundation\Response;
use App\Models\Store;

class StoreController extends Controller
{
    public function index(GetAllStore $action)
    {
        $store = $action->getall();
        return new StoreResource($store);
    }

    public function update(UpdateStoreRequest $request, Store $store, UpdateStore $action)
    {
        $data = $request->all();
        $store = $action->update($store, $data);

        return (new StoreResource($store))
        ->response()
        ->setStatusCode(Response::HTTP_ACCEPTED);
    }

}

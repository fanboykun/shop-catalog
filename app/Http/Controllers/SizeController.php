<?php

namespace App\Http\Controllers;

use App\Actions\Size\{GetAllSize, CreateNewSize, UpdateSize, DeleteSize, ShowSize};
use App\Http\Resources\SizeResource;
use App\Http\Requests\{StoreSizeRequest, UpdateSizeRequest};
use Symfony\Component\HttpFoundation\Response;
use App\Models\Size;

class SizeController extends Controller
{
    public function index(GetAllSize $action)
    {
        $sizes = $action->getall();
        return SizeResource::collection($sizes);
    }

    public function store(StoreSizeRequest $request, CreateNewSize $action)
    {
        $size = $action->store($request->all());

        return (new SizeResource($size))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Size $size, ShowSize $action)
    {
        $size = $action->show($size);

        return new SizeResource($size);
    }

    public function update(UpdateSizeRequest $request, Size $size, UpdateSize $action)
    {
        $data = $request->all();
        $size = $action->update($size, $data);

        return (new SizeResource($size))
        ->response()
        ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Size $size, DeleteSize $action)
    {
        $action->destroy($size);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

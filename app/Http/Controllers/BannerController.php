<?php

namespace App\Http\Controllers;

use App\Actions\Banner\{GetAllBanner, CreateNewBanner, UpdateBanner, DeleteBanner, ShowBanner};
use App\Http\Resources\BannerResource;
use App\Http\Requests\{StoreBannerRequest, UpdateBannerRequest};
use Symfony\Component\HttpFoundation\Response;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(GetAllBanner $action)
    {
        $banners = $action->getall();
        return response()->success(BannerResource::collection($banners));
        // return new BannerResource($banners);
    }

    public function store(StoreBannerRequest $request, CreateNewBanner $action)
    {
        $banner = $action->store($request->all());

        return (new BannerResource($banner))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Banner $banner, ShowBanner $action)
    {
        $banner = $action->show($banner);

        return new BannerResource($banner);
    }

    public function update(UpdateBannerRequest $request, Banner $banner, UpdateBanner $action)
    {
        $data = $request->all();
        $banner = $action->update($banner, $data);

        return (new BannerResource($banner))
        ->response()
        ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Banner $banner, DeleteBanner $action)
    {
        $action->destroy($banner);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\Category\{GetAllCategory, CreateNewCategory, ShowCategory, UpdateCategory, DeleteCategory};
use App\Http\Resources\CategoryResource;
use App\Http\Requests\{StoreCategoryRequest,UpdateCategoryRequest};
use Symfony\Component\HttpFoundation\Response;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(GetAllCategory $action)
    {
        $categories = $action->getAll();
        return response()->success(CategoryResource::collection($categories));
    }

    public function store(StoreCategoryRequest $request,CreateNewCategory $action)
    {
        $category = $action->store($request->all());
        return (new CategoryResource($category))
        ->response()
        ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Category $category, ShowCategory $action)
    {
        $category = $action->show($category);

        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category, UpdateCategory $action)
    {
        $data = $request->all();
        $category = $action->update($category, $data);

        return (new CategoryResource($category))
        ->response()
        ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Category $category, DeleteCategory $action)
    {
        $action->destroy($category);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $userid)
    {
		return Category::index($userid);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
	 * Создание записи в БД
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
		$recordId = Category::add($request);
		return response()->json(['result' => $recordId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
		// Сюда код доходит ТОЛЬКО если:
		// 1. authorize() вернул true (иначе 403)
		// 2. Валидация прошла (иначе редирект назад с ошибками)

		//$result = Category::updateCategory($request);
		$updateResult = $category->update($request->validated());
		return response()->json(['result' => $updateResult]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}

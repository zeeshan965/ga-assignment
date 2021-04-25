<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index ()
    {
        $categories = Categories ::orderBy ( 'id', 'DESC' ) -> paginate ( 5 );
        return view ( 'categories.index', compact ( 'categories' ) )
            -> with ( 'i', ( request () -> input ( 'page', 1 ) - 1 ) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create ()
    {
        return view ( 'categories.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store ( Request $request )
    {
        $request -> validate ( [ 'name' => 'required' ] );

        Categories ::create ( $request -> all () );
        return redirect () -> route ( 'categories.index' ) -> with ( 'success', 'Category created successfully.' );
    }

    /**
     * Display the specified resource.
     *
     * @param Categories $category
     * @return Response
     */
    public function show ( Categories $category )
    {
        return view ( 'categories.show', compact ( 'category' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Categories $category
     * @return Response
     */
    public function edit ( Categories $category )
    {
        return view ( 'categories.edit', compact ( 'category' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Categories $category
     * @return Response
     */
    public function update ( Request $request, Categories $category )
    {
        $request -> validate ( [ 'name' => 'required' ] );

        $category -> update ( $request -> all () );
        return redirect () -> route ( 'categories.index' ) -> with ( 'success', 'Category updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Categories $category
     * @return Response
     */
    public function destroy ( Categories $category )
    {
        $category -> delete ();
        return redirect () -> route ( 'categories.index' ) -> with ( 'success', 'Category deleted successfully' );
    }
}

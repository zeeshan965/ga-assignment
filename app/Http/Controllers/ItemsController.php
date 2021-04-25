<?php

namespace App\Http\Controllers;

use App\Imports\ImportItems;
use App\Models\Categories;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Maatwebsite\Excel\Facades\Excel;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index ()
    {
        $items = Item ::with ( 'category' ) -> orderBy ( 'id', 'DESC' ) -> paginate ( 5 );
        return view ( 'items.index', compact ( 'items' ) )
            -> with ( 'i', ( request () -> input ( 'page', 1 ) - 1 ) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create ()
    {
        $categories = Categories ::all ();
        return view ( 'items.create', compact ( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store ( Request $request )
    {
        $request -> validate ( [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
        ] );

        Item ::create ( $request -> all () );
        return redirect () -> route ( 'items.index' ) -> with ( 'success', 'Item created successfully.' );
    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return Response
     */
    public function show ( Item $item )
    {
        $item -> load ( 'category' );
        return view ( 'items.show', compact ( 'item' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return Response
     */
    public function edit ( Item $item )
    {
        $categories = Categories ::all ();
        return view ( 'items.edit', compact ( 'item', 'categories' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Item $item
     * @return Response
     */
    public function update ( Request $request, Item $item )
    {
        $request -> validate ( [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
        ] );

        $item -> update ( $request -> all () );
        return redirect () -> route ( 'items.index' ) -> with ( 'success', 'Item updated successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return Response
     */
    public function destroy ( Item $item )
    {
        $item -> delete ();
        return redirect () -> route ( 'items.index' ) -> with ( 'success', 'Item deleted successfully' );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function import ( Request $request )
    {
        $request -> validate ( [
            'file' => 'required|mimes:doc,csv,xlsx,xls,docx'
        ] );
        if ( request () -> file ( 'file' ) == null )
            return redirect () -> route ( 'items.index' ) -> withErrors ( [ 'message' => 'Something went wrong, Please try again later!' ] );

        $data = Excel ::import ( new ImportItems, request () -> file ( 'file' ) );
        return redirect () -> route ( 'items.index' ) -> with( [ 'success' => 'All good!' ] );
    }
}

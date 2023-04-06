<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Subraddits;


/**
 * @group SubRaddit Management
 * 
 * APIs to manage the subraddit resources.
 */
class SubRadditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function displayAll()
    {

        // $subraddit = Subraddits::find($subrId)
        $subraddit = Subraddits::all();
        return $subraddit;
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display a subraddit info.
     * 
     * You need to add the subraddit id in the param
     */
    public function displayOne(string $id)
    {
        $subradditAll = Subraddits::all();
        $subraddit = $subradditAll->find($id);
        // dd($subraddit);
        return $subraddit->toJson(JSON_PRETTY_PRINT);;
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

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
        return $subraddit->toJson(JSON_PRETTY_PRINT);
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
    public function displayOne(string $subName)
    {
        // return $subName;
        $subraddit = Subraddits::where('name', $subName)->firstOrFail();
        // $subraddit = $subradditAll->find($subName);
        // dd($subraddit);
        return $subraddit->toJson(JSON_PRETTY_PRINT);;
    }



    /**
     * Update the subraddit info.
     */
    public function editOne(string $id)
    {

        $subraddit = Subraddits::find($id);

        $success =  $subraddit->update([
            'name' => request('name'),
            'about' => request('about'),
        ]);

        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteOne(string $id)
    {
        return 'ne marche pas encore';
        $subraddit = Subraddits::find($id);

        $success =  $subraddit->delete();

        return [
            'deleted' => $success
        ];
    }
}

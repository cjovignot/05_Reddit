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
        $this->validate($request, [
            'name' => 'required|max:100',

        ]);
        // store user 
        $created =  Subraddits::create([
            'name' => $request->name,
            'about' => $request->about,
            'subraddit_picture_URL' => $request->subraddit_picture_URL,
            'banner_picture_URL' => $request->banner_picture_URL
        ]);

        return ["isCreated" => $created];
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
    public function editOne(string $subName)
    {

        $subraddit = Subraddits::where('name', $subName)->firstOrFail();

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
    public function deleteOne(string $subName)
    {
        // return 'ne marche pas encore';
        // $subraddit = Subraddits::find($id);

        $subraddit = Subraddits::where('name', $subName)->firstOrFail();

        $success =  $subraddit->delete();

        return [
            'deleted' => $success
        ];
    }
}

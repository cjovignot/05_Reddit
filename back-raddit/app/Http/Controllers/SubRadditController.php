<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Subraddits;
use App\Models\Admins_subraddits_link;


/**
 * @group SubRaddit Management
 * 
 * APIs to manage the subraddit resources.
 */
class SubRadditController extends Controller
{
    /**
     * Display a listing of the subraddits.
     */
    public function displayAll()
    {


        // $subraddit = Subraddits::find($subrId)
        $subraddit = Subraddits::all();
        return $subraddit->toJson(JSON_PRETTY_PRINT);
    }

// Display all subraddits from current user
    public function displaySubUser($id) {        
        $subraddits = Subraddits::select()
            ->join('admins_subraddits_link', 'admins_subraddits_link.subraddit_id', '=', 'subraddits.id')
            ->where('admins_subraddits_link.admin_id', '=', $id)
            ->get();
        return response()->json($subraddits);
    }







    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
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
        $subraddits_info = Admins_subraddits_link::create([
            'admin_id' => $id,
            'subraddit_id' => $created->id,
        ]);

        return ["isCreated" => $created, $subraddits_info];
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

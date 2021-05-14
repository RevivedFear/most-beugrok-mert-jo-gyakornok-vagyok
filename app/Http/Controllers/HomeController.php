<?php

namespace App\Http\Controllers;

use App\Models\realEstate;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
{
    /**
     * Adja vissza az ingatlanok listáját
     * Azonosító, teljes cím, ár, ingatlan jelleg
     * eloqent modell!
     * https://laravel.com/docs/8.x/eloquent
     */
    public function listRealEstate()
    {
        $realEstatesList = realEstate::all();
        return view('realestate.index',compact('realEstatesList'));
    }

    /**
     * @param $id
     * Ajda vissza egy ingatlan adatlapját
     * eloqent modell használata elkerülhetetlen
     * https://laravel.com/docs/8.x/eloquent
     */
    public function getRealEstate($id)
    {
        $realEstateById = realEstate::find($id);
        return view('realestate.details',compact('realEstateById'));
    }

    /**
     * @param Request $request
     * Ingatlan adatainak modositasa
     * Validacio model szerinti megkötésekkel
     */
    public function updateRealEstate(Request $request)
    {
        $valid = $request->validate(
            [
                'ingatlannev' => 'required|alpha|min:3|max:20',
                'ingatlanid' => 'required|integer',
                'ingatlancim' => 'required|min:8|max:100',
                'ingatlanleiras' =>'required|string|max:500',
                'ingatlanar' => 'required|integer|',
                'ingatlankep' => 'required',
                'ingatlantip' => 'required|integer'
            ]);
        $estateRecord = realEstate::find($valid['ingatlanid']);
        $estateRecord->name = $valid['ingatlannev'];
        $estateRecord->address = $valid['ingatlancim'];
        $estateRecord->description = $valid['ingatlanleiras'];
        $estateRecord->price = $valid['ingatlanar'];
        $estateRecord->img_uri = $valid['ingatlankep'];
        $estateRecord->type = $valid['ingatlantip'];
        $estateRecord->save();
        return redirect("/");

    }

    /**
     * @param $id
     * azonosito alapjan SOFT delete
     */
    public function deleteRealEstate($id)
    {
        $realEstateById = realEstate::find($id);
        $realEstateById->delete();
        return redirect("/");
    }

    public function createRealEstate(Request $request)
    {
        $valid = $request->validate(
            [
                'ingatlannev' => 'required|alpha|min:3|max:20',
                'ingatlancim' => 'required|min:8|max:100',
                'ingatlanleiras' =>'required|string|max:500',
                'ingatlanar' => 'required|integer|',
                'ingatlankep' => 'required',
                'ingatlantip' => 'required|integer',

            ]);
        $estateRecord = new realEstate();
        $estateRecord->name = $valid['ingatlannev'];
        $estateRecord->address = $valid['ingatlancim'];
        $estateRecord->description = $valid['ingatlanleiras'];
        $estateRecord->price = $valid['ingatlanar'];
        $estateRecord->img_uri = '/images/' . $valid['ingatlankep'];
        $estateRecord->type = $valid['ingatlantip'];

        $estateRecord->save();
        return redirect("/");


    }
}

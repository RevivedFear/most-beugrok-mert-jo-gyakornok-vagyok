<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
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
        $data['realEstatesList'] = RealEstate::all();
        return view('realestate.index',$data);
    }

    /**
     * @param $id
     * Ajda vissza egy ingatlan adatlapját
     * eloqent modell használata elkerülhetetlen
     * https://laravel.com/docs/8.x/eloquent
     */
    public function getRealEstate($id)
    {
        $data['realEstate'] = NULL;
     if ($id)
     {
         $data['realEstate'] = RealEstate::find($id);
     }
     //     dd($data['realEstate']);
        return view('realestate.details',$data);
    }

    /**
     * @param Request $request
     * Ingatlan adatainak modositasa
     * Validacio model szerinti megkötésekkel
     */
    public function updateRealEstate(Request $request)
    {

        $validator = Validator::make($request->all(),
            ['name' => 'required|max:255',
            'description' => 'required|max:255',
            'address' => 'required|max:255',
            'price' => 'required',
            'type' => 'required|max:255']
    );
        if ($validator->fails()) {
            return redirect('update-real-estate/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        RealEstate::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'price' => $request->price,
            'type' => $request->type
        ]);
        return redirect('/');
    }

    public function editRealEstate($id)
    {
        $data['realEstate'] = NULL;
        if ($id)
        {
            $data['realEstate'] = RealEstate::find($id);
        }
        return view('realestate.edit', $data);
    }
    /**
     * @param $id
     * azonosito alapjan SOFT delete
     */
    public function deleteRealEstate($id)
    {
        RealEstate::find($id)->delete();
        return redirect('/');
    }

    public function restoreRealEstate($id)
    {
        RealEstate::withTrashed()->find($id)->restore();
        return redirect('/');
    }
}

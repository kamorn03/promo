<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {


        $parcel = new Parcel();
        $parcel->plaats = 'Rotterdam';
        $parcel->straat = 'Breitnerstraat';
        $parcel->straat = 'Breitnerstraat';
        $customImages = [];
        $kenticoContent  = [];
        $needsStreetview = [];


        //  '{{$parcel->getId()}}',
        return view('attachshow',compact('parcel','customImages','kenticoContent','needsStreetview'));
    }
}

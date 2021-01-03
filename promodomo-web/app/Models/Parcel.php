<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    public static function getId()
    {

        return 1;


        /* if ($farm = request()->route('farm')) {
            if (!is_numeric($farm)) {
                return $farm->id;
            }
            return $farm;
        } else {
            $farm = Farm::select("id")->where('farmer_id', auth()->id())->first();
            if ($farm) {
                return $farm->id;
            }
        }
        return null; */


    }
    public static function getAddress()
    {
        return 1;
    }
    public static function hasPlaceholderAsCover()
    {
        return 1;
    }
    public static function getCoverImage()
    {
        return 1;
    }

    public static function getHouseNumber()
    {
        return '101B';
    }
    public static function getParcelArea()
    {
        return 1;
    }

}

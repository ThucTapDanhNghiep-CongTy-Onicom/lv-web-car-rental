<?php

namespace App\Modules\API_V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Modules\API_V1\Models\Renders_Model;
use App\Modules\API_V1\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class Renders extends Controller {
    //Show list of car manufacturers
    public function index() {
        $data = Renders_Model::select('id','manu_name','photo')
                        ->where('feature' , '=' , '1')->get();
        return response()->json([
            'status' => true,
            'msg'    => 'Query successful',
            'data'   => $data,
        ]);
    }
    public function list_renders() {
        $data = Renders_Model::select('renders.id','renders.manu_name','renders.photo',
            DB::raw('COUNT(*) as company_car_number'))
            ->join('cars','renders.id','cars.renders_id')
            ->groupBy('renders.id')
            ->paginate(16);
        $for = array();
        foreach($data as $val) {
            array_push($for, [
                'id'     => $val->id,
                'renders_name' => $val->manu_name,
                'photo' => $val->photo,
                'number_of_vehicles' => $val->company_car_number,
            ]);
        }
        return response()->json([
            'status' => true,
            'msg' => 'Query successfully',
            'current_page' => $data->currentPage(),
            "total" => $data->total(),
            "last_page" => $data->lastPage(),
            "per_page" => $data->perPage(),
            'data' => $for,
        ]);
    }
}
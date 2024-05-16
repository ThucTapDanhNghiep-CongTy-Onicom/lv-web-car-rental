<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\DB;
use Mail;
use Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\Banners;
use App\Models\Cars;
use App\Models\Contacts;
use App\Models\City;
use App\Models\Region;
use App\Models\Categories;
use App\Models\Reders;
use App\Models\Wishlists;
use App\Models\Coupon;
use App\Models\Bookings;
use App\Models\Historys;
use App\Models\Payment;
use App\Models\Costdate;
use App\Models\Reviews;
use App\Models\Vistors;
use App\Models\Features;
use App\Helpers\Helper;
use Carbon\Carbon;

class PageController extends Controller
{   
   
    // Map:
    public function map(Request $request) {
        return view('pages.map');
    }
    // --------------------------------  PART HOME ------------------------------ //
    //list vehicles by region
    public function vehicles_by_region(Request $request,$id) {
        $locations = Region::select('region.id','region.title','region.photo','region.status',DB::raw('COUNT(*) as number_of_vehicles'))
            ->join('city','city.region_id','region.id')
            ->join('cars','cars.city_id','city.id')
            ->where('region.status','active')
            ->groupBy('region.id')
            ->get();
        $renders = Reders::select('renders.id','renders.manu_name',DB::raw('COUNT(*) as count_region_cars'))
            ->join('cars','renders.id','cars.renders_id')
            ->groupBy('renders.id')
            ->orderBy('renders.id','desc')
            ->get();
        $seats = Cars::select('seat',DB::raw('COUNT(*) as sl_cars'))
            ->groupBy('cars.seat')
            ->get();
        //dd(Helper::create_slug('Hồ Chí Minh'));
        $cars = Cars::select('cars.id','cars.name','cars.photo','cars.address'
                            ,'cars.price','cars.users_id','cars.renders_id'
                            ,'cars.city_id','cars.status'
                            ,'city.title as city_title'
                            ,'region.title as region_title')
                    ->join('city','cars.city_id','city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('city.region_id', decrypt($id))
                    ->paginate(6);
        
        return view('pages.car-location', ['cars' => $cars, 'renders' => $renders , 'locations' => $locations , 'seats' => $seats]);
    }
    //Display data to the home page
    public function home(Request $request) {

        $user_ip = Helper::getClientIPaddress(); /*ip host customers*/
        //dd($user_ip);
        $banner = Banners::where('status', 'on')->first();
        $region = Region::select('region.*')
                ->leftJoin('city','region.id','city.region_id')
                ->where('region.status','active')
                ->distinct()
                ->get();                
        // dd($region);
        $drivingCar = Cars::select('cars.id','cars.name','cars.photo','cars.address'
                            ,'cars.price','cars.users_id','cars.renders_id'
                            ,'cars.city_id','cars.status'
                            ,'city.title as city_title'
                            ,'region.title as region_title')
                    ->join('city','cars.city_id','city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.range_of_vehicle', 1)
                    ->where('cars.status','active')
                    ->orderBy('cars.id', 'DESC')
                    ->limit(12)
                    ->get();
        $driverCar = Cars::select('cars.id','cars.name','cars.photo','cars.address'
                            ,'cars.price','cars.users_id','cars.renders_id'
                            ,'cars.city_id','cars.status'
                            ,'city.title as city_title'
                            ,'region.title as region_title')
                    ->join('city','cars.city_id','city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.range_of_vehicle', 2)
                    ->where('cars.status','active')
                    ->orderBy('id', 'DESC')
                    ->limit(12)
                    ->get();
        
         /*current online*/
        $current_online = Vistors::where('ip_address',$user_ip)->get();
        $count_online = $current_online->count();
        if($count_online < 1) {
            $vistors = new Vistors();
            $vistors->ip_address = $user_ip;
            $vistors->date_vistors = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $vistors->save();
        }
        $this->navActive('home', 'contact', 'vehicle');
        return view('home')->with('banner' , $banner)
                            ->with('region',$region)
                            ->with('drivingCar',$drivingCar)
                            ->with('driverCar',$driverCar)
                            ->with(compact('count_online'));
                            
        
    } 
    //Displays searched vehicles by address and time.
    public function search_address(Request $request) {
        $request->validate([
            'start_date' => 'required|after:yesterday',
            'end_date' => 'required|after:start_date'
        ]);
        
        $start_date = date('Y-m-d', $request->start_date = strtotime($request->start_date));
        $end_date = date('Y-m-d', $request->end_date = strtotime($request->end_date));
        $locations = Region::select('id','title','photo','status')
                ->where('status','active')
                ->get();
        $seats = Cars::select('seat')
                ->distinct()
                ->get();
        $renders = Reders::select('renders.id','renders.manu_name',DB::raw('COUNT(*) as count_region_cars'))
            ->join('cars','renders.id','cars.renders_id')
            ->groupBy('renders.id')
            ->orderBy('renders.id','desc')
            ->get();
        $cars = Cars::select('cars.id','cars.name','cars.photo','cars.address'
            ,'cars.price','cars.users_id','cars.renders_id'
            ,'cars.city_id','cars.status'
            ,'renders.manu_name'
            ,'city.title as city_title'
            ,'region.title as region_title')
            ->leftJoin('renders','cars.renders_id','=','renders.id')
            ->join('city','cars.city_id','city.id')
            ->join('region','city.region_id','region.id')
            ->where('cars.address', 'like', '%' . $request->address . '%')
            ->orWhere('city.title', 'like', '%' . $request->address . '%')
            ->orWhere('region.title', 'like', '%' . $request->address . '%')
            ->where('start_date', '<=', $start_date)
            ->where('end_date', '>=', $end_date)
            ->paginate(6);
            
        $this->navActive('vehicle', 'home', 'contact');
        return view('pages.car', [
            'cars' => $cars , 
            'locations' => $locations , 
            'renders' => $renders , 
            'seats' => $seats
        ]);
    }
    // --------------------------------  PART CARS ------------------------------ //
    //Show car list including other features 
    public function cars() {
        $locations = Region::select('region.id','region.title','region.photo','region.status',DB::raw('COUNT(*) as number_of_vehicles'))
            ->join('city','city.region_id','region.id')
            ->join('cars','cars.city_id','city.id')
            ->where('region.status','active')
            ->groupBy('region.id')
            ->get();
        $renders = Reders::select('renders.id','renders.manu_name',DB::raw('COUNT(*) as count_region_cars'))
            ->join('cars','renders.id','cars.renders_id')
            ->groupBy('renders.id')
            ->orderBy('renders.id','desc')
            ->get();
        $seats = Cars::select('seat',DB::raw('COUNT(*) as sl_cars'))
            ->groupBy('cars.seat')
            ->get();
        $cars = Cars::select('cars.id','cars.name','cars.photo','cars.address'
                            ,'cars.price','cars.users_id','cars.renders_id'
                            ,'cars.city_id','cars.status'
                            ,'renders.manu_name'
                            ,'city.title as city_title'
                            ,'region.title as region_title')
                            ->leftJoin('renders','cars.renders_id','=','renders.id')
                            ->join('city','cars.city_id','city.id')
                            ->join('region','city.region_id','region.id')
                            ->paginate(6);
        $this->navActive('vehicle', 'home', 'contact');
        return view('pages.car' ,  ['cars' => $cars , 'locations' => $locations , 'renders' => $renders , 'seats' => $seats]);
    } 
    //Filter cars by car brand, region, number of seats and increase/decrease in price.
    public function filter(Request $request) {
        $sort = $request->all();
        $results = array();
        //Sort one where
        if ($sort['render'] != "render") {
            $results = Cars::with('render')
                ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'renders.manu_name'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                ->join('renders', 'renders_id', '=',  'renders.id')
                ->join('city','cars.city_id','city.id')
                ->join('region','city.region_id','region.id')
                ->where('renders_id', '=', $request->render)
                ->paginate(6)
                ->appends([
                    'render' => $request->render, 'seat' => $request->seat, 
                    'locations' => $request->locations, 'price' => $request->price
                ]);
           
        }
        if ($sort['seat'] != "seat") {
            $results = Cars::with('render')
                 ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                ->join('city','cars.city_id','city.id')
                ->join('region','city.region_id','region.id')
                ->where('seat', '=', $request->seat)
                ->paginate(6)
                ->appends([
                    'render' => $request->render, 'seat' => $request->seat, 
                    'locations' => $request->locations, 'price' => $request->price
                ]);
        }
        if ($sort['locations'] != "locations") {
            $results = Cars::with('render')
                ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                ->join('city','cars.city_id','city.id')
                ->join('region','city.region_id','region.id')
                ->where('city.region_id', '=', $request->locations)->paginate(6)
                ->appends([
                    'render' => $request->render, 'seat' => $request->seat,
                    'locations' => $request->locations, 'price' => $request->price
                ]);
            //dd($results);

        }
        if ($sort['price'] != "price") {
            if ($sort['price'] == "1") {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('city','cars.city_id','city.id')
                    ->join('region','city.region_id','region.id')
                    ->orderBy('price', 'ASC')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            } else {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('city','cars.city_id','city.id')
                    ->join('region','city.region_id','region.id')
                    ->orderBy('price', 'DESC')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
        }
        //Sort two where
        if ($sort['render'] != "render" && $sort['seat'] != "seat") {
            $results = Cars::select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                ->join('renders', 'cars.renders_id', '=',  'renders.id')
                ->join('city','cars.city_id','city.id')
                ->join('region','city.region_id','region.id')
                ->where('cars.renders_id', '=', $sort['render'])
                ->where('seat', '=', $sort['seat'])
                ->paginate(6)
                ->appends([
                    'render' => $request->render, 'seat' => $request->seat, 
                    'locations' => $request->locations, 'price' => $request->price
                ]);
        }
        if ($sort['render'] != "render" && $sort['locations'] != "locations") {
            $results = Cars::with('render')
                ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                ->join('renders', 'cars.renders_id', '=',  'renders.id')
                ->join('city','cars.city_id','city.id')
                ->join('region','city.region_id','region.id')
                ->where('cars.renders_id', '=', $sort['render'])
                ->where('city.region_id', '=', $sort['locations'])
                ->paginate(6)
                ->appends([
                    'render' => $request->render, 'seat' => $request->seat, 
                    'locations' => $request->locations, 'price' => $request->price
                ]);
        }
        if ($sort['render'] != "render" && $sort['price'] != "price") {
            if ($sort['price'] == "1") {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                    ->join('renders', 'cars.renders_id', '=',  'renders.id')
                    ->join('city','cars.city_id','city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.renders_id', '=', $sort['render'])
                    ->orderBy('price', 'ASC')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            } else {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                    ->join('renders', 'cars.renders_id', '=',  'renders.id')
                    ->join('city','cars.city_id','city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.renders_id', '=', $sort['render'])
                    ->orderBy('price', 'DESC')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
        }
        if ($sort['seat'] != "seat" && $sort['locations'] != "locations") {
            $results = Cars::with('render')
                ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                ->join('city', 'cars.city_id', '=',  'city.id')
                ->join('region','city.region_id','region.id')
                ->where('city.region_id', '=', $sort['locations'])->where('seat', '=', $sort['seat'])
                ->paginate(6)
                ->appends([
                    'render' => $request->render, 'seat' => $request->seat, 
                    'locations' => $request->locations, 'price' => $request->price
                ]);
        }
        if ($sort['seat'] != "seat" && $sort['price'] != "price") {
            if ($sort['price'] == "1") {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('city', 'cars.city_id', '=',  'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('seat', '=', $sort['seat'])
                    ->orderBy('price')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat,
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            } else {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('city', 'cars.city_id', '=',  'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('seat', '=', $sort['seat'])
                    ->orderByDesc('price')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            }
        }
        if ($sort['locations'] != "locations" && $sort['price'] != "price") {
            if ($sort['price'] == "1") {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('city', 'cars.city_id', '=',  'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('city.region_id', '=', $sort['locations'])
                    ->orderBy('price', 'ASC')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            } else {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('city', 'cars.city_id', '=',  'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('city.region_id', '=', $sort['locations'])
                    ->orderBy('price', 'DESC')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            }
        }
        //Sort three where
        if ($sort['render'] != "render" && $sort['seat'] != "seat" && $sort['locations'] != "locations") {
            $results = Cars::with('render')
                ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                ->join('renders', 'cars.renders_id', '=',  'renders.id')
                ->join('city', 'cars.city_id', '=', 'city.id')
                ->join('region','city.region_id','region.id')
                ->where('cars.renders_id', '=', $sort['render'])
                ->where('city.region_id', '=', $sort['locations'])
                ->where('seat', '=', $sort['seat'])
                ->paginate(6)
                ->appends(['render' => $request->render, 'seat' => $request->seat,
                    'locations' => $request->locations, 'price' => $request->price
                ]);
        }
        if ($sort['render'] != "render" && $sort['seat'] != "seat" && $sort['price'] != "price") {
            if ($sort['price'] == "1") {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('renders', 'cars.renders_id', '=',  'renders.id')
                    ->join('city', 'cars.city_id', '=', 'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.renders_id', '=', $sort['render'])
                    ->where('seat', '=', $sort['seat'])
                    ->orderBy('price', 'ASC')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            } else {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('renders', 'cars.renders_id', '=',  'renders.id')
                    ->join('city', 'cars.city_id', '=', 'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.renders_id', '=', $sort['render'])
                    ->where('seat', '=', $sort['seat'])
                    ->orderBy('price', 'DESC')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            }
        }
        if ($sort['locations'] != "locations" && $sort['seat'] != "seat" && $sort['price'] != "price") {
            if ($sort['price'] == "1") {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('city', 'cars.city_id', '=',  'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('city.region_id', '=', $sort['locations'])
                    ->where('seat', '=', $sort['seat'])
                    ->orderBy('price', 'ASC')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            } else {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('city', 'cars.city_id', '=',  'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('city.region_id', '=', $sort['locations'])
                    ->where('seat', '=', $sort['seat'])
                    ->orderBy('price', 'DESC')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            }
        }
        if ($sort['render'] != "render" && $sort['locations'] != "locations" && $sort['price'] != "price") {
            if ($sort['price'] == "1") {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('renders', 'cars.renders_id', '=',  'renders.id')
                    ->join('city', 'cars.city_id', '=', 'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.renders_id', '=', $sort['render'])
                    ->where('city.region_id', '=', $sort['locations'])
                    ->orderBy('price', 'ASC')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            } else {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('renders', 'cars.renders_id', '=',  'renders.id')
                    ->join('city', 'cars.city_id', '=', 'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.renders_id', '=', $sort['render'])
                    ->where('city.region_id', '=', $sort['locations'])
                    ->orderBy('price', 'DESC')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            }
        }
        //Sort four where
        if ($sort['render'] != "render" && $sort['locations'] != "locations" && $sort['seat'] != "seat" && $sort['price'] != "price") {
            if ($sort['price'] == "1") {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('renders', 'cars.renders_id', '=',  'renders.id')
                    ->join('city', 'cars.city_id', '=',  'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.renders_id', '=', $sort['render'])
                    ->where('city.region_id', '=', $sort['locations'])
                    ->where('seat', '=', $sort['seat'])
                    ->orderBy('price', 'ASC')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            } else {
                $results = Cars::with('render')
                    ->select('cars.id','cars.name','cars.photo','cars.address'
                        ,'cars.price','cars.users_id','cars.renders_id'
                        ,'cars.city_id','cars.status'
                        ,'city.title as city_title'
                        ,'region.title as region_title')
                    ->join('renders', 'cars.renders_id', '=',  'renders.id')
                    ->join('city', 'cars.city_id', '=',  'city.id')
                    ->join('region','city.region_id','region.id')
                    ->where('cars.renders_id', '=', $sort['render'])
                    ->where('city.region_id', '=', $sort['locations'])
                    ->where('seat', '=', $sort['seat'])
                    ->orderBy('price', 'DESC')
                    ->paginate(6)
                    ->appends([
                        'render' => $request->render, 'seat' => $request->seat, 
                        'locations' => $request->locations, 'price' => $request->price
                    ]);
            }
        } else if ($sort['render'] == "render" && $sort['locations'] == "locations" && $sort['seat'] == "seat" && $sort['price'] == "price") {
            $results = Cars::with('render')
                ->select('cars.id','cars.name','cars.photo','cars.address'
                    ,'cars.price','cars.users_id','cars.renders_id'
                    ,'cars.city_id','cars.status'
                    ,'city.title as city_title'
                    ,'region.title as region_title')
                ->join('city', 'cars.city_id', '=',  'city.id')
                ->join('region','city.region_id','region.id')
                ->paginate(6)
                ->appends([
                    'render' => $request->render, 'seat' => $request->seat, 
                    'locations' => $request->locations, 'price' => $request->price
                ]);
        }
        $locations = Region::select('region.id','region.title','region.photo','region.status',DB::raw('COUNT(*) as number_of_vehicles'))
            ->join('city','city.region_id','region.id')
            ->join('cars','cars.city_id','city.id')
            ->where('region.status','active')
            ->groupBy('region.id')
            ->get();
        $renders = Reders::select('renders.id','renders.manu_name',DB::raw('COUNT(*) as count_region_cars'))
            ->join('cars','renders.id','cars.renders_id')
            ->groupBy('renders.id')
            ->orderBy('renders.id','desc')
            ->get();
        $seats = Cars::select('seat',DB::raw('COUNT(*) as sl_cars'))
            ->groupBy('cars.seat')
            ->get();
        return view('pages.car', ['cars' => $results, 'locations' => $locations, 
                'renders' => $renders, 'seats' => $seats, 'sorts' => $sort]);
    }
    //Vehicle information of yotrip
    public function vehicle_information(Request $request, $id) {
        $cars = Cars::select('cars.*','tariffs.one_to_three','tariffs.five_online','tariffs.ten_to_fourteen'
                            ,'tariffs.more_fifteen','tariffs.price_month'
                            )
                    ->where('cars.id',decrypt($id))
                    ->leftJoin('tariffs','cars.id','=','tariffs.cars_id')
                    // ->join('features','cars.id','features.cars_id')
                    ->first();
        $features = Features::select('features.*')
                    ->where('features.id',decrypt($id))
                    ->first();
        
        //Show customer reviews:
        $cars_review = Reviews::getAllReview();
        return view('pages.car-single', [
            'cars' => $cars, 
            'cars_review' => $cars_review,
            'features' => $features
        ]);    
    }
    // --------------------------------  PART ACCOUT ------------------------------ //
    public function user_register() {
        return view('login.register');
    }
    //Send otp code to user email.
    public function user_submit_otp(Request $request) {
        
        $this->validate(
            $request,
            [
                'name' => 'string|required|min:3',
                'email' => 'string|required|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'referral_code' => 'string|nullable',
                'remember_token' => '',
                
            ]
        );
      

        $dataAll = $request->all();
        $dataAll['password'] = bcrypt($request->password);
        $dataAll['referral_code'] = $request->referral_code;

        $otp = rand(1000, 9999);

        $data = [
            'otp' => $otp,
        ];

        Mail::send('login.sendmail', $data, function ($message) use ($dataAll) {
            $message->from('ngoctam2303001@gmail.com', 'Yotrip');
            $message->to($dataAll['email']);
            $message->subject('Verification mail');
        });

        return view('login.otp')->with('data', $data)->with('dataAll', $dataAll);
    } 
    //Verify your account with the otp code you just received
    public function user_register_submit(Request $request) {
        $data = $request->all();

        $otp =[
            'otp' => $request->otpRegister,
        ];
       // Mã giới thiệu
       $code = strtoupper(substr(md5(time()), 0, 6));

        if ($request->otpRegister == $request->otp) {
        
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $request->password;
            $data['otp'] = $request->otpRegister;
            $data['received_code'] = $code;
            $data['referral_code'] = $request->referral_code;
            
            $status = User::create($data);
            
            if ($status) {
                request()->session()->flash('success', 'Successfully registered!Please confrfirm your email!');
                return redirect('/ui/login');
            }
        }else{
            request()->session()->flash('error1', 'Wrong OTP');
            return view('login.otp')->with('data', $otp)->with('dataAll', $data);
        }
    }
    public function user_login() {
        return view('login.login');
    }
    //Login to the user's account.
    public function user_login_submit(Request $request) {
        $data = $request->all();
        $remember_token = ($request->has('remember_token')) ? true : false; // add
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'] , $remember_token)) {
            
            Session::put('user', $data['email']);
            request()->session()->flash('success', 'Successfully login');
            return redirect('/');
        } else {
            request()->session()->flash('error', 'Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }
    //Log out of your account
    public function user_logout() {
        Auth::logout();
        return redirect('/');
    }
    //Share the invite code to other users
    public function user_register_ref($ref) {
        $user = User::where('received_code', $ref)->first();
        return view('login.ref',['user' => $user]);
    }
    //User information.
    public function user_information($id) {
        $user = User::where('id', decrypt($id))->first();
        
        return view('login.profile')->with('user', $user);
    }
    public function user_profile($id) {
        $user = User::where('id', decrypt($id))->first();
        $count = User::where('referral_code', Auth::user()->received_code)->get()->count();
        $total = $count * 10;
        $this->navActive('vehicle', 'home', 'contact');
        return view('login.account')->with('user', $user)->with('total',$total);
    }
    //Change user-owned password
    public function user_change_password() {
        $profile = Auth()->user();
        return view('login.userPasswordChange')->with('profile', $profile);
    }
    //Go to customer referral code page
    public function user_reffect() {
        $refect = User::all();
        return view('pages.refeffect',['refect' => $refect]);
    }   

    // --------------------------------  PART BOOKING ------------------------------ //
    //Select car rental and fill in the details to rent a car
    public static function choose_time($id) {
        $cars = Cars::where('id', decrypt($id))->first();
        $coupons = Coupon::where('users_id' , Auth::user()->id)->get();
        return view('pages.choose-time', ['cars' => $cars , 'coupons' => $coupons]);
    }
    //Point to sanlbox test environment
    public function payment(Request $request, $id) {
        $payment = $request->all();
        session(['info-customs' => $payment]);
        return view('vnpay.index')->with('payment', $payment)->with('id', $id);
    }
    //Get payment information and point to payment information
    public static function payment_information($id, Request $request) {
        $booking = $request->all();
        $cars = Cars::where('id', decrypt($id))->first();
        session([
            'booking' => $booking, 
            'car' => $cars
        ]);
        return view('pages.pament', [
            'cars' => $cars, 
            'booking' => $booking
        ]);
    }
    //Show invoices to users.
    public function user_invoice() {
        return view('pages.invoice');
    }
    //Create payment using sanlbox test environment
    public function create_payment(Request $request) {
        $vnp_TxnRef = $request->order_id;
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',', '.', $request->amount) * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => 'Y4U88XFK',
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        session(['payment' => $inputData]);
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html' . "?" . $query;

        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
        $vnpSecureHash = hash('sha256', 'DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV' . $hashdata);
        $vnp_Url .=  'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html' . 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;

        return redirect($vnp_Url);
    }
    //Pay through test environment and issue invoice
    public function vnpay_return(Request $request) {

        $info = session()->get('info-customer');
        $book = session()->get('book');
        $car = session()->get('car');
        //Insert Booking 
        $demo = new Bookings();
        $demo->users_id = Auth::user()->id;
        $demo->cars_id = $car->id;
       
        $demo->address_on = $book['address'];
        $demo->address_off = $book['address_off'];
        $demo->total_amount = $book['total_amount'];
        $date = substr($book['time_start'], -2, 3);
        $date1 = substr($book['time_end'], -2, 3);
        if ($date == "pm") {
            $date = substr($book['time_start'], 0, 2);
            $h_timestart = (int)$date + 12;
            $m_timestart = substr($book['time_start'], 2, 3);
            $date = $h_timestart . $m_timestart;
        } else {
            $date = substr($book['time_start'], 0, -2);
        }

        if ($date1 == "pm") {
            $date1 = substr($book['time_end'], 0, 2);
            $h_timeend = (int)$date1 + 12;
            $m_timeend = substr($book['time_end'], 2, 3);
            $date1 = $h_timeend . $m_timeend;
        } else {
            $date1 = substr($book['time_end'], 0, -2);
        }

        $demo->time_start = $date;
        $demo->time_end = $date1;
        $demo->date_start = $book['date_start'];
        $demo->date_end = $book['date_end'];
        $demo->save();

        //Insert Payment 
        $demo1 = new Payment();
        $payments = session()->get('payment');
        $demo1->p_transaction_id = $demo->id;
        $demo1->p_user_id = Auth::user()->id;
        $demo1->p_money =  $payments['vnp_Amount'];
        $demo1->p_transaction_code = $request->vnp_TxnRef;
        $demo1->p_note =  $request->vnp_OrderInfo;
        $demo1->p_vnp_response_code = $request->vnp_ResponseCode;
        $demo1->p_code_vnpay = $request->vnp_TransactionNo;
        $demo1->p_code_bank = $request->vnp_BankCode;
        $demo1->p_time = date('Y-m-d H:i', strtotime($request->vnp_PayDate));
        $demo1->save();
        //Insert History 
        $demo2 = new Historys();
        $demo2->users_id = Auth::user()->id;
        $demo2->bookings_id = $demo->id;
        $demo2->save();
        $own = Cars::where('id',$car->id)->first();
        return view('pages.invoice')->with('own',$own)->with('booking',$book);
       
    }
    //Displays the user's payment history.
    public function payment_history() {
        $historys = Historys::all();
        return view('pages.history')->with('historys' , $historys);
    }
    // --------------------------------  PART OTHER ------------------------------ //
    //Show user's promo code
    public function user_coupon()  {
        $carsale = DB::table('vouchers')->where('users_id' , Auth::user()->id)->paginate(3);
        return view('pages.coupy')->with('carsale' , $carsale);
    }
    //Show and search promo codes
    public function search_coupon(Request $request) {
        $tukhoa = $request->get('keyword');
        $carsale = CarSales::where('zipcode',  'LIKE', "%$tukhoa%")->take(30)->paginate(4)->appends(['tukhoa' => $tukhoa]);
        return view('pages.coupy', ['carsale' => $carsale, 'tukhoa' => $tukhoa]);
    }
    //Display a list of customers' favorite cars
    public function favorite() {
        $cars = Wishlists::with('render')       
            ->leftJoin('cars', 'wishlists.cars_id', '=', 'cars.id')
            ->join('users', 'users.id', '=', 'wishlists.users_id')
            ->selectRaw('la_users.id as id_user, la_users.name as name_user, la_cars.*, la_wishlists.id as id_wishlist')
            ->where('wishlists.users_id', Auth::user()->id)
            ->orderBy('id','DESC')->paginate(6);
            
            //dd($cars);
             return view('pages.favorite', compact('cars'));
    }
    //Add favorite car when clicked
    public function add_favorite($id) {
        $wishList = new Wishlists;
        $wishList->users_id = Auth::user()->id;
        $wishList->cars_id = $id;
        $wishList->save();
        return back();
    }
    //Delete customer's favorite car
    public function delete_favorite($id) {
        //echo  $id;
        DB::table('wishlists')->where('cars_id', '=', $id)->delete();
        return back()->with('msg', 'San pham da duoc xoa khoi danh muc yeu thich');
    }
    //Display vehicle owner contact page
    public function contact() {
	    $this->navActive('contact', 'home', 'vehicle');
        return view('pages.contact');
    } 
    //Save user contact information
    public function save_contact(Request $request) {
    
        $request->validate([
        'name' => 'string|required',
        'email' => 'string|required',
        'message' => 'string|nullable',
        ]);
        $response = Http::post('https://yotrip.vn/api/contact', [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        if ($response->status() == "201") {
            return redirect()->route('home');
        }
    }


    // ------------------------ PART FOOTER -------------------- //
    // Owner's Manual (Details)
    public function pageContactUs() {
        return view('footers.contactus');
    }
    // Booking Instructions (Details)
    public function page_faq_customer() {
        return view('footers.faqcustomers');
    }
    public function page_faq_owner() {
        return view('footers.fqaowner');
    }
    public function page_owner() {
        return view('footers.registerowner');
    }
    public function page_agent() {
        return view('footers.registeragent');
    }
    public function page_intruction() {
        return view('footers.details');
    }
    public function page_payment() {
        return view('footers.paymentguide');
    }
    public function page_general() {
        return view('footers.generalguidance');
    }
    public function page_guide() {
        return view('footers.detailed');
    }
    // Term And Condition
    public function pageTerm() {
        return view('footers.term');
    } 
    // Best And Price Guarantee
    public function pageBestPriceGuarantee() {
        return view('footers.bestpriceguarantee');
    } 
    // Best And Price Guarantee
    public function pagePrivacyCookiesPolicy() {
        return view('footers.privacycookiespolicy');
    }
    // Best And Price Guarantee
    public function pageFaq() {
        return view('footers.faq');
    } 
    // Payment Option
    public function pagePaymentOption() {
        return view('footers.paymentoption');
    }
    // BookingTips
    public function pageBookingTips() {
        return view('footers.bookingtips');
    }
    // BookingTips
    public function pageHowItWorks() {
        return view('footers.howitworks');
    }
    public function pageAbout() {
        return view('pages.about');
    } 
    public function pageService() {
        return view('pages.serivice');
    } 
    // Create active navbar
    public function navActive($routeActive, $r1, $r2)
    {
        Session::put($routeActive, 'active');
        Session::put($r1, null);
        Session::put($r2, null);
        return;
    }
}
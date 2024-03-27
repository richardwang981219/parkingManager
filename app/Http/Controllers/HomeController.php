<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use XBase\Table;
use XBase\TableReader;
use App\Vehicle;
use App\User;
use App\Electri;
use App\Parking;
use App\Place;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function users( ) {

        $users = User::all();
        
        $User = [];
        
        foreach($users as $user) {
            if($user->role == "ADMIN") continue;
            $User[$user->id]['id'] = $user->id - 1;
            $User[$user->id]['name'] = $user->name;
            // $User[$user->id]['vehicle'] = $user->vehicle_id;
            $User[$user->id]['vehicle'] = Vehicle::where('id',$user->vehicle_id)->first()->CarModel;
        }

        return view('app.users',[
            'users' => $User
        ]);
    }



    public function vehicles(Request $request) {

        $vehicles = Vehicle::all();

        return view('app.vehicles',[
            'vehicles' => $vehicles
        ]);
    }
    public function parking() {
        $parkingImg = Place::all();
        // print_r($parkingImg);

        // print_r($Parking);
        return view('app.parking',[
            'parkdatas' => $parkingImg,
        ]);
        
    }
    public function electricity() {

        $elec = Electri::first();

        return view('app.electricity',[
            'elecs' => $elec
        ]);
    }
    public function log() {
        
        $parkings = Parking::all();
        
        return view('app.log',[
            'parkings' => $parkings
        ]);
    }

    public function myprofile() {



        return view('user.myprofile');
    }

    public function recharge() {

        $vehicles = Vehicle::all();
        $Vehicle = [];
        $Capacity;
        foreach($vehicles as $vehicle) {
            $Vehicle[$vehicle->id]['id'] = $vehicle->id;
            $Vehicle[$vehicle->id]['CarModel'] = $vehicle->CarModel;
            $Capacity[$vehicle->id] = $vehicle->Capacity;
        }

        $places = Place::all();
        $Place = [];
        $i = 0;
        
        foreach($places as $place) {
            if($place->state == 0) {
                $Place[$i]['place'] = $place->place;
                $i ++;
            }
                
        }

        $electries = Electri::all();
        $Electri;

        foreach($electries as $elec) {
            $Electri = $elec->current;
        }
        return view('user.recharge',[
            'vehicles' => $Vehicle,
            'places' => $Place,
            'capacity' => $Capacity,
            'elec' => $Electri
        ]);
    }

    public function deletemodel(REQUEST $request) {

        // echo $request['model'];
        // die;

        DB::table('Vehicle')->where('CarModel', $request['model'])->delete();

        return ['success' => $request['model']] ;
    }
    public function savemodel(REQUEST $request) {

        Vehicle::updateOrCreate(
            ['id' => $request['id']],
            ['CarModel' => $request['model'], 'Capacity' => $request['capacity']] 
        );
        return ['success' => $request['id']];
    }

    public function saveLog(Request $request) {

        // Parking::insert
        // return ['success' => 'true'];
        $time = Carbon::now();
        // return ['success' => 'true'];
    
        $parking = new Parking();
        $parking->user_id = $request['user'];
        $parking->vehicle_id = $request['veh'];
        $parking->time = $time;
        $parking->from = 1;
        $parking->to = 2;
        $parking->position = $request['position'];
        $parking->save();

        Electri::updateOrCreate(
            ['id' => 1],
            ['current' => $request['capacity']] 
        );

        Place::updateOrCreate(
            ['place' => $request['position']],
            ['state' => $request['veh']]
        );
        return ['success' => 'true'];
    }

    public function deleteLog(Request $request) {

        Place::updateOrCreate(
            ['place' => $request['position']],
            ['state' => 0 ]
        );
        return ['success' => 'ture'];
    }

    public function getLog(Request $request) {

        $lastRecord = Parking::where('position',$request['place'])->orderBy('id', 'desc')->first();
        return ['vehicle' => $lastRecord->vehicle->CarModel,'username' => $lastRecord->user->name,'chargetime' => $lastRecord->time];
    }
}

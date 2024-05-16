<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PartnerRegistration extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.partnerRegistration');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postDataRegis(Request $request)
    {
        $regis = array();
        $regis['firstname'] = $request->firstname;
        $regis['lastname'] = $request->lastname;
        $regis['email'] = $request->email;
        redirect()->route('partner.registration.full');
        return view('pages.registrationFull')->with('regis', $regis); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFull(Request $request)
    {
        $regis = array();
        $regis['firstname'] = $request->firstname;
        $regis['lastname'] = $request->lastname;
        $regis['email'] = $request->email;
        return view('pages.registrationFull')->with('regis', $regis);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postDataApplication(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'city' => 'required',
            'accept' => 'required'
        ]);
        return Redirect::to('/partner-regis');
    }
}

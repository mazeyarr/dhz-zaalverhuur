<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use App\Contract;
use Auth;
use PDF;

class AdminController extends Controller
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

    public function index()
    {
        return view('auth.home');
    }

    public function indexContracts()
    {
        return view('auth.contracts');
    }

    public function saveContract(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'adres' => 'required',
            'phone' => 'required',
            'business' => '',
            'reservation' => 'required',
            'decoratingtime' => 'required',
            'guests' => 'required',
            'rent_room' => 'required',
            'sound_system' => '',
            'dj' => '',
            'dj_hours' => '',
            'pioneer_cd' => '',
            'smokemachine' => '',
            'lasermachine' => '',
            'beamer' => '',
            'standup-tables' => '',
            'stage_parts' => '',
            'furniture' => '',
            'buyin_coins' => 'required',
            'coin_price' => 'required',
            'buyin_liqour' => 'required',
            'deposit' => 'required',
            'min_bar_revenue' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator->getMessageBag());
        }

        $contract = new Contract();
        $contract->name = $request->name;
        $contract->adres = $request->adres;
        $contract->phone = $request->phone;
        $contract->business = ($request->has("business")) ? 1 : 0;

        if ($request->has("business")){
            if ($request->business == "true") {
                $validateCompany = Validator::make($request->all(), [
                    'name_representative' => 'required',
                    'adres_representative' => 'required',
                    'phone_representative' => 'required',
                ]);

                if ($validateCompany->fails()) {
                    return redirect()->back()->withInput($request->all())->withErrors($validateCompany->getMessageBag());
                }

                $contract->name = $request->name_representative;
                $contract->adres = $request->adres_representative;
                $contract->phone = $request->phone_representative;
            }
        }

        $dates = explode('-', $request->reservation);

        $from = Carbon::createFromFormat('d/m/Y H:i', trim($dates[0]));
        $till = Carbon::createFromFormat('d/m/Y H:i', trim($dates[1]));
        $decorationtime = Carbon::createFromFormat('H:i', $request->decoratingtime);

        $contract->from = $from->toDateTimeString();
        $contract->till = $till->toDateTimeString();
        $contract->decorationtime = $from->format('Y-m-d'). " " . $decorationtime->format('H:i:s');

        $totalCost = (double) 0;

        $contract->guests = $request->guests;

        $contract->rent_room = (double) $request->rent_room;
        $totalCost = $totalCost + (double) $request->rent_room;

        $contract->rent_security = (double) $request->rent_security;
        $totalCost = $totalCost + (double) $request->rent_security;

        $contract->buyin_coins = (double) $request->buyin_coins;
        $contract->coin_price = (double) $request->coin_price;
        $contract->buyin_liqour = (double) $request->buyin_liqour;
        $totalCost = $totalCost + (double) $request->buyin_coins;
        $totalCost = $totalCost + (double) $request->buyin_liqour;

        $contract->deposit = (double) $request->deposit;
        $contract->min_bar_revenue = (double) $request->min_bar_revenue;

        if ($request->has("sound_system")) {
            $contract->rent_sound = (double) 35;
            $totalCost = $totalCost + (double) 35;
        }

        if ($request->has("dj")) {
            $contract->rent_dj = (double) 150;
            $totalCost = $totalCost + (double) 150;
        }

        if ($request->has("dj_hours")) {
            $contract->rent_dj_afterhours = (double) 30;
            $totalCost = $totalCost + (double) 30;
        }

        if ($request->has("pioneer_cd")) {
            $contract->rent_pioneer_cd = (double) 40;
            $totalCost = $totalCost + (double) 40;
        }

        if ($request->has("smokemachine")) {
            $contract->rent_smokemachine = (double) 10;
            $totalCost = $totalCost + (double) 10;
        }

        if ($request->has("lasermachine")) {
            $contract->rent_lasermachine = (double) 10;
            $totalCost = $totalCost + (double) 10;
        }

        if ($request->has("beamer")) {
            $contract->rent_beamer = (double) 25;
            $totalCost = $totalCost + (double) 25;
        }

        if ($request->has("standup_tables")) {
            $contract->rent_standuptables = (double) 10;
            $totalCost = $totalCost + (double) 10;
        }

        if ($request->has("stage_parts")) {
            $contract->rent_stage_parts = (double) 25;
            $totalCost = $totalCost + (double) 25;
        }

        if ($request->has("furniture")) {
            $contract->rent_furniture = (double) 15;
            $totalCost = $totalCost + (double) 15;
        }
        $contract->cost = $totalCost;

        $contract->user_id = Auth::user()->id;

        $contract->save();

        $pdf = PDF::loadView('auth.contract-print', compact('contract'));
        return $pdf->download('Contract - '. $contract->name .'.pdf');
    }
}

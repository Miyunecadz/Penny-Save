<?php

namespace App\Http\Controllers;

use App\Models\Piggy;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PiggyController extends Controller
{

    public function create()
    {
        return view('piggy-bank.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'range' => 'required|numeric',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $piggy = Piggy::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount?? 0,
            'range' => $request->range,
            'owner_id' => Auth::id()
        ]);

        if($request->amount > 0)
        {
            Transaction::create([
                'piggy_bank_id' => $piggy->id,
                'date' => Carbon::parse(now())->format('Y-m-d'),
                'amount' => $piggy->amount
            ]);
        }

        return redirect()->back()->with(['created'=> true]);
    }
}

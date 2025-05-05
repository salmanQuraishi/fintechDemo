<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AdminBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-bank.index');
    }

    public function getAdminBanks()
    {
        $adminBank = Bank::get();
    
        return DataTables::of($adminBank)
            ->addIndexColumn()
            ->make(true);
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-bank.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'acc_holder_name' => 'string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:50|unique:banks',
            'ifsc' => 'required|string|max:20',
            'type' => 'required|in:saving,current,business',
            'status' => 'required|in:active,inactive',
        ]);

        $bank = new Bank;

        $bank->user_id = auth()->user()->id;
        $bank->acc_holder_name = $request->acc_holder_name;
        $bank->bank_name = $request->bank_name;
        $bank->account_no = $request->account_no;
        $bank->ifsc = $request->ifsc;
        $bank->type = $request->type;
        $bank->status = $request->status;
        $bank->save();

        return redirect()->route('bank.adminbankList')->with('success', 'Bank record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        return view('admin.banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bank = Bank::where('id','=',$id)->first();
        // dd($bank);
        return view('admin-bank.form', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $validated = $request->validate([
            'acc_holder_name' => 'string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:50,',
            'ifsc' => 'required|string|max:20',
            'type' => 'required|in:saving,current,business',
            'status' => 'required|in:active,inactive',
        ]);

        $bank = Bank::findOrFail($id);

        $bank->user_id = auth()->user()->id;
        $bank->acc_holder_name = $request->acc_holder_name;
        $bank->bank_name = $request->bank_name;
        $bank->account_no = $request->account_no;
        $bank->ifsc = $request->ifsc;
        $bank->type = $request->type;
        $bank->status = $request->status;
        $bank->save();

        return redirect()->route('bank.adminbankList')->with('success', 'Bank record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('bank.banks.index')->with('success', 'Bank record deleted successfully.');
    }
}
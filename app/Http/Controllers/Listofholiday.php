<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;

class Listofholiday extends Controller
{
    public function index()
    {      
        $holiday= Holiday::all();
        return view('holiday.index',compact('holiday'));
    }


    public function create()
    {
       
        return view('holiday.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:Active,Inactive',
        ]);

        Holiday::create([
            'name' => $request->name,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        return redirect()->route('listofholiday.index')->with('success', 'holiday created successfully.');
    }

    public function show(Payslip $payslip)
    {
        return view('payslips.show', compact('payslip'));
    }

    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id);
        return view('holiday.edit', compact('holiday'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:Active,Inactive',
        ]);

        $holiday = Holiday::findOrFail($id);

        $holiday->update([
            'name' => $request->name,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        return redirect()->route('listofholiday.index')->with('success', 'Holiday updated successfully.');
    }

    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();

        return redirect()->route('listofholiday.index')->with('success', 'Holiday deleted successfully.');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Payslip;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PayslipController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 

        if ($user->role == 'admin') {
        
            $payslips = Payslip::with('user')->get();
        } else {
        
            $payslips = Payslip::with('user')->where('user_id', $user->id)->get();
        }

        return view('payslips.index', compact('payslips'));
    }


    public function create()
    {
        $users = User::all();
        return view('payslips.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'month' => 'required|date_format:Y-m',
            'basic_salary' => 'required|numeric',
            'allowances' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
            'advance_salary'=> 'numeric',
        ]);

        $month = Carbon::parse($request->month . '-01');       

        $existingPayslip = Payslip::where('user_id', $request->user_id)
        ->whereMonth('month', $month->month)
        ->whereYear('month', $month->year)
        ->first();

        if ($existingPayslip) {
            return redirect()->route('payslips.index')->with('error', 'Payslip for this month already created.');
        }

        $total_days = $month->daysInMonth;

        $days_worked = Attendance::where('user_id', $request->user_id)
            ->whereMonth('date', $month->month)
            ->whereYear('date', $month->year)
            ->where('status', 'Present')
            ->count();            

        $net_salary = ($request->basic_salary / $total_days) * $days_worked + $request->allowances - $request->deductions - $request->advance_salary;

        Payslip::create([
            'user_id' => $request->user_id,
            'month' => $month->toDateString(),
            'basic_salary' => $request->basic_salary,
            'allowances' => $request->allowances,
            'deductions' => $request->deductions,
            'net_salary' => $net_salary,
            'total_days' => $total_days,
            'advance_salary' => $request->advance_salary,
            'days_worked' => $days_worked,
        ]);

        return redirect()->route('payslips.index')->with('success', 'Payslip created successfully.');
    }

    public function show(Payslip $payslip)
    {
        return view('payslips.show', compact('payslip'));
    }

    public function edit(Payslip $payslip)
    {
        $users = User::all();
        return view('payslips.edit', compact('payslip', 'users'));
    }

    public function update(Request $request, Payslip $payslip)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'month' => 'required|date_format:Y-m', // Validate the month format
        'basic_salary' => 'required|numeric',
        'allowances' => 'nullable|numeric',
        'deductions' => 'nullable|numeric',
        'advance_salary'=> 'numeric',
    ]);

    $month = Carbon::parse($request->month . '-01'); // Convert month to a full date format (first day of the month)
    $total_days = $month->daysInMonth;

    $days_worked = Attendance::where('user_id', $request->user_id)
        ->whereMonth('date', $month->month)
        ->whereYear('date', $month->year)
        ->where('status', 'Present')
        ->count();

    $net_salary = ($request->basic_salary / $total_days) * $days_worked + $request->allowances - $request->deductions - $request->advance_salary;

    $payslip->update([
        'user_id' => $request->user_id,
        'month' => $month->toDateString(), // Save as a full date string
        'basic_salary' => $request->basic_salary,
        'allowances' => $request->allowances,
        'deductions' => $request->deductions,
        'net_salary' => $net_salary,
        'total_days' => $total_days,
        'days_worked' => $days_worked,
        'advance_salary' => $request->advance_salary,
    ]);

    return redirect()->route('payslips.index')->with('success', 'Payslip updated successfully.');
}


    public function destroy(Payslip $payslip)
    {
        $payslip->delete();
        return redirect()->route('payslips.index')->with('success', 'Payslip deleted successfully.');
    }

    public function downloadPayslip($id)
    {
        $payslip = Payslip::findOrFail($id);
    
        // Configure Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        $dompdf = new Dompdf($options);
    
        // Load HTML view file
        $html = view('payslips.payslip', compact('payslip'))->render();
        $dompdf->loadHtml($html);
    
        $dompdf->setPaper('A4', 'portrait');   
     
        $dompdf->render();   
    
        return $dompdf->stream('payslip.pdf');
    }
    
}

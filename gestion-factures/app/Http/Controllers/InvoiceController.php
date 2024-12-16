<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Mail\InvoiceCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $request->validate([
          'client_name' => 'required|max:255',
            'invoice_date' => 'nullable|date',
        ]);

        $query = Invoice::query();
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }
        if ($request->filled('client_name')) {
            $query->where('client_name', 'like', '%' . $request->client_name . '%');
        }

        if ($request->filled('invoice_date')) {
            $query->whereDate('invoice_date', $request->invoice_date);
        }

        return response()->json($query->get(), 200);
    }

    public function markAsPaid($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(['error' => 'invoice not found'], 404);
        }

        $invoice->status = "paid";
        
        $invoice->save();

        return response()->json(['message' => 'invoice marked as paid', 'invoice' => $invoice], 200);
    }
    public function markAsUnPaid($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(['error' => 'invoice not found'], 404);
        }

        $invoice->status = "Unpaid";
        
        $invoice->save();

        return response()->json(['message' => 'invoice marked as paid', 'invoice' => $invoice], 200);
    }
    public function index()
    {
        $invoices = Invoice::all();
     
        return view('invoices.index', compact('invoices'));
    }
 
/*
public function download($id)
{
   
    $invoice = Invoice::findOrFail($id);

    
    $filePath = "private/invoices" . $invoice->file_path;

    
    if (Storage::exists($filePath)) {
        return Storage::download($filePath, $invoice->file_path);
    }

  
    abort(404, 'File not found.');
}*/


public function view($id)
{
    $invoice = Invoice::findOrFail($id);

    $filePath = 'private/' . $invoice->file_path;


    if (Storage::exists($filePath)) {
      
        return response()->file(storage_path('app/' . $filePath));
    }

    abort(404, 'File not found.');
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required|max:255',
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,canceled',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);
        if ($request->hasFile('file')) {
            $validatedData['file_path'] = $request->file('file')->store('invoices');
            }

       $invoice=  Invoice::create($validatedData);
      // Envoi de l'email
Mail::to('elmahdanisouhail@gmail.com')->send(new InvoiceCreated($invoice));
       

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
{
    // The $invoice instance is automatically resolved by Route Model Binding
    return view('invoices.edit', compact('invoice'));
}

public function update(Request $request, Invoice $invoice)
{

    $validated = $request->validate([
        'client_name' => 'required|max:255',
        'invoice_date' => 'required|date',
        'amount' => 'required|numeric|min:0',
        'status' => 'required|in:unpaid,paid,canceled',
        'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    ]);
    if ($request->hasFile('file') && \Storage::exists($invoice->file_path)) {
        \Storage::delete($invoice->file_path);
        $validated['file_path'] = $request->file('file')->store('invoices');
        }

   
    $invoice->update($validated);

   
    return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        if ($invoice->file_path) {
            \Storage::delete($invoice->file_path);
            }
      
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');   
    }
}
<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Address;
class ClientController extends Controller
{
    public function show()
    {
      $clients = Client::with('address')->paginate(10);
     
        return view('invoices.indexClients', compact('clients'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;

class ProductController extends Controller
{
    public function index()
{
$produits = Product::with('supplier')->paginate(10); // Charger les fournisseurs associés
return view('invoices.products', compact('produits'));
}
}

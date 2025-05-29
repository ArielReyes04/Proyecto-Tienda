<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class SaleController extends Controller
{
    public function index()
    {
        $salesAux = Sale::where('user_id', Auth::id())->with('items')->get();
        $sales_item = SaleItem::find($salesAux->pluck('id')->toArray());


        $sales = $salesAux->map(function ($sale) {
            $sale->total = $sale->items->sum(function ($item) {
                return $item->quantity * $item->price;
            });
            return $sale;
        });
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $productsArray = [];
        foreach ($request->products as $id => $quantity) {
            $productsArray[] = [
                'id' => $id,
                'quantity' => $quantity,
            ];
        }
        $request->merge(['products' => $productsArray]);
        
        $validated = $request->validate([
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ], [
            'products.required' => 'Debes seleccionar al menos un producto.',
            'products.array' => 'El formato de productos no es válido.',
            'products.min' => 'Debes seleccionar al menos un producto.',

            'products.*.id.required' => 'Falta el ID de un producto seleccionado.',
            'products.*.id.exists' => 'Uno de los productos seleccionados no es válido.',

            'products.*.quantity.required' => 'Debes indicar la cantidad para cada producto.',
            'products.*.quantity.integer' => 'La cantidad de cada producto debe ser un número entero.',
            'products.*.quantity.min' => 'La cantidad mínima de un producto debe ser al menos 1.',
        ]);


        try {
            $sale = Sale::create([
                'user_id' => Auth::id(),
            ]);

            foreach ($request->products as $productData) {
                $product = Product::find($productData['id']);
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $productData['id'],
                    'quantity' => $productData['quantity'],
                    'price' => $product->price
                ]);
                // Descontamos del stock
                $product->stock -= $productData['quantity'];
                $product->save();
            }
            return redirect()->route('sales.index')->with('success', 'Venta registrada.');
        } catch (\Exception $e) {
            return back()->with('error', 'Ocurrió un error al registrar la venta.');
        }
    }

}

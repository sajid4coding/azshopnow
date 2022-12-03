<?php

namespace App\Http\Controllers;

use App\Models\{AttributeColor, AttributeSize, Inventory, Product};
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventory($id)
    {
        return view('vendor.inventory.inventory',[
            'attributesizes' => AttributeSize::where('vendor_id', auth()->id())->get(),
            'attributecolors' => AttributeColor::where('vendor_id', auth()->id())->get(),
            'product' => Product::findOrFail($id),
            'inventories' => Inventory::where('vendor_id', auth()->id())->get(),
        ]);
    }
    public function add_inventory(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required'
        ]);

        if(Inventory::where([
            'product_id' => $id,
            'vendor_id' => auth()->id(),
            'size' => $request->size,
            'color' => $request->color,
            'price' => $request->price,
        ])->exists()){Inventory::where([
                'product_id' => $id,
                'vendor_id' => auth()->id(),
                'size' => $request->size,
                'color' => $request->color,
            ])->increment('quantity', $request->quantity);
        }else{
            Inventory::insert([
                'product_id' => $id,
                'vendor_id' => auth()->id(),
                'size' => $request->size,
                'color' => $request->color,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'created_at' => now()
            ]);
        }

        return back()->with('add_inventory', 'Inventory Added Successfully');
    }
    public function delete_inventory($id)
    {
        Inventory::find($id)->delete();
        return back()->with('delete_inventory', 'Inventory Delete Successfully');
    }
}

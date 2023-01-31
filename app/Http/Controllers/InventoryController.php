<?php

namespace App\Http\Controllers;

use App\Models\{AttributeColor, AttributeSize, Inventory, Product,General};
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventory($id)
    {
        if(auth()->user()->role == 'vendor'){
            return view('vendor.inventory.inventory',[
                'attributesizes' => AttributeSize::where('vendor_id', auth()->id())->get(),
                'attributecolors' => AttributeColor::where('vendor_id', auth()->id())->get(),
                'product' => Product::findOrFail($id),
                'inventories' => Inventory::where('product_id', $id)->get(),
                'general' => General::find(1),
            ]);
        }else{
            return view('vendor.inventory.inventory',[
                'attributesizes' => AttributeSize::where('vendor_id', auth()->user()->vendor_id)->get(),
                'attributecolors' => AttributeColor::where('vendor_id', auth()->user()->vendor_id)->get(),
                'product' => Product::findOrFail($id),
                'inventories' => Inventory::where('product_id', $id)->get(),
                'general' => General::find(1),
            ]);
        }
    }
    public function add_inventory(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required'
        ]);
        if(auth()->user()->role == 'vendor'){
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
                    'price' => $request->price,
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
        }else{
            if(Inventory::where([
                'product_id' => $id,
                'vendor_id' => auth()->user()->vendor_id,
                'size' => $request->size,
                'color' => $request->color,
                'price' => $request->price,
            ])->exists()){Inventory::where([
                    'product_id' => $id,
                    'vendor_id' => auth()->user()->vendor_id,
                    'size' => $request->size,
                    'color' => $request->color,
                    'price' => $request->price,
                ])->increment('quantity', $request->quantity);
            }else{
                Inventory::insert([
                    'product_id' => $id,
                    'vendor_id' => auth()->user()->vendor_id,
                    'size' => $request->size,
                    'color' => $request->color,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'created_at' => now()
                ]);
            }
        }

        return back()->with('add_inventory', 'Product and Inventory Added Successfully');
    }
    public function delete_inventory($id)
    {
        Inventory::find($id)->delete();
        return back()->with('delete_inventory', 'Inventory Delete Successfully');
    }
}

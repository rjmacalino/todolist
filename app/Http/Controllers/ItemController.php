<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{

    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }


    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save(); 

        return $newItem;
    }


    public function update(Request $request, $id)
    {
        $existingItem = Item::find( $id );
            
            if ($existingItem) {
                $existingItem->completed = $request->item['completed'] ? true : false;
                // if item is 'completed' set 'completed' to true else false;
                $existingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
                // same as above, but we will update the completed_at with the current date and time using 'carbon'
                // do not forget to declare it at the top, use Illuminate\Support\Carbon;
                $existingItem->save();
                return $existingItem;
                
            }
                // if for some reason there is no existing item with that $id
                return "Item not found.";
    }   


    public function destroy($id)
    {
        $existingItem = Item::find ($id);

        if($existingItem) {
            $existingItem->delete();
            return "item has been deleted.";
        }

        return "Item not found.";
    }
}

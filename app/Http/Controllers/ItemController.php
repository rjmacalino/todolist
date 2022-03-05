<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{

    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }
    public function index()
    {
        return $this->item->all()->latest();
    }

    public function store(ItemRequest $request)
    {
        return $this->item->create($request->validated());
    }


    public function update(ItemRequest $request, $id)
    {
        if (!$this->checkIfExist($id)) return "Item not found.";

        return $this->item->find($id)->fill($request->validated())->save();
    }


    public function destroy($id)
    {
        if (!$this->checkIfExist($id)) return "Item not found.";
        $this->item->whereId($id)->delete();
        return $this->index();
    }

    private function checkIfExist($id)
    {
        $item = $this->item->find($id);
        return !$item ? false : true;
    }
}

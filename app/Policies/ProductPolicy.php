<?php

namespace App\Policies;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    function edit(User $authUser, Product $produt){

        return $authUser->id == $produt->user_id;
    }
    function update(User $authUser, Product $produt){

        return $authUser->id == $produt->user_id;
    }
}




    public function edit($id)
    {
        $product =  Product::find($id);
        $this->authorize('edit', $product);
        return view('products.edit', compact("product"));
    }

    public function update(Request $request, $id)
    {
        $product =  Product::find($id);
        $product->fill($request->all());
        $this->authorize('edit', $product);
        $product->save();
        return redirect("/products/edit")->with('success','Updated');
    }

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishListComponent extends Component
{
    public function removeFromWishlist($product_id){
        foreach (Cart::instance('wishlist')->content() as $witem){
            if($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-icon-component','refreshComponent');
            }
        }
    }
    public function render()
    {
        return view('livewire.wish-list-component');
    }
}

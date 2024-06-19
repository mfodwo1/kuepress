<?php
namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartDetails extends Component
{
    public $currentItem = null;
    public $newDescription = '';

    protected $listeners = ['editDescription'];

    public function render()
    {
        return view('livewire.cart-details', [
            'items' => Cart::content(),
            'total'=> Cart::total(),
            'count' => Cart::count()
        ]);
    }

    public function editDescription($rowId)
    {
        $item = Cart::get($rowId);
        $this->currentItem = $item;
        $this->newDescription = $item->options->description;
        $this->dispatchBrowserEvent('openEditModal');
    }

    public function updateDescription()
    {
        if ($this->currentItem) {
            $item = Cart::get($this->currentItem->rowId);
            $item->options->description = $this->newDescription;
            Cart::update($this->currentItem->rowId, $item->qty, ['options' => $item->options]);

            $this->currentItem = null;
            $this->newDescription = '';
            $this->dispatchBrowserEvent('closeEditModal');
            $this->dispatch('cart_updated');
        }
    }

    public function updateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        $this->dispatch('cart_updated');
    }
}







//
//namespace App\Livewire;
//
//use Gloudemans\Shoppingcart\Facades\Cart;
//use Livewire\Component;
//
//class CartDetails extends Component
//{
//
//    public function render()
//    {
//        return view('livewire.cart-details', [
//            'items' => Cart::content(),
//            'total'=> Cart::total(),
//            'count' => Cart::count()
//        ]);
//    }
//
//    public function updateCart($rowId, $qty)
//    {
//        Cart::update($rowId, $qty);
//    }
//
//    public function removeFromCart($rowId)
//    {
//        Cart::remove($rowId);
//
//        $this->dispatch('cart_updated');
//    }
//}

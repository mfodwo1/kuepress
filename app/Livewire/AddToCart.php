<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddToCart extends Component
{
    use WithFileUploads;

    public $userImage;
    public $userDescription;

    public $design;
    public $quantity = 1;


    public function mount($design)
    {
        $this->design = $design;
    }


    public function addToCart()
    {
        try {
            $design = $this->design;

            $this->validate([
                'userImage' => 'required|image|max:2048',
                'userDescription'=>'required|string|max:2048',
                'quantity' => 'required|integer|min:' . $design->min_order,
            ]);

            // Handle image upload
            if ($this->userImage) {
                $path = $this->userImage->store('uploads','public');
            }


            // Add to cart with additional details
            Cart::add([
                'id' => $design->id,
                'name' => $design->title,
                'qty' => $this->quantity,
                'price' => $design->price,
                'weight' => 0,
                'options' => [
                    'description' => $this->userDescription,
                    'image' => $path,
                ]
            ]);

            $this->dispatch('cart_updated');
            session()->flash('success', 'Added to cart successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
        }
    }


public function render()
    {
        return view('livewire.add-to-cart');
    }
}

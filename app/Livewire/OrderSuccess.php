<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderSuccess extends Component
{
    public $reference;

    public function mount($order)
    {
        $this->reference = Order::where('id', $order)->value('reference');
    }

    public function render()
    {
        return view('livewire.order-success')->layout('layouts.app');
    }
}

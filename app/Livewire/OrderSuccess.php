<?php

namespace App\Livewire;

use Livewire\Component;

class OrderSuccess extends Component
{
    public $orderId;

    public function mount($order)
    {
        $this->orderId = $order;
    }

    public function render()
    {
        return view('livewire.order-success')->layout('layouts.app');
    }
}

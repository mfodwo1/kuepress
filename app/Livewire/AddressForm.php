<?php

namespace App\Livewire;

use App\Models\UserAddress;
use Livewire\Component;

class AddressForm extends Component
{
    public $address;
    public $addition_information;
    public $city;
    public $region;
    public $gps_address;
    public $country;

    protected $rules = [
        'address' => 'required|string|max:255',
        'addition_information' => 'nullable|string|max:100',
        'city' => 'required|string|max:100',
        'region' => 'required|string|max:100',
        'gps_address' => 'nullable|string|max:20',
        'country' => 'required|string|max:50',
    ];

    public function submit()
    {
        $this->validate();
        UserAddress::create([
            'user_id' => auth()->id(),
            'address' => $this->address,
            'addition_information' => $this->addition_information,
            'city' => $this->city,
            'region' => $this->region,
            'gps' => $this->gps_address,
            'country' => $this->country,
        ]);

        // Emit event to notify Alpine.js to show the checkout button
        $this->dispatch('addressAdded');
    }

    public function render()
    {
        return view('livewire.address-form');
    }
}

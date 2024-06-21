<?php
namespace App\Livewire;

use App\Models\Order;
use App\Models\UserAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;


class CartDetails extends Component
{
    public $cartItemsJson;
    public $total;
    public $currentItem = null;
    public $newDescription = '';

    public $address;
    public $addition_information;
    public $city;
    public $region;
    public $gps_address;
    public $country;

    protected $user_address;

    public $savedAddresses = [];
    public $selectedAddressId = null;

    protected $listeners = ['editDescription', 'addressAdded' => 'handleAddressAdded'];

    public function mount()
    {
        $this->loadSavedAddresses();
    }

    public function loadSavedAddresses()
    {
        $this->savedAddresses = UserAddress::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.cart-details', [
            'items' => Cart::content(),
            'total_price' => Cart::total(),
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
            $this->dispatch('closeEditModal');
        }
    }

    public function updateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        $this->dispatchBrowserEvent('cart_updated');
    }

    public function processCheckout()
    {
        $address_id =  $this->selectedAddressId ?? $this->SaveAddress();

        if (Auth::check()) {
            $order = $this->createOrder($address_id);

            if ($order) {
                return redirect()->route('order.success', ['order' => $order->id]);
            } else {
                session()->flash('error', 'There was an issue processing your order. Please try again.');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function createOrder($address_id)
    {
        $cartItems = Cart::content();

        if ($cartItems->isEmpty()) {
            session()->flash('error', 'Your cart is empty.');
            return 0;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'reference'=> 'KP'.uniqid(),
            'address_id' => $address_id,
            'status' => 'pending',
            'total_price' => number_format((float) Cart::total(), 2, '.', ''),
        ]);

        foreach ($cartItems as $item) {
            $order->orderItems()->create([
                'design_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
                'additional_instructions' => $item->options->description ?? '',
                'user_design' => $item->options->image,
            ]);
        }
        Cart::destroy();

        if ($order) {
            session()->flash('success', 'Order successfully created!');
            return $order;
        } else {
            session()->flash('error', 'There was an issue processing your order. Please try again.');
            return 0;
        }
    }

    protected $rules = [
        'address' => 'required|string|max:255',
        'addition_information' => 'nullable|string|max:100',
        'city' => 'required|string|max:100',
        'region' => 'required|string|max:100',
        'gps_address' => 'nullable|string|max:20',
        'country' => 'required|string|max:50',
    ];

    public function SaveAddress()
    {
        $this->validate();
        $this->user_address =UserAddress::create([
            'user_id' => auth()->id(),
            'address' => $this->address,
            'addition_information' => $this->addition_information,
            'city' => $this->city,
            'region' => $this->region,
            'gps' => $this->gps_address,
            'country' => $this->country,
        ]);
        return $this->user_address->id;
    }


}

<?php


namespace App\Livewire;

use Livewire\Component;

class EditDescription extends Component
{
    public $description;
    public $rowId;
    public $image;
    public $editing = false;

    public function mount($description, $rowId, $image)
    {
        $this->description = $description;
        $this->rowId = $rowId;
        $this->image = $image;
    }

    public function updateDescription()
    {
        // Retrieve the item from the cart
        $item = \Cart::get($this->rowId);

        // Update the description while preserving other options
        $options = $item->options->toArray();
        $options['description'] = $this->description;

        // Update the cart item with the new options
        \Cart::update($this->rowId, ['options' => $options]);
        $this->editing = false;
        $this->dispatch('descriptionUpdated'); // Emit an event if needed
    }

    public function render()
    {
        return view('livewire.edit-description');
    }
}



//
//namespace App\Livewire;
//
//use Livewire\Component;
//
//class EditDescription extends Component
//{
//    public $description;
//    public $rowId;
//    public $options;
//
//    public function mount($description, $rowId, $options)
//    {
//        $this->description = $description;
//        $this->rowId = $rowId;
//        $this->options = $options;
//    }
//
//    public function updateDescription()
//    {
//        // Preserve all options and update only the description
//        $this->options['description'] = $this->description;
//
//        // Update the cart item with the new options
//        \Cart::update($this->rowId, ['options' => $this->options]);
//        $this->dispatch('descriptionUpdated');
//    }
//
//    public function render()
//    {
//        return view('livewire.edit-description');
//    }
//}

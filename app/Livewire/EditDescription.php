<?php

namespace App\Livewire;

use Livewire\Component;

class EditDescription extends Component
{
    public $description;
    public $rowId;
    public $options;

    public function mount($description, $rowId, $options)
    {
        $this->description = $description;
        $this->rowId = $rowId;
        $this->options = $options;
    }

    public function updateDescription()
    {
        // Preserve all options and update only the description
        $this->options['description'] = $this->description;

        // Update the cart item with the new options
        \Cart::update($this->rowId, ['options' => $this->options]);
        $this->dispatch('descriptionUpdated');
    }

    public function render()
    {
        return view('livewire.edit-description');
    }
}

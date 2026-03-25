<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class Suppliers extends Component
{
    use WithPagination;

    public $search = '';
    public $supplierId;
    public $name, $email, $phone, $address;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:suppliers,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
    ];

    public function render()
    {
        $suppliers = Supplier::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(4);

        return view('livewire.suppliers', compact('suppliers'));
    }

    public function create()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->dispatch('show-modal');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        $this->supplierId = $id;
        $this->name = $supplier->name;
        $this->email = $supplier->email;
        $this->phone = $supplier->phone;
        $this->address = $supplier->address;
        $this->isEdit = true;
        $this->dispatch('show-modal');
    }

    public function save()
    {
        if ($this->isEdit) {
            $this->rules['email'] = 'required|email|unique:suppliers,email,' . $this->supplierId;
        }

        $this->validate();

        if ($this->isEdit) {
            Supplier::find($this->supplierId)->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
            ]);
            session()->flash('message', 'Supplier updated successfully.');
        } else {
            Supplier::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
            ]);
            session()->flash('message', 'Supplier created successfully.');
        }

        $this->resetForm();
        $this->dispatch('hide-modal');
    }

    public function delete($id)
    {
        Supplier::findOrFail($id)->delete();
        session()->flash('message', 'Supplier deleted successfully.');
    }

    private function resetForm()
    {
        $this->reset(['supplierId', 'name', 'email', 'phone', 'address', 'isEdit']);
    }
}

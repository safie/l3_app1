<?php

use Livewire\Volt\Component;
use Mary\Traits\Toast;
use Livewire\Attributes\Rule;
use App\Models\Isu;

new class extends Component {
    use Toast;

    #[Rule('required', message: 'Sila masukkan isu')]
    public $isu;

    #[Rule('required', message: 'Sila masukkan keterangan isu berkenaan')]
    #[Rule('min:3', message: 'Keterangan tidak mempunyai lebih 3 perkataan')]
    public $keterangan;

    public function store()
    {
        $this->validate();

        //create post
        Isu::create([
            'isu_nama' => $this->isu,
            'isu_keterangan' => $this->keterangan,
        ]);

        //flash message
        // session()->flash('message', 'Data telah disimpan.');

        //redirect
        // return redirect()->route('isu.index');

        //Toast message
        $this->success('Data telah di simpan!', position: 'toast-top toast-center', redirectTo: '/isu');
    }
}; ?>

<div class="container mt-5 mb-5">
    <x-mary-card class="uppercase" title="Borang Isu" subtitle="" shadow separator>
        <x-form wire:submit="store" enctype="multipart/form-data">
            <x-input label="Isu" wire:model="isu" />
            <x-input label="Keterangan" wire:model="keterangan" />

            <x-slot:actions>
                <x-button label="Batal" link="/isu" />
                <x-button class="btn-primary" type="submit" label="Submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-mary-card>
</div>

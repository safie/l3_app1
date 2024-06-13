<?php

use Livewire\Volt\Component;
use App\Models\Isu;
use Mary\Traits\Toast;
use Livewire\Attributes\Rule;

new class extends Component {
    use Toast;

    public $isuID;

    #[Rule('required', message: 'Sila masukkan isu')]
    public $isu;

    #[Rule('required', message: 'Sila masukkan keterangan isu berkenaan')]
    #[Rule('min:3', message: 'Keterangan tidak mempunyai lebih 3 perkataan')]
    public $keterangan;

    public function mount($id)
    {
        //get post
        $isu = Isu::find($id);

        //assign
        $this->isuID = $isu->id;
        $this->isu = $isu->isu_nama;
        $this->keterangan = $isu->isu_keterangan;
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        //get post
        $isu = Isu::find($this->isuID);

        //update post
        $isu->update([
            'isu_nama' => $this->isu,
            'isu_keterangan' => $this->keterangan,
        ]);

        //flash message
        // session()->flash('message', 'Data Berhasil Diupdate.');

        //Toast message
        $this->success('Data telah di kemaskini!', position: 'toast-top toast-center', redirectTo: '/isu');

        //redirect
        // return redirect()->route('posts.index');
    }
}; ?>

<div class="container mt-5 mb-5">
    <x-mary-card class="uppercase" title="Borang Isu" subtitle="" shadow separator>
        <x-form wire:submit="update" enctype="multipart/form-data">
            <x-input label="Isu" wire:model="isu" />
            <x-input label="Keterangan" wire:model="keterangan" />

            <x-slot:actions>
                <x-button label="Batal" link="/isu" />
                <x-button class="btn-primary" type="submit" label="Submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-mary-card>
</div>

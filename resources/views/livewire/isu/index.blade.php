<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\Isu;
use Mary\Traits\Toast;

new class extends Component {
    use WithPagination;
    use Toast;

    public function destroy($id)
    {
        //destroy
        Isu::destroy($id);

        //flash message
        // session()->flash('message', 'Data Berhasil Dihapus.');

        //Toast
        $this->error('Data telah di padam!', position: 'toast-top toast-center');

        //redirect
        return redirect()->route('posts.index');
    }

    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'isu_nama', 'label' => 'Isu'],
            ['key' => 'isu_keterangan', 'label' => 'Keterangan'], # <---- nested attributes
        ];
    }

    public function with(): array
    {
        return [
            'isu' => Isu::paginate(10),
            'headers' => $this->headers(),
        ];
    }
};

?>

<div>
    <!-- HEADER -->
    <x-header class="uppercase " title="Isu" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
        </x-slot:actions>
    </x-header>

    <!-- flash message -->
    @if (session()->has('message'))
        <x-alert class="mb-3 alert-warning" title="{{ session('message') }}" description="" icon="o-exclamation-triangle"
            dismissible />
    @endif
    <!-- end flash message -->

    <!-- TABLE  -->
    <x-card>
        <div class="flex flex-row-reverse">
            <x-button class="btn-primary btn-sm" label="Tambah" link="/isu/create" />
        </div>
        <x-table :headers="$headers" :rows="$isu" with-pagination>
            @scope('actions', $isu)
                <x-button class="text-red-500 btn-ghost btn-sm" href="/isu/{{ $isu->id }}/edit" icon="o-pencil-square"
                    wire:navigate />
                <x-button class="text-red-500 btn-ghost btn-sm" icon="o-trash" wire:click="destroy({{ $isu['id'] }})"
                    wire:confirm="Anda Pasti?" spinner />
            @endscope
        </x-table>
    </x-card>
</div>

<div class="container mt-5 mb-5">
    <x-mary-card title="Tambah Artikel" subtitle="Our findings about you" shadow separator>
        <x-form wire:submit="store" enctype="multipart/form-data">
            <x-input label="Tajuk" wire:model="title" />
            <x-input label="Keterangan" wire:model="description" />
            <x-file wire:model="image" label="Gambar" hint="Only PDF" accept="application/image" />

            <x-slot:actions>
                <x-button label="Cancel" link="/posts" />
                <x-button class="btn-primary" type="submit" label="Submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-mary-card>
</div>

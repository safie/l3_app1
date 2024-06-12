@php
    $post = $posts;

    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'title', 'label' => 'Title'],
        ['key' => 'description', 'label' => 'Description'], # <---- nested attributes
    ];
@endphp

<div>
    <!-- HEADER -->
    <x-header title="Post" separator progress-indicator>
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
            <x-button class="btn-primary btn-sm" label="Tambah" link="/posts/create" />
        </div>
        <x-table :headers="$headers" :rows="$post">
            @scope('actions', $post)
                <x-button class="text-red-500 btn-ghost btn-sm" icon="o-pencil-square"
                    link="/posts/edit/{{ $post->id }}" />
                <x-button class="text-red-500 btn-ghost btn-sm" icon="o-trash" wire:click="destroy({{ $post['id'] }})"
                    wire:confirm="Are you sure?" spinner />
            @endscope
        </x-table>
    </x-card>
</div>

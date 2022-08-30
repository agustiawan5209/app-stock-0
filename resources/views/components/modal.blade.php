<section>
     {{-- Tambah --}}
 <x-jet-dialog-modal wire:model='itemAdd'>
    <x-slot name="title">
        Tambah Satuan
    </x-slot>
    <x-slot name="content">
        {{ $modal_dialog }}
    </x-slot>
    <x-slot name="footer">
        <x-jet-danger-button type="button" wire:click="$toggle('itemAdd')">Tutup</x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
{{-- Edit --}}
<x-jet-dialog-modal wire:model='itemEdit'>
    <x-slot name="title">
        Edit Satuan
    </x-slot>
    <x-slot name="content">
        {{ $modal_edit }}
    </x-slot>
    <x-slot name="footer">
        <x-jet-button type="button" wire:click="$toggle('itemEdit')">Simpan</x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
{{-- Delete --}}
<div>
    <x-jet-confirmation-modal wire:model='itemDelete'>
        <x-slot name="title">
            Delete Satuan
        </x-slot>
        <x-slot name="content">
            {{ $modal_delete }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-button type="button" wire:click="$toggle('itemDelete')">Simpan</x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
</section>

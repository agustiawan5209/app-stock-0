

@include('sweetalert::alert')
<div class="items-center w-full py-4 mx-auto my-2 bg-white rounded-lg shadow-md ">
    <div class="container mx-auto px-3 md:px-10">
        <x-jet-button wire:click='addModal()'>Tambah</x-jet-button>
        <div class="mt-6 overflow-x-auto">
            <table  class=" table-datatable w-full table-auto">
                {{ $slot }}
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
       var tabel= $('.table-auto').DataTable({

        });
    });
</script>

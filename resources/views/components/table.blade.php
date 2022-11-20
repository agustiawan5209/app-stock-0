@include('sweetalert::alert')
<div class="items-center w-full md:py-4 md:mx-auto my-2 bg-white rounded-lg shadow-md ">
    <div class="container mx-auto px-2 md:px-10">
        @if ($tambahItem)
            <x-jet-button wire:click='addModal()'>Tambah</x-jet-button>
        @endif
        <div class="md:mt-6 overflow-x-auto">
            <table  class="table-datatable  w-full table-auto bg-white">
                {{ $slot }}
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.table-datatable').DataTable({
            "processing": true,
            deferRender: true,
            scrollCollapse: true,
            scroller: true,
            select: true
        });
    });
</script>

<div class="animate__animated animate__fadeIn">
    <div  id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


       <div class="w-full overflow-hidden">
        <div class="w-full overflow-auto">
            <table class="stripe hover w-full whitespace-no-wrap" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                    <tr class="bg-gray-300 text-dark">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">supplier</th>
                        <th class="px-4 py-3">Nomor Telepon</th>
                        <th class="px-4 py-3">Alamat</th>
                        {{-- <th class="px-4 py-3">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $item)
                        <tr>
                            <td class=" border border-gray-100 ">{{ $loop->iteration }}</td>
                            <td class=" border border-gray-100 ">{{ $item->supplier }}</td>
                            <td class=" border border-gray-100 ">{{ $item->user->no_telpon }}</td>
                            <td class=" border border-gray-100 " class="text-xs whitespace-pre-wrap w-48">{{ $item->user->alamat }}</td>
                            {{-- <td>
                                <ul class="flex justify-around">
                                   @include('components.action.delete', ['value' => $item->id])
                                   @include('components.action.edit', ['value' => $item->id , 'table'=> $item])
                                </ul>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>

            </table>
           </div>
       </div>

    </div>
</div>



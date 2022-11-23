<div>
    <div class="items-center w-full py-4 mx-auto my-10 bg-white rounded-lg shadow-md">
        <div class=" container mx-auto px-3 md:px-10">
            <div class="flex flex-col md:flex-row gap-2">
                <div class="overflow-auto ">
                    <table class="table">
                        <tbody>
                            <x-tr>
                                <x-th class="bg-secondary ">Metode Bayar</x-th>
                                <x-td>Bank {{$barang->pesanan->transaksi->metode}}</x-td>
                            </x-tr>
                            <x-tr>
                                <x-th class="bg-secondary ">ID Pesanan</x-th>
                                <x-td>{{$barang->pesanan->transaksi->ID_transaksi}}</x-td>
                            </x-tr>
                            <x-tr>
                                <x-th class="bg-secondary ">Kode Barang Masuk</x-th>
                                <x-td>{{$barang->kode}}</x-td>
                            </x-tr>
                            <x-tr>
                                <x-th class="bg-secondary ">Bahan Baku</x-th>
                                <x-td>
                                    @if ($barang->pesanan->jenis == 1)
                                    @if ($barang->pesanan->bahanbaku == null)
                                        Bahan Baku Produksi Hilang
                                    @else
                                        {{ $barang->pesanan->bahanbaku->nama_bahan_baku }}
                                    @endif
                                @endif
                                @if ($barang->pesanan->jenis == 2)
                                    @if ($barang->pesanan->bahanbakuKemasan == null)
                                        Bahan Baku Kemasan Hilang
                                    @else
                                        {{ $barang->pesanan->bahanbakuKemasan->nama_bahan_baku }}
                                    @endif
                                @endif
                                </x-td>
                            </x-tr>
                            <x-tr>
                            <x-th class="bg-secondary ">Tanggal Transaksi</x-th>
                            <x-td>{{$barang->pesanan->transaksi->tgl_transaksi}}</x-td>
                            </x-tr>
                            <x-tr>
                                <x-th class="bg-secondary ">Jumlah Pembelian</x-th>
                                <x-td>{{$barang->pesanan->jumlah}}</x-td>
                            </x-tr>
                            <x-tr>
                                <x-th class="bg-secondary ">Total Pembelian</x-th>
                                <x-td>Rp. {{number_format($barang->pesanan->sub_total, 0,2)}}</x-td>
                            </x-tr>
                        </tbody>
                    </table>
                </div>
                <div class="card w-96 glass">
                    <figure><img src="{{asset('upload/bukti/'.$barang->pesanan->transaksi->bukti_transaksi)}}" alt="car!"/></figure>
                    <div class="card-body">
                      <h2 class="card-title bg-info-content px-2 py-2 text-center">Bukti Bayar</h2>
                      <div class="card-action">
                        <a href="{{url()->previous()}}" class="btn btn-error">Kembali</a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

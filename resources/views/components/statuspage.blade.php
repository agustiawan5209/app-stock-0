<div>
    <ul class="steps steps-vertical">
        @foreach ($pesanan as $status)
            <li class="step step-primary">
                <div class="card bg-info-content">
                    <div class="card-body px-3 py-0 p-0">
                        <div class="card-title text-sm p-0">
                            <span class="font-bold">@switch($status->status)
                                @case(0)
                                    Pembayaran Belum Di Konfirmasi
                                    @break
                                @case(1)
                                    Pembayaran Di Konfirmasi
                                    @break
                                @case(2)
                                    Pengiriman Barang
                                    @break
                                @case(3)
                                    Barang Diterima
                                    @break
                                @case(4)
                                    Barang Gagal Diterima
                                    @break
                                @default
                                Barang Gagal
                            @endswitch</span>
                        </div>
                        <p>Ket : {!! $status->ket !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

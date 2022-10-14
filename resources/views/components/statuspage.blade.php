<div>
    <ul class="steps steps-vertical">
        @foreach ($pesanan as $status)
            <li class="step step-primary">
                <div class="card bg-primary-focus">
                    <div class="card-body">
                        <div class="card-title">
                            @switch($status->status)
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
                                Error
                            @endswitch
                        </div>
                        <p>{!! $status->ket !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    <b>{{ $greeting }}</b>
    <br><hr>
    <p>Nama Pesanan</p>&nbsp;<p>{{$nama_pesanan}}</p>
    <br><hr>
    <p>Jumlah Pesanan</p>&nbsp;<p>{{$jumlah_pesanan}}</p>
    <br><hr>
    <p>Total Pembayaran</p>&nbsp;<p>{{$total_harga}}</p>


    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent

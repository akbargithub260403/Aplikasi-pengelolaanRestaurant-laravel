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
    <p>Nama Paket</p><p>{{$nama_paket}}</p>
    <hr>
    <p>Nama Pesanan</p><p>{{$nama_pesanan}}</p>
    <hr>
    <p>Jumlah Pesanan</p><p>{{$jumlah_pesanan}}</p>
    <hr>
    <p>Total Pembayaran</p><p>{{$total}}</p>


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

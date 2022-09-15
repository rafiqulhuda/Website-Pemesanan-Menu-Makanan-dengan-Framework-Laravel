    @extends('layouts.frontend')
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" >        
        <script src="https://kit.fontawesome.com/f4cf3b69a5.js" crossorigin="anonymous"></script><link rel="stylesheet" href="{{ asset('/css/invoice.css') }}">
    </head>
    @section('content')
        <div class="desktop" >
            <div class="container-fluid" style="margin-top: 80px;">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">  
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('warning'))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
              </div>
              @endif

                <div class="card">
                    <div class="box-header">
                        <h3>Ringkasan Pesanan</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table"> 
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Penerima</th>
                                    <th>Alamat</th>
                                    <th>Total Bayar</th>
                                    <th>Tanggal</th>
                                    <th>Kode Pesanan</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @foreach($orders as $index=>$order)
                                    <tbody>
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $order->receiver }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>Rp. {{ number_format($order->total_price,0) }}</td>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>
                                            @if($order->status == 'belum bayar')
                                                {{-- <button type="button" class="btn bg-secondary">{{ ucwords($order->status) }}</button> --}}
                                                <p><i class="fa fa-circle" style="margin-right: 5px;color:yellow"></i>{{ ucwords($order->status) }}</p>
                                            @elseif($order->status == 'menunggu verifikasi')
                                                {{-- <button type="button" class="btn bg-warning">{{ ucwords($order->status) }}</button> --}}
                                                <p><i class="fa fa-circle" style="margin-right: 5px;color:orange"></i>{{ ucwords($order->status) }}</p>
                                            @elseif($order->status == 'dibayar')
                                                {{-- <button type="button" class="btn btn-success">{{ ucwords($order->status) }}</button> --}}
                                                <p><i class="fa fa-circle" style="margin-right: 5px;color:green"></i>{{ ucwords($order->status) }}</p>
                                            @else
                                                {{-- <button type="button" class="btn bg-danger">{{ ucwords($order->status) }}</button> --}}
                                                <p><i class="fa fa-circle" style="margin-right: 5px;color:red"></i>{{ ucwords($order->status) }}</p>
                                            @endif
                                        </td>
                                        <td class="action">
                                            <a href="{{ route('invoice.detail', ['id' => $order->id]) }}" class="button-61">Detail</a>
                                            @if($order->status == 'belum bayar')
                                                <a href="{{ route('confirm.index', ['id' => $order->id]) }}" class="button-62">Konfirmasi Pembayaran</a>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="box-footer" style="margin-top: 20px;">
                        <p>Batas waktu pembayaran sampai pukul 16.00 WIB. Apabila melewati batas tersebut pesanan akan otomatis ditolak
                        </p>
                        <p>Silahkan lalukan pembayaran di kasir atau melalui transfer ke rekening 12345679.
                        Kemudiana lakukan upload bukti pembayaran/transfer
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
    

        {{-- start mobile --}}


        

<div class="main-content" style="margin-top: 100px;" style="justify-content: center;">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    @endif
 
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
 
   
   <div class="header" style="text-align: center;">
        <h1>Ringkasan Pesanan </h1>
     </div>
     @foreach($orders as $index=>$order)
     <div class="wrapper">
            <div class="card">
                <div class="card-body" style="margin: 0px">
                    <div class="invoice-title">
                        <h5 class="float-end font-size-12">Order # {{ $order->id }}</h5>
                    </div>
                        <div>
                            @if($order->status == 'belum bayar')
                            <p><i class="fa fa-circle" style="margin-right: 5px;color:yellow"></i>{{ ucwords($order->status) }}</p>
                        @elseif($order->status == 'menunggu verifikasi')
                            <p><i class="fa fa-circle" style="margin-right: 5px;color:orange"></i>{{ ucwords($order->status) }}</p>
                        @elseif($order->status == 'dibayar')
                            <p><i class="fa fa-circle" style="margin-right: 5px;color:green"></i>{{ ucwords($order->status) }}</p>
                        @else
                            <p><i class="fa fa-circle" style="margin-right: 5px;color:red"></i>{{ ucwords($order->status) }}</p>
                        @endif
                        </div>
                <hr>
                    <div class="left" style="float: left">    
                    <div class="name" >
                        <strong>Nomor Meja</strong><br>
                            {{ $order->address }}
                    </div>
                    <div class="meja">
                        <strong>Nama Pemesan</strong><br>
                        {{ $order->receiver }}
                    </div>
                </div>
                <div class="right" style="float: right">
                    <div class="tanggal" >
                        <strong>Tanggal</strong><br>
                        {{ $order->date }}
                    </div>
                    <div class="total" >
                        <strong>Total Bayar</strong><br>
                        {{ number_format($order->total_price,0) }}
                    </div>
                </div>
                  
                <p style="margin-top: 130px; width: 100%;">Silahkan lalukan pembayaran di kasir atau melalui transfer ke rekening 12345679.
                    Kemudiana lakukan upload bukti pembayaran/transfer. Batas waktu konfirmasi pembayaran sampai pukul 16.00. Apabila melewati
                    batas tersebut pesanan akan otomatis ditolak
                    </p>
                <div class="action">
                    <a href="{{ route('invoice.detail', ['id' => $order->id]) }}" class="button-61">Detail</a>
                    @if($order->status == 'belum bayar')
                        <a href="{{ route('confirm.index', ['id' => $order->id]) }}" class="button-62">Konfirmasi Pembayaran</a>
                    @endif
                 </div>
  
            </div>
   
                                 
</div>
@endforeach  
    <p style="text-align: center;padding: 10px">Copyright 2022</p>    
    </div>           
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>var closebtns = document.getElementsByClassName("close");
        var i;
        
        // Loop through the elements, and hide the parent, when clicked on
        for (i = 0; i < closebtns.length; i++) {
          closebtns[i].addEventListener("click", function() {
            this.parentElement.style.display = 'none';
          });
        }</script>

    @endsection

        




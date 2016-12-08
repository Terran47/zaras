@extends('layouts.app')

@section('content')
    <div class="foto-otchety-block">
@include('menu')
        <h1>Фотоотчеты</h1>
        <div class="container">
            <div class="foto-otchety-slider-block">
                <div class="col-lg-12">
                    <div class="col-lg-3 slide-foto-block">
                        <img src="/media/logo.png" alt="" class="logo-foto-otchet">
                    </div>
                    @foreach($fotoOtchets as $fotoOtchet)
                        <div class="col-lg-3 slide-foto-block">
                            <img src="{{$fotoOtchet->foto_images}}" alt="" class="logo-foto-otchet">
                        </div> 
                    @endforeach
                    {{ $fotoOtchets->links() }}                
                </div>  
            </div>
        </div>
    </div>

@endsection
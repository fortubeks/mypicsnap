@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header pb-0 text-center">
                    <img class="img-fluid" style="max-width: 100%;" src="{{asset('storage/cover-pic.jpg')}}">
                </div>
                <div class="card-body">
                    <div class="title">
                        Favour & Fortune's Wedding
                    </div>
                    <div class="body">

                        <p>Favour and Fortune met by chance but quickly realized their meeting was destiny.
                            Through laughter and shared dreams, their bond grew unbreakable.
                            Fortune's steady heart matched Favour's radiant spirit, creating a love story of harmony and joy.
                            Today, they invite you to celebrate the beginning of their forever together. ❤
                        </p>

                        <p>We cant wait to see all the memories you help capture!</p>
                        <p>Please scan the QR CODE with your smartphone's camera and upload your photo and video</p>

                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.guest.footer')
@endsection
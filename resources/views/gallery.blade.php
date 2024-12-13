@extends('layouts.gallery')
@section('content')

<div class="container-fluid py-4">
    <main id="events" class="wrapper main-content" role="main">
        <div class="row" style="overflow-x: auto;">
            <div class="col" style="overflow-x: auto;">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="overflow-x: auto; white-space: nowrap; display: flex; width:max-content">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pre Wedding</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Welcome Party</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Ceremony</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-contact" aria-selected="false">After Party</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <select class="form-select" id="filter-select">
                            <option value="all">All</option>
                            <option value="mine">My Uploads</option>
                        </select>
                    </div>
                    <div class="">
                        <div class="body">

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="photo-gallery">
                                        <div class="row photos">
                                            @foreach($preWeddingImages as $image)
                                            <div class="col-sm-6 col-md-4 col-lg-3 col-6 item"><a href="{{asset('storage/'.$image->path)}}" data-lightbox="photos"><img style="width: 200px; height:200px" class="img-fluid" loading="lazy" src="{{asset('storage/'.$image->path)}}"></a></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="photo-gallery">
                                        <div class="row photos">
                                            @foreach($welcomePartyImages as $image)
                                            <div class="col-sm-6 col-md-4 col-lg-3 col-6 item"><a href="{{asset('storage/'.$image->path)}}" data-lightbox="photos"><img style="width: 200px; height:200px" class="img-fluid" loading="lazy" src="{{asset('storage/'.$image->path)}}"></a></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="photo-gallery">
                                        <div class="row photos">
                                            @foreach($ceremonyImages as $image)
                                            <div class="col-sm-6 col-md-4 col-lg-3 col-6 item"><a href="{{asset('storage/'.$image->path)}}" data-lightbox="photos"><img style="width: 200px; height:200px" class="img-fluid" loading="lazy" src="{{asset('storage/'.$image->path)}}"></a></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="photo-gallery">
                                        <div class="row photos">
                                            @foreach($afterPartyImages as $image)
                                            <div class="col-sm-6 col-md-4 col-lg-3 col-6 item"><a href="{{asset('storage/'.$image->path)}}" data-lightbox="photos"><img style="width: 200px; height:200px" class="img-fluid" loading="lazy" src="{{asset('storage/'.$image->path)}}"></a></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

@include('layouts.footers.guest.footer')
@endsection
<script>
    window.addEventListener('load', function() {
        $('#filter-select').change(function() {
            // Get the selected value
            var selectedValue = $(this).val();

            // Redirect to the URL with the query parameter
            window.location.href = '/gallery?filter=' + selectedValue;

        });
    });
</script>
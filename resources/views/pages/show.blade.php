@extends('layouts.master')

@section('content')
   <div class="row">
      <div class="col-12">
      <div class="card shadow mb-4">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Detail Artikel</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body">
            <h1>Judul : {{ $artikel->judul }}</h1>
            <h6>Slug : {{ $artikel->slug }}</h6>
            <p>{{ $artikel->isi }}</p>
            @foreach ($tag as $value)
                <button class="btn btn-success">{{ $value }}</button>
            @endforeach
         </div>
         </div>
      </div>
   </div>
@endsection
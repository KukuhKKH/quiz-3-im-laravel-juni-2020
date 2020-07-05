@extends('layouts.master')

@section('content')
<div class="row">
   <div class="col-12">
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-primary">Update Artikel</h6>
      </div>
      <div class="card-body">
         <form action="{{ route('artikel.update', $artikel->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
               <label for="">Judul</label>
               <input type="text" class="form-control" name="judul" value="{{ $artikel->judul }}">
            </div>
            <div class="form-group">
               <label for="">Isi</label>
               <textarea class="form-control" name="isi" id="" cols="30" rows="5">{{ $artikel->isi }}</textarea>
            </div>
            <div class="form-group">
               <label for="">Tags</label>
               <select name="tags[]" id="tags" class="form-control" multiple="multiple">
                  @foreach ($tags as $value)
                        <option value="{{ $value->id }}" {{ (in_array($value->nama, $tag)) ? 'selected' : '' }}>{{ $value->nama }}</option>
                  @endforeach
               </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
         </form>
      </div>
      </div>
   </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
   $(document).ready(function() {
      $('#tags').select2({
         multiple: true
      })
   })
</script>
@endsection
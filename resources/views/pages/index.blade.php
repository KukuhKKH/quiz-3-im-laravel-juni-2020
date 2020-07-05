@extends('layouts.master')

@section('content')
   <div class="row">
      <div class="col-12">
      <div class="card shadow mb-4">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
            <div class="dropdown no-arrow">
               <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
               <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
               </a>
            </div>
         </div>
         <!-- Card Body -->
         <div class="card-body">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Judul</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($artikel as $value)
                      <tr>
                         <td>{{ $no++ }}</td>
                         <td>{{ $value->judul }}</td>
                         <td>
                           <div class="btn-group" role="group">
                              <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action</button>
                              <div class="dropdown-menu"> 
                                 <a href="{{ route('artikel.show', $value->id) }}" class="btn-detaildata text-info dropdown-item" ><i class="fa fa-eye"></i>Detail</a>
                                 <a href="{{ route('artikel.edit', $value->id) }}" class="btn-editdata text-info dropdown-item"><i class="fa fa-edit"></i> Edit</a>
                                 <form method="POST" action="{{ route('artikel.destroy', $value->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapusdata text-danger dropdown-item"><i class="fa fa-trash"></i>Hapus</button>  
                                 </form>
                              </div>
                           </div>
                         </td>
                      </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         </div>
      </div>
   </div>
@endsection

@section('scripts')
<script>
   Swal.fire({
       title: 'Berhasil!',
       text: 'Memasangkan script sweet alert',
       icon: 'success',
       confirmButtonText: 'Cool'
   })
</script>
@endsection
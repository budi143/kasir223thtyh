<div class="container-fluid pt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><b>Manajemen User</b></h5>
                        <a href="/admin/user/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                    </div>

                    @if(session()->has('success'))
                        <div class="alert alert-success"><i class="fas fa-check mr-1"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($user as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/admin/user/{{$item->id}}/edit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <!--<a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>-->
                                    <form action="/admin/user/{{$item->id}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                                    </form>
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
    </div>
</div>
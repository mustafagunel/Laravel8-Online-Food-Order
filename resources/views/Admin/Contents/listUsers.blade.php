 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Restaurants List</h1>
</div>

<!-- Content Row -->

<div class="row">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>#id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Town</th>
                                    <th>status</th>
                                    <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $r)
                                        <tr>
                                            <td>{{ $r->id }}</td>
                                            <td>{{ $r->name.' '.$r->surname }}</td>
                                            <td>{{ $r->email }}</td>
                                            <td>{{ $r->role }}</td>
                                            <td>{{ $r->address }}</td>
                                            <td>{{ $r->cname }}</td>
                                            <td>{{ $r->tname }}</td>
                                            <td>@if($r->status==1) Aktif @else Pasif @endif </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="/admin/edit/user/{{ $r->id }}" role="button">Edit</a>
                                                <a class="btn btn-danger btn-sm " href="/admin/delete/user/{{ $r->id }}" role="button">Delete</a>
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

    </div>
</div>
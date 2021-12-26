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
                                    <th>Owner</th>
                                    <th>User Type</th>
                                    <th>Image</th>
                                    <th>City</th>
                                    <th>Town</th>
                                    <th>status</th>
                                    <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($restaurants as $r)
                                        <tr>
                                            <td>{{ $r->id }}</td>
                                            <td>{{ $r->title }}</td>
                                            <td>{{ $r->uEmail }}</td>
                                            <td>{{ $r->uRole }}</td>
                                            <td><img src="/images/restaurants-logo/{{ $r->image }}" width="50px" /></td>
                                            <td>{{ $r->cName }}</td>
                                            <td>{{ $r->tName }}</td>
                                            <td>{{ $r->status }}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm" href="/admin/edit/restaurant/{{ $r->id }}" role="button">Edit</a>
                                                <a class="btn btn-danger btn-sm " href="/admin/delete/restaurant/{{ $r->id }}" role="button">Delete</a>
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
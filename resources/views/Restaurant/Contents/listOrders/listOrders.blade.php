 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products List</h1>
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
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Payment</th>
                                            <th>Note</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->uEmail }} </td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->payment_type }}</td>
                                                <td>{{ $order->note }}</td>
                                                <td>{{ $order->created_at }} </td>
                                                <td>                                                        
                                                    <a href="/profile/complate/order/{{ $order->id }}"><button type="button" class="btn btn-success">Tamamla</button></a>
                                                    <a href="/profile/cancel/order/{{ $order->id }}"><button type="button" class="btn btn-danger">İptal</button></a>
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

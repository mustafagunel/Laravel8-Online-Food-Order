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
                                    <th>İmage</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                <img src="/images/products/{{ $product->image }}" style="width:50px;height:50px">
                                            </td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>@if($product->status == 1) Aktif @else Pasif @endif </td>
                                            <td>                                                        
                                                <a href="/profile/update/product/{{ $product->id }}"><button type="button" class="btn btn-warning">Düzenle</button></a>
                                                <a href="/profile/delete/product/{{ $product->id }}"><button type="button" class="btn btn-danger">Sil</button></a>
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
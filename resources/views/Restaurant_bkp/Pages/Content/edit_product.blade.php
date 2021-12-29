 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
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
                            <form class="user" action="/profile/restaurant/update/product" enctype="multipart/form-data" method="POST">
                                @csrf   
                                <div class="form-group d-none">
                                    <input type="text" class="form-control form-control-user" name="id" id="id" value="{{ $product->id }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="title" id="title"
                                        placeholder="Title" value="{{ $product->title }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="keywords" id="keywords"
                                        placeholder="Keywords" value="{{ $product->keywords }}">
                                </div>
                                <!-- detay-->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="description" id="description"
                                        placeholder="Description" value="{{ $product->description }}">
                                </div>
                                <!-- price -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="price" id="price"
                                        placeholder="Price" value="{{ $product->price }}">
                                </div>
                                
                                <!-- price -->
                                <div class="form-group">
                                    <small>0 = Passive | 1 = Active</small>
                                    <input type="text" class="form-control form-control-user" name="status" id="status"
                                         value="{{ $product->status }}">
                                </div>

                                <a>
                                <button class="btn btn-primary btn-user btn-block" type="submit"> Güncelle</button>
                                </a>
                            
                            </form>
                            <hr>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
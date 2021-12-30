 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
</div>

<!-- Content Row -->

<div class="row">
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-4">Order No</div>
                <div class="col-4">{{ $order[0]->orderID }}</div>
            </div>
            <div class="row">
                <div class="col-4">Order Date</div>
                <div class="col-4">{{ $order[0]->created_at }}</div>
            </div>
            <div class="row">
                <div class="col-4">Total Price</div>
                <div class="col-4">{{ $order[0]->orderTotal }} TL</div>
            </div>
            <div class="row">
                <div class="col-4">Note</div>
                <div class="col-4">{{ $order[0]->orderNote }}</div>
            </div>
            <div class="row">
                <div class="col-4">Paymen Type</div>
                <div class="col-4">{{ $order[0]->payment_type }}</div>
            </div>
            <div class="row">
                <div class="col-4">Person</div>
                <div class="col-4">{{ $order[0]->name.' '.$order[0]->surname.'  ('.$order[0]->email.')' }}</div>
            </div>
            <div class="row">
                <div class="col-4">Address</div>
                <div class="col-4">{{ $order[0]->address }}</div>
            </div>
        </div>
<hr>
        <div class="col-12 pt-2">
            <table>  
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                
                        @foreach($order as $o)
                        <tr>       
                            <td> {{ $o->title }} ({{$o->description }})</td>
                            <td> {{ $o->price }}</td>
                            <td> {{ $o->amount }}</td>
                            <td> {{ $o->price*$o->amount }}</td> 
                        </tr>
                        @endforeach
                        
                        <tr>
                        
                            <td></td>
                            <td></td>
                            <td>Toplam: </td>
                            <td>{{ $order[0]->orderTotal }}</td> 
                        </tr>
                </tbody>
            </table>
            <a href="/profile/complate/order/{{ $order[0]->orderID }}"><button type="button" class="btn btn-success">Tamamla</button></a>
            <a href="/profile/cancel/order/{{  $order[0]->orderID }}"><button type="button" class="btn btn-danger">İptal</button></a>
    
        </div>
        

    </div>
</div>
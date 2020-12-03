<x-dashboard-admin>

    @section('content')

    <p class="ph">All Products</p>
    <hr>

    <div class="">

      <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Unit</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Current Stock</th>
                    <th>Image</th>
                    <th>Publication Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($products as $data)

                  <tr>
                      <td>{{$count++}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->description}}</td>
                      <td>{{App\Category::find($data->category_id)->name}}</td>
                      <td>{{$data->unit}}</td>
                      <td>{{$data->regular_price}}</td>
                      <td>{{$data->discount_price}}</td>
                      <td>{{$data->current_stock}}</td>
                      <td> <img style="width: 100%;" src="{{ URL::asset('images/'.$data->image) }}" alt=""></td>
                      <td>{{$data->publication_status	}}</td>
                      <td>{{$data->	created_at}}</td>
                      <td> <a href="{{route('product_edit',['id'=> $data->id])}}">Edit</a> </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>



    </div>


    @endsection

</x-dashboard-admin>

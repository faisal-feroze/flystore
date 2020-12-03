<x-dashboard-admin>

    @section('content')

    <div class="">
      <form id="" action="{{route('product_update',$product->id)}}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PATCH')
       <p class="ph">Update Product</p>
       <hr>
       <div class="row joy">

         <div class="col">
            <label for="">Product Name</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}">
         </div>

          <div class="col">
            <label for="">Product Category</label>
            <select id="" name="category_id" class="form-control">
              <option value="{{$product->category_id}}" selected>{{$product->category_id}}</option>
              @foreach($category as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col">
             <label for="">Product Unit</label>
             <input type="text" class="form-control" name="unit" value="{{$product->unit}}">
          </div>
       </div>

       <div class="row joy">

         <div class="col">
            <label for="">Product Description</label>
            <textarea name="description" class="form-control" rows="8" cols="80">{{$product->description}}</textarea>
         </div>

       </div>


       <div class="row joy">
         <div class="col">
            <label for="">Regular Price</label>
            <input type="number" class="form-control" name="regular_price" value="{{$product->regular_price}}">
         </div>

         <div class="col">
            <label for="">Discount Price</label>
            <input type="number" class="form-control" name="discount_price" value="{{$product->discount_price}}">
         </div>

         <div class="col">
            <label for="">Stock</label>
            <input type="number" class="form-control" name="current_stock" value="{{$product->current_stock}}">
         </div>
       </div>


       <div class="row joy">
         <div class="col">
            <label for="">product Main Image</label>
            <img style="width: 100%;" src="{{ URL::asset('images/'.$product->image) }}" alt="">
            <input type="file" class="form-control" name="image">
         </div>

         <div class="col">
            <label for="">product Image 1</label>
            <img style="width: 100%;" src="{{ URL::asset('images/'.$product->image1) }}" alt="">
            <input type="file" class="form-control" name="image1">
         </div>

         <div class="col">
            <label for="">product Image 2</label>
            <img style="width: 100%;" src="{{ URL::asset('images/'.$product->image2) }}" alt="">
            <input type="file" class="form-control" name="image2">
         </div>

         <div class="col">
            <label for="">product Image 3</label>
            <img style="width: 100%;" src="{{ URL::asset('images/'.$product->image3) }}" alt="">
            <input type="file" class="form-control" name="image3">
         </div>

       </div>


       <div class="row joy">
         <div class="col">
           <label for="">Publication Status</label>
           <select id="" name="publication_status" class="form-control">
             @if($product->publication_status == 1)
                <option value="1" selected>Yes</option>
             @else
                <option value="0" selected>No</option>
             @endif
             <option value="1">Yes</option>
             <option value="0">No</option>
           </select>
         </div>

         <div class="col">
         </div>

         <div class="col">
         </div>

         <div class="col">
         </div>

       </div>

       <button type="submit" class="btn btn-primary">Update Product</button>

      </form>

    </div>


    @endsection

</x-dashboard-admin>

<x-dashboard-admin>

    @section('content')

    <div class="">
      <form id="" action="{{route('product_save')}}" method="POST" enctype="multipart/form-data">
       @csrf
       <p class="ph">Add Product</p>
       <hr>
       <div class="row joy">

         <div class="col">
            <label for="">Product Name</label>
            <input type="text" class="form-control" name="name">
         </div>

          <div class="col">
            <label for="">Product Category</label>
            <select id="" name="category_id" class="form-control">
              <option value=" " selected>- Select -</option>
              @foreach($category as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col">
             <label for="">Product Unit</label>
             <input type="text" class="form-control" name="unit">
          </div>
       </div>

       <div class="row joy">

         <div class="col">
            <label for="">Product Description</label>
            <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
         </div>

       </div>


       <div class="row joy">
         <div class="col">
            <label for="">Regular Price</label>
            <input type="number" class="form-control" name="regular_price">
         </div>

         <div class="col">
            <label for="">Discount Price</label>
            <input type="number" class="form-control" name="discount_price">
         </div>

         <div class="col">
            <label for="">Stock</label>
            <input type="number" class="form-control" name="current_stock">
         </div>
       </div>


       <div class="row joy">
         <div class="col">
            <label for="">product Main Image</label>
            <input type="file" class="form-control" name="image">
         </div>

         <div class="col">
            <label for="">product Image 1</label>
            <input type="file" class="form-control" name="image1">
         </div>

         <div class="col">
            <label for="">product Image 2</label>
            <input type="file" class="form-control" name="image2">
         </div>

         <div class="col">
            <label for="">product Image 3</label>
            <input type="file" class="form-control" name="image3">
         </div>

       </div>


       <div class="row joy">
         <div class="col">
           <label for="">Publication Status</label>
           <select id="" name="publication_status" class="form-control">
             <option value=" " selected>- Select -</option>
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

       <button type="submit" class="btn btn-primary">Add Product</button>

      </form>

    </div>


    @endsection

</x-dashboard-admin>

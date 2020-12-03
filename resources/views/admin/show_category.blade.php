<x-dashboard-admin>

    @section('content')

    <p class="ph">All Category</p>
    <hr>

    <div class="add_category">

      <form  action="{{route('add_category')}}" method="post">
        @csrf

        <div class="row joy">
          <div class="col">
             <label for="">Category Name</label>
             <input type="text" class="form-control" name="name">
          </div>

          <div class="col">
            <label for="">Publication Status</label>
            <select id="" name="publication_status" class="form-control">
              <option value=" " selected>- Select -</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>

        <div class="row joy">

          <div class="col">
             <label for="">Category Description</label>
             <textarea name="description" class="form-control" rows="5" cols="80"></textarea>
          </div>

        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
      </form>

    </div>

    <div class="">

      <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Category</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($category as $data)

                    <tr>
                      <form  action="{{route('category_update',$data->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <td>{{$count++}}</td>
                        <td> <input type="text" class="form-control" name="name" value="{{$data->name}}"></td>
                        <td> <input type="text" class="form-control" name="description" value="{{$data->description}}"></td>
                        <td>
                          <select id="" name="publication_status" class="form-control">
                            @if($data->publication_status == 1)
                               <option value="1" selected>Yes</option>
                            @else
                               <option value="0" selected>No</option>
                            @endif
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                        </td>
                        <td> <input class="btn btn-primary" type="submit" name="" value="Update"></td>
                      </form>
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

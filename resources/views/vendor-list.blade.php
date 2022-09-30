<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<form  method="get">
  <button type="submit" class="btn btn-warning" formaction="/vendor-registration">Add New Vendor</button>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Type</th>
      <th scope="col">Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($vendor as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->address }}</td>
      <td>{{ $item->type }}</td>
      <td>{{ $item->active }}</td>
      <td>
      <a href="{{route('vendor_edit',$item->id)}}" class="btn btn-primary">Edit</a>
      <a href="{{route('vendor_destroy',$item->id)}}" class="btn btn-danger">Delete</a> 
    </tr>
  @endforeach  
  </tbody>
</table>
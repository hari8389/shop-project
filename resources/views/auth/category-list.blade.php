<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<form  method="get">
  <button type="submit" class="btn btn-warning" formaction="/product_category">Add New Category</button>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($category as $item)
    <tr >
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->productname }}</td>
      <td>{{ $item->description }}</td>
      <td>{{ $item->active }}</td>
      <td><a href="{{route('category_edit',$item->id)}}" class="btn btn-primary">Edit</a>
      <a href="{{route('category_destroy',$item->id)}}" class="btn btn-danger">Delete</a> 
</td>
    
    </tr>
  @endforeach  
  </tbody>
</table>
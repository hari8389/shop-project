<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<form  method="get">
  <button type="submit" class="btn btn-warning" formaction="/product_store">Add New Product</button>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
      <th scope="col">Vendor Price</th>
      <th scope="col">Sale Price</th>
      <th scope="col">Description</th>
      <th scope="col">Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($product as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->product_category->productname }}</td>
      <td>{{ $item->product }}</td>
      <td>{{ $item->vendor_price}}</td>
      <td>{{ $item->sale_price }}</td>
      <td>{{ $item->description }}</td>
      <td>{{ $item->active }}</td>
      <td><a href="{{route('product_edit',$item->id)}}" class="btn btn-primary">Edit</a>
      <a href="{{route('product_destroy',$item->id)}}" class="btn btn-danger">Delete</a> 
</td>
    </tr>
  @endforeach  
  </tbody>
</table>
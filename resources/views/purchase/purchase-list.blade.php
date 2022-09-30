<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<form  method="get">
  <button type="submit" class="btn btn-warning" formaction="/vendor_store">Create New Purchase</button>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Category</th>
      <th scope="col">Product</th>
      <th scope="col">User</th>
      <th scope="col">Type</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Amount</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($vendor as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->date }}</td>
      <td>{{ $item->product_category->productname}}</td>
      <td>{{ $item->product->product}}</td>
      <td>{{ $item->user->name}}</td>
      <td>{{ $item->type }}</td>
      <td>{{ $item->quantity }}</td>
      <td>{{ $item->price }}</td>
      <td>{{ $item->amount }}</td>
      <td><a href="{{route('purchase_edit',$item->id)}}" class="btn btn-primary">Edit</a>
      <a href="{{route('purchase_destroy',$item->id)}}" class="btn btn-danger">Delete</a> 
     </td>

    </tr>
  @endforeach  
  </tbody>
</table>
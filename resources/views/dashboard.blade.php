<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<form  method="get">
  
  <button type="submit" class="btn btn-primary" formaction="/customer-registration">Customers</button>
  <button type="submit" class="btn btn-warning" formaction="/vendor-registration">Vendor</button>
  <button type="submit" class="btn btn-success" formaction="/product_store">Products</button>
  <button type="submit" class="btn btn-danger" formaction="/product_category">Category</button>
  <button type="submit" class="btn btn-info" formaction="/sales_store">Sale</button>
  <button type="submit" class="btn btn-dark" formaction="/purchase_store">Purchase</button>
  <button type="submit" class="btn btn-danger" formaction="/report">Report</button>
  
  

</form>


<!-- <button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>  -->

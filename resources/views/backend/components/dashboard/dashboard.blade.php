 @php
     $products = DB::table('products')->get();
 @endphp

 <!-- Page body -->
 <div class="page-body">
     <div class="container-xl">
         <div class="row row-deck row-cards">
             <div class="col-sm-6 col-lg-3">
                 <div class="card">
                     <div class="card-body">
                         <div class="d-flex align-items-center">
                             <div class="subheader">Services</div>
                             <div class="ms-auto lh-1">

                             </div>
                         </div>
                         <div class="h1 mb-3">{{$total_service}}</div>
                     </div>
                 </div>
             </div>
             <div class="col-sm-6 col-lg-3">
                 <div class="card">
                     <div class="card-body">
                         <div class="d-flex align-items-center">
                             <div class="subheader">Revenue</div>
                             <div class="ms-auto lh-1">

                             </div>
                         </div>
                         <div class="d-flex align-items-baseline">
                             <div class="h1 mb-0 me-2"> ৳4,300</div>
                             <div class="me-auto">

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-sm-6 col-lg-3">
                 <div class="card">
                     <div class="card-body">
                         <div class="d-flex align-items-center">
                             <div class="subheader">New clients</div>
                             <div class="ms-auto lh-1">

                             </div>
                         </div>
                         <div class="d-flex align-items-baseline">
                             <div class="h1 mb-3 me-2">6,782</div>
                             <div class="me-auto">

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-sm-6 col-lg-3">
                 <div class="card">
                     <div class="card-body">
                         <div class="d-flex align-items-center">
                             <div class="subheader">Orders</div>
                             <div class="ms-auto lh-1">

                             </div>
                         </div>
                         <div class="d-flex align-items-baseline">
                             <div class="h1 mb-3 me-2">{{$total_order}}</div>
                             <div class="me-auto">

                             </div>
                         </div>




                     </div>
                 </div>


             </div>

             <!-- New Card 12 -->
             <div class="col-sm-12 col-lg-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="d-flex align-items-center">
                             <div class="subheader">Service Information</div>
                         </div>

                         <!-- Table to display product details -->
                         <div class="table-responsive mt-3">
                             <table class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Name</th>
                                         <th>Price</th>
                                         <th>Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($products as $product)
                                         <tr>
                                             <td>{{ $loop->iteration }}</td>
                                             <td>{{ $product->name }}</td>
                                             <td>{{ $product->price }} $</td>
                                             <td>
                                                 <!-- Edit Button -->
                                                 <a href="{{ route('product.edit', $product->id) }}"
                                                     class="btn btn-warning btn-sm">Edit</a>

                                                 <!-- Delete Button -->
                                                 <form action="{{ route('product.destroy', $product->id) }}"
                                                     method="POST" style="display:inline;">
                                                     @csrf
                                                     @method('DELETE')
                                                     <button type="submit"
                                                         class="btn btn-danger btn-sm">Delete</button>
                                                 </form>
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>

                     </div>
                 </div>
             </div>




         </div>

     </div>

 </div>

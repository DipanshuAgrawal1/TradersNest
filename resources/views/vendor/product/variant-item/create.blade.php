@extends('vendor.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || Shop Profile
@endsection --}}

@section('content')
    <!--=============================
        DASHBOARD START
      ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                  <a href="{{ route('vendor.products-variant-item.index', ['productId' => $product->id, 'variantId' => $variant->id]) }}" class="btn btn-warning mb-4"><i class="fas fa-long-arrow-left"></i> Back</a>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Create Variant Item</h3>
                        <div class="create_button">
                            
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                              <form method="POST" action="{{route('vendor.products-variant-item.store')}}">
                                @csrf
                        
                                <div class="form-group wsus__input">
                                  <label>Variant Name</label>
                                  <input type="text" class="form-control" name="variant_name" value="{{$variant->name}}" readonly>
                                </div>
                                
                                <div class="form-group wsus__input">
                                  <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                                </div>
                                <div class="form-group wsus__input">
                                  <input type="hidden" class="form-control" name="variant_id" value="{{$variant->id}}">
                                </div>
    
                                <div class="form-group wsus__input">
                                  <label>Item Name</label>
                                  <input type="text" class="form-control" name="name" value="">
                                </div>
    
                                <div class="form-group wsus__input">
                                  <label>Price <code>(Set 0 to make it free)</code></label>
                                  <input type="text" class="form-control" name="price" value="">
                                </div>
    
                                <div class="form-group wsus__input">
                                  <label for="inputState">is Default</label>
                                  <select id="inputState" class="form-control" name="is_default">
                                      <option value="">Select</option>
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                  </select>
                              </div>
    
                                <div class="form-group wsus__input">
                                  <label for="inputState">State</label>
                                  <select id="inputState" class="form-control" name="status">
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                  </select>
                              </div>
    
                              <button type='submit' class="btn btn-primary">
                                Create
                              </button>
    
                              </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        DASHBOARD START
      ==============================-->
@endsection


@push('scripts')

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id')

                $.ajax({
                    url: "{{ route('vendor.product.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)


                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })

            })
        })
    </script>
@endpush

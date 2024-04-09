@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Item</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Variant Item</h4>
                            <div class="card-header-action">

                            </div>
                        </div>
                        <div class="card-body">
                          <form method="POST" action="{{route('admin.products-variant-item.update', $variantItem->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label>Variant Name</label>
                              <input type="text" class="form-control" name="variant_name" value="{{$variantItem->productVariant->name}}" readonly>
                            </div>                           
                           

                            <div class="form-group">
                              <label>Item Name</label>
                              <input type="text" class="form-control" name="name" value="{{$variantItem->name}}">
                            </div>

                            <div class="form-group">
                              <label>Price <code>(Set 0 to make it free)</code></label>
                              <input type="text" class="form-control" name="price" value="{{$variantItem->price}}">
                            </div>

                            <div class="form-group">
                              <label for="inputState">is Default</label>
                              <select id="inputState" class="form-control" name="is_default">
                                  <option {{$variantItem->is_default == 1 ? 'selected' : 0}} value="1">Yes</option>
                                  <option {{$variantItem->is_default == 0 ? 'selected' : 0}} value="0">No</option>
                              </select>
                          </div>

                            <div class="form-group">
                              <label for="inputState">State</label>
                              <select id="inputState" class="form-control" name="status">
                                  <option {{$variantItem->status == 1 ? 'selected' : 0}} value="1">Active</option>
                                  <option {{$variantItem->status == 0 ? 'selected' : 0}} value="0">Inactive</option>
                              </select>
                          </div>

                          <button type='submit' class="btn btn-primary">
                            Submit
                          </button>

                          </form>
                          </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection



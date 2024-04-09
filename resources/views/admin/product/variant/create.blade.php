@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Variant</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product Variant</h4>
                            <div class="card-header-action">

                            </div>
                        </div>
                        <div class="card-body">
                          <form method="POST" action="{{route('admin.products-variant.store')}}">
                            @csrf
                    
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" value={{old('name')}}>
                            </div>

                            <div class="form-group">
                              <input type="hidden" class="form-control" name="product" value={{request()->product}}>
                            </div>

                            <div class="form-group">
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
    </section>
@endsection



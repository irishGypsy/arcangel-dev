    <div class="tile">
        <h3 class="tile-title">{{ $subTitle }}</h3>
        <form action="{{ route('admin.productpackages.update') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="tile-body">
                <div class="form-group">
                    <label class="control-label" for="product_id"> {{ $product->name }}</label><br>
                </div>

                <div class="form-group">
                    <label class="control-label"> Available Packages: </label><br>
                    @foreach($packages as $k)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="pkg{{ $k->id }}" id="pkg{{ $k->id }}">
                            <label class="form-check-label" for="pkg{{ $k->id }}">
                                {{ $k->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="tile-footer">
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Packages</button>
                        <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>


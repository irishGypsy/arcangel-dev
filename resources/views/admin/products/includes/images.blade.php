    <div class="tile">
        <h3 class="tile-title">Upload Image</h3>
        <hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-primary" type="button" id="uploadButton">
                        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                    </button>
                </div>
            </div>
            @if ($product->images)
                <hr>
                <div class="row">
                    @foreach($product->images as $image)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('storage/'.$image->image) }}" id="brandLogo" class="img-fluid" alt="img">
                                    <a class="card-link float-right text-danger" href="{{ route('admin.products.images.delete', $image->id) }}">
                                        <i class="fa fa-fw fa-lg fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>




<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title profile-title p-2">My Wishlist</h3>
            <hr>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center"> Image </th>
                        <th class="text-center"> Name </th>
                        <th class="text-center"> Price </th>
                        <th style="width:100px; min-width:100px;" class="text-center"><i class="fa fa-bolt"> </i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlist as $w)
                        <tr class="text-center">
{{--                        show the first product image in the index table--}}
                            <td><img src="{{ asset('storage/'.$w->image ) }}" id="productImage" class="img-fluid" alt="img" width="100px"></td>
                            <td>{{ $w->name }}</td>
                            <td>${{ number_format($w->price,2,'.',',') }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Second group">
                                    <a href="{{ route('site.wishlists.delete', $w->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

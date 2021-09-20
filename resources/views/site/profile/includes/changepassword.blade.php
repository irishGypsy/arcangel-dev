

<div class="tile">
    <form action="{{ route('site.profile.updateprofile') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title profile-title p-2">Change Password</h3>
        <hr>
        <div class="tile-body">

            <div class="row">

                <div class="col-md-8">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label" for="">Current Password</label>
                            <input class="form-control @error('') is-invalid @enderror" type="password" placeholder="Enter password" id="" name="" />
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">New Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Enter new password" id="password" name="password" />
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Confirm New Password</label>
                            <input class="form-control @error('') is-invalid @enderror" type="password" placeholder="Confirm new password" id="" name="" />
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Profile</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
</div>

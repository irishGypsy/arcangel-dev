

<section class="section-pagetop" style="background-color: white;">
    <div class="card profile-card col-md-12 m-0 px-0">
        <div style="background-color: #e8a038">
            <h3 class="tile-title profile-title p-2">Affilliate Program</h3>
        </div>
    </div>
    @if(Auth::guard()->user()->is_affiliate)
        <div class="card col-md-12">
            <p class="pt-4"><i>
Starting earning commissions right away with the Arc-Angel Battery Affiliate program.  Simply click on the 'Affiliate Links' tab to the left to see your personalized URL's for each of our products.  Anyone who orders and purchases a battery through that link will earn you commission. You can use these links on your website, store or social media right away.
                </i></p>
        </div>
    @else
    <div class="card col-md-12">
        <p class="pt-4"><i>
            Joining the Arc-Angel Battery Affiliate program can earn you commission on our battery sales for each battery sold on your sites or posts, or even social media.  Sign up is as simple as clicking the button below and you can start earning money spreading the news of our amazing batteries and their benefits.
            </i></p>
    </div>
    <div class="tile-footer">
        <div class="row d-print-none mt-2">
            <div class="col-12 text-right">
                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Profile</button>
            </div>
        </div>
    </div>
    @endif



</section>

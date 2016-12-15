
@if(App\Settings::getParam('banner_on') == '1')

    <section id="closed" style="background-color:#9cb8e2; border-top: 1px solid #147ae0; border-bottom: 1px solid #147ae0;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="padding-top:14px; padding-bottom:8px;">
                    <h3 style="color:white; margin-top:5px; font-weight: 400;"><span style="color:red">* * *</span> {{ App\Settings::getParam('banner_text') }} <span style="color:red">* * *</span></h3>
                </div>
            </div>
        </div>
    </section>

@endif
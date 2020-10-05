<div class="bg-white rounded-top shadow-sm mb-3">

    <div class="row no-gutters">
        <div class="col col-lg-7 mt-6 p-4 pr-md-0">

            <h2 class="mt-2 text-dark font-weight-light">
                Yönetim Paneline hoş geldiniz.
            </h2>

        </div>
        <div class="d-none d-lg-block col align-self-center text-right text-muted p-4">
            <x-orchid-icon path="orchid" width="8em" height="auto"/>
        </div>
    </div>

    <div class="row bg-light m-0 p-4 border-top rounded-bottom">

        <div class="col-md-6 my-2">
            <h3 class="text-muted font-weight-light">
                <x-orchid-icon path="book-open"/>

            <span class="ml-3 text-dark"><a href='{{ url('admin/products') }}'>Ürün Katalog</a></span>
            </h3>
        </div>

        <div class="col-md-6 my-2">
            <h3 class="text-muted font-weight-light">
                <x-orchid-icon path="rocket"/>

                <span class="ml-3 text-dark"><a href='{{ url('admin/stats') }}'>Kullanıcı Takip</a></span>
            </h3>
        </div>

    
    </div>

</div>


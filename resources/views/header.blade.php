<style>

.middle-inner{
    padding-top:100px;
}

.search-top{
    display: flex;
}

.search-wrapper{
    margin-left: auto;
    margin-right: 50px;
padding: 10px;

}

.btnn{
    width: 50px;
}


</style>


<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="/images/logo.png" alt="logo"></a>
                </div>
               
                </div>
            
            
            <div class="col-lg-2 col-md-2 col-12 search-wrapper">
                
                <div class="search-top">
                    <!-- Search Form -->
                    
                        <form style='display: flex;' action='/'>
                            <input name="search" value='{{ app('request')->input('search') }}' placeholder="Ürün Ara..." type="search">
                            <button class="btnn"><i class="ti-search"></i></button>
                        </form>

                    <!--/ End Search Form -->
                </div>
            </div>
                
           
        </div>
    </div>
</div>
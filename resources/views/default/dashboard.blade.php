@push('block.content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: #00c0ef!important;">
                    <i class="fas fa-address-book text-white"></i>
                </span>  
                <div class="info-box-content">
                    <span class="info-box-text">Загружено аудио</span> 
                    <span class="info-box-number">{{ $audio }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: #dd4b39!important;"> 
                    <i class="fas fa-map-pin text-white"></i>
                </span> 
                <div class="info-box-content">
                    <span class="info-box-text">Загружено видео<br></span> 
                    <span class="info-box-number">{{ $video }}</span>
                </div>
            </div>
        </div> 
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: #00c0ef!important;">
                    <i class="fas fa-address-book text-white"></i>
                </span>  
                <div class="info-box-content">
                    <span class="info-box-text">Загружено печатных материала</span> 
                    <span class="info-box-number">{{ $printed_production }}</span>
                </div>
            </div>
        </div> 
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: #dd4b39!important;"> 
                    <i class="fas fa-map-pin text-white"></i>
                </span> 
                <div class="info-box-content">
                    <span class="info-box-text">Статей о музее<br></span> 
                    <span class="info-box-number">{{ $museum }}</span>
                </div>
            </div>
        </div> 
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: #00c0ef!important;">
                    <i class="fas fa-address-book text-white"></i>
                </span>  
                <div class="info-box-content">
                    <span class="info-box-text">Статей о нас</span> 
                    <span class="info-box-number">{{ $about}}</span>
                </div>
            </div>
        </div> 
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: #dd4b39!important;"> 
                    <i class="fas fa-map-pin text-white"></i>
                </span> 
                <div class="info-box-content">
                    <span class="info-box-text">Размещено новостей<br></span> 
                    <span class="info-box-number">{{ $post }}</span>
                </div>
            </div> 
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: #dd4b39!important;"> 
                    <i class="fas fa-map-pin text-white"></i>
                </span> 
                <div class="info-box-content">
                    <span class="info-box-text">Размещено объектов<br></span> 
                    <span class="info-box-number">{{ $place }}</span>
                </div>
            </div> 
        </div>
    </div>
</div>


@endpush
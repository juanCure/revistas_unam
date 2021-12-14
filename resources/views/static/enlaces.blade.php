@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Enlaces<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Enlaces</h2>
                    </div>
                    <div class="col-12 article_col">
                        <div class="row d-sm-flex justify-content-sm-center" id="enlaces_row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="100" data-aos-once="true"><a href="http://openaccess.mpg.de/2365/en" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/open_access.png') }}"></a></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="200" data-aos-once="true"><a href="https://doaj.org/" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/direct_OP_Journals.png') }}"></a></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="300" data-aos-once="true"><a href="http://www.budapestopenaccessinitiative.org/" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/budapest_OA.png') }}"></a></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="400" data-aos-once="true"><a href="http://blog.conricyt.mx/" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/conricyt.png') }}"></a></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="500" data-aos-once="true"><a href="http://www.crossref.org/" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/cross_ref.png') }}"></a></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="600" data-aos-once="true"><a href="http://miar.ub.edu/es/" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/miar.png') }}"></a></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="700" data-aos-once="true"><a href="http://www.authoraid.info/es/" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/authoraid.png') }}"></a></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="800" data-aos-once="true"><a href="http://portaldeleditor.conricyt.mx/" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/portal_editor.png') }}"></a></div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-6 d-flex justify-content-center align-items-center" data-aos="fade" data-aos-delay="900" data-aos-once="true"><a href="https://www.youtube.com/c/SeminarioPermanentedeEditores" target="_blank"><img class="img-fluid" data-bss-hover-animate="pulse" src="{{ asset('img/enlaces/Logo_rederaa_youtube.png') }}"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
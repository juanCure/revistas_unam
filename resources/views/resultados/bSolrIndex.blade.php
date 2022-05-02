<div class="row" id="results_cards">
	<!-- Here starts the first column which contains the filters -->
	<div class="col-lg-3 order-2 order-lg-1 cards_col">
		<div class="card" id="card_filters">
            <h4 class="d-xl-flex align-items-xl-center card-title"><span>Filtros de búsqueda</span></h4>
            <div class="card-body card_body_filters">
            	<section></section>
                <section id="all_dates" style="margin: 0;">
                    <h6>Año:</h6>
                    <section id="first_dates">
                    	<div class="row">
                    		@foreach($publishDateArray as $item)
                    			<div class="col-6 d-flex date_col">
                                	<div class="custom-control custom-switch">
									  <input class="custom-control-input" type="checkbox" id="formCheck-{{ $item['checkbox_id'] }}" name="pub_date" value="{{ $item['checkbox_id'] }}" onchange="doSomething(this)" {{ $item['is_checked'] ? 'checked' : '' }}>
									  <label class="custom-control-label" for="formCheck-{{ $item['checkbox_id'] }}">
									    {{ $item['checkbox_id'] }}
									    <span class="filter_results">{{ $item['count'] }}</span>
									  </label>
									  {{-- <label>({{ $item['count'] }})</label> --}}
									</div>
                                </div>
							@endforeach
                        </div>
                    </section>
                </section>
            </div><!-- Here ends the year filter -->

            <div class="card-body card_body_filters" id="card_body_journals">
                <section></section>
                <section id="all_journals" style="margin: 0;">
                    <h6>Revistas</h6>
                    <section id="first_journals">
                        <div class="row">
                        	@foreach ($journalsArray as $item)
								<div class="col-12 d-flex date_col">
									<div class="custom-control custom-switch">
										<input class="custom-control-input" type="checkbox" id="formCheck-{{ $item['checkbox_id'] }}" name="journals" value="{{ $item['checkbox_id'] }}" onchange="doSomething(this)" {{ $item['is_checked'] ? 'checked' : '' }}>
										<label class="custom-control-label" for="formCheck-{{ $item['checkbox_id'] }}">{{ $item['checkbox_id'] }}<span class="filter_results">{{ $item['count'] }}</span></label>
									</div>
								</div>
							@endforeach
                        </div>
                    </section>
                </section>
            </div> <!-- Here ends the journals filter-->
        </div>
	</div> <!-- Here ends the first column -->

	<!-- Here starts the second column which has the results and the breadcrumb navigation -->
	<div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('inicio')}}"><span>Inicio</span></a></li>
            <li class="breadcrumb-item"><a href="#"><span>Resultados de la busqueda:</span><span id="results_article_breadcrumb">{{$searchTerm}}</span></a></li>
        </ol>
        <div class="col-12">
		    <div class="row" id="results_report_col">
		        <div class="col d-flex d-xl-flex justify-content-center justify-content-sm-start justify-content-md-start align-items-xl-center"><span class="d-sm-flex align-items-sm-end align-items-md-end" id="results_counter">
		        	Mostrando {{ $mypaginator->firstItem() }} a {{ $mypaginator->lastItem() }} de {{ $numFound }} artículos</div>
		        <div class="col d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end">
		            {{-- Carga los enlaces de paginación --}}
					{{ $mypaginator->links() }}
		        </div>
		    </div>
		</div>
		<br>
        <div class="row page_row">
			@foreach($resultset as $document)
				<div class="col-12 page_col">
					<a class="journal_title" href="#">{{ $document['collection'] }}</a>
					<div class="row no-gutters article_data_row">
						<div class="col-11 data-col">
							<div class="row no-gutters">
								<div class="col-12 article_data">
									<div class="row">
										<div class="col-4 col-sm-3 col-md-2 col-xl-2">
											<div class="data_container"><span class="data_label">Año</span><span class="data_value">{{ (isset($document['publishDate'])) ? $document['publishDate'] : '' }}</span></div>
										</div>
										<div class="col-8 col-sm-9 col-md-10">
											<div class="data_container"><span class="data_label">ISSN</span>
												<span class="data_value">
												@if (isset($document['myownissn']))
													{{ $document['myownissn'] }}
												@else
													N/A
												@endif
												</span>
											</div>
										</div>
									</div>
									<a target="_blank" class="article_link" href="{{ $document['url'] }}">{{ $document['title'] }}</a>
									<p class="article_authors">{{ $document['author'] }}</p>
									<div class="data_container">
										@if ( isset($document['doi_txt']) && $document['doi_txt'] != null)
											<span class="data_label">DOI</span><a class="text-break doi_link" target="_blank" href="https://doi.org/{{ $document['doi_txt'] }}">https://doi.org/{{ $document['doi_txt'] }}</a>
										@endif
									</div>
									@if (isset($document['pclave_txt_mv']) && $document['pclave_txt_mv'] != '')
										<div class="data_container">
											<span class="data_label">Palabras Clave</span>
											<div class="keywor_caontainer">
												<p>{{ $document['pclave_txt_mv'] }}</p>
											</div>
										</div>
									@endif
									{{-- <div class="data_container">
										<span class="data_label">Palabras Clave</span>
										<div class="keyword_caontainer">
											<a class="text-break keyword_link" href="#" target="_blank">políticas públicas</a>
											<a class="text-break keyword_link" href="#" target="_blank">representaciones sociales</a>
											<a class="text-break keyword_link" href="#" target="_blank">habitar</a>
											<a class="text-break keyword_link" href="#" target="_blank">movilidades urbanas</a>
											<a class="text-break keyword_link" href="#" target="_blank">pandemia</a>
											<a class="text-break keyword_link" href="#" target="_blank">covid</a>
										</div>
									</div> --}}
									@if (isset($document['description']) && $document['description'] != "")
										<div class="data_container"><a class="link_description" href="#description_container" data-toggle="collapse"><span class="data_label label_description">Descripción<i class="fa fa-plus-circle"></i></span></a>
											<div id="description_container" class="card card-body collapse description_container">
												<div>
													<p>{{ $document['description'] }}</p>
												</div>
											</div>
										</div>
									@endif

								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="col-12">
		    <div class="row">
		        <div class="col d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end">
		            {{-- Carga los enlaces de paginación --}}
					{{ $mypaginator->links() }}
		        </div>
		    </div>
		</div>
	</div> <!-- Here ends the second column -->
</div>
@push('styles_for_articles')
<link rel="stylesheet" href="{{ asset('css/article_view.css') }}">
@endpush
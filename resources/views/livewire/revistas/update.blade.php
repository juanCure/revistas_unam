<div class="container">
    <div class="row">
        <h1>Editando revistas</h1>
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                    <p>Paso 1</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                    <p>Paso 2</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">3</a>
                    <p>Paso 3</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}">4</a>
                    <p>Paso 4</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-5" type="button" class="btn btn-circle {{ $currentStep != 5 ? 'btn-default' : 'btn-primary' }}">5</a>
                    <p>Paso 5</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-6" type="button" class="btn btn-circle {{ $currentStep != 6 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">6</a>
                    <p>Resumen</p>
                </div>
            </div>
        </div>
        {{-- Paso 1 Metadatos principales de la revista --}}

        @include('livewire.revistas.step1')

        {{-- Paso 2 Asociar los responsables de la revista --}}

        @include('livewire.revistas.step2')

        {{-- Paso 3 Asociar las editoriales y entidades editoras --}}

        @include('livewire.revistas.step3')

        {{-- Paso 4 Asociar idiomas y temas --}}

        @include('livewire.revistas.step4')

        {{-- Paso 5 Asociar los sistemas indexadores --}}

        @include('livewire.revistas.step5')

        {{-- Paso 6 Resumen de la revista antes de ser guardada --}}

        @include('livewire.revistas.resume')
    </div>
</div>

<script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>
{{--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}
<script type="text/javascript">
    tinymce.init({
        selector: '#descripcion',
        height: (window.innerHeight - 300),
        menubar: false,
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('descripcion', editor.getContent());
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | code | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css',
    });

    tinymce.init({
        selector: '#indicador',
        height: (window.innerHeight - 300),
        menubar: false,
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                //console.log("Estoy en init change");
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('indicador', editor.getContent());
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | code | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css',
    });
</script>
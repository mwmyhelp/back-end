@extends('beeapp.layout.principal')
@push('js')
    <script>
        $(document).ready(function () {

            CKEDITOR.replace( 'editor_01',{
                extraPlugins: 'easyimage,embed',
                removePlugins: 'image',
                toolbarGroups : [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    '/',
                    { name: 'forms', groups: [ 'forms' ] },
                    '/',
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],
                removeButtons : 'Source,ExportPdf,Templates,Scayt,Form,Radio,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,ShowBlocks,About,Maximize',
                embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
            } );



            $('#aplicar_geral').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#lista_departamentos input').prop('checked', false);
                }
            });

        });
    </script>
@endpush


@section('conteudo')

    <div class="nav-tarefas">
        <div class="page-inner pt-0 pb-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center pt-3 pb-2">
                    <i class="fab fa-users-cog mr-2"></i>
                    Procedimentos
                </div>
                <div class="col-md-8 navegador d-flex">
                    <li class="pr-3 pl-3 d-flex align-items-center">
                        <a href="#" class="font-weight-light">
                            <i class="fal fa-list mr-2"></i> Listagem
                        </a>
                    </li>
                    <li class="pr-3 pl-3 d-flex align-items-center ml-3 ativo">
                        <a href="#" class="font-weight-light">
                            <i class="fal fa-pencil mr-2"></i> Editar Procedimento
                        </a>
                    </li>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner pt-0">

            <form class="row" action="{{route('ceo.procedimentos.salvar',['id_procedimento' => $procedimento->id])}}" method="post">
                @csrf
                <div class="col-md-2 pt-3">

                    <div class="text-muted mt-3">
                        <h4 class="font-weight-light">
                            Configurações:
                        </h4>
                        <div class="form-group">
                            <b>Geral:</b>
                            <br/>
                            <input @if($procedimento->geral) checked @endif id="aplicar_geral" name="aplicar_geral" type="checkbox" value="true">
                            Aplicar essa procedimento a todos os colaboradores.
                        </div>
                        <hr/>
                        <div class="form-group">
                            <b>Aplicar essa procedimento para os seguintes departamentos:</b>

                            <div class="border mt-2 p-2">
                                @foreach($departamentos as $departamento)

                                    <div class="mb-3" id="lista_departamentos">
                                        @if($departamento->filhos)
                                            <input onchange="$('#aplicar_geral').prop('checked',false);" type="checkbox"
                                                   name="departamentos[]" value="{{$departamento->id}}"/>
                                            <b>{{$departamento->nome}}</b>
                                            <br/>
                                            @foreach($departamento->filhos as $filho)
                                                <div class="ml-2">
                                                    <input onchange="$('#aplicar_geral').prop('checked',false);"
                                                           type="checkbox" name="departamentos[]"
                                                           value="{{$filho->id}}"
                                                            @if(in_array($filho->id,$lista_departamentos)) checked @endif
                                                    />
                                                    {{$filho->nome}}
                                                </div>
                                            @endforeach
                                        @else
                                            <input onchange="$('#aplicar_geral').prop('checked',false);" type="checkbox"
                                                   name="departamentos[]" value="{{$departamento->id}}"
                                                   @if(in_array($departamento->id,$lista_departamentos)) checked @endif
                                            />
                                            {{$departamento->nome}}
                                        @endif
                                    </div>

                                @endforeach
                            </div>

                        </div>
                    </div>


                </div>
                <div class="col-md-10">
                    <div class="painel-tarefas p-3 ">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="p-2">

                                    <div class="row">
                                        <h3 class="font-weight-light">
                                            PO.{{str_pad($procedimento->cod,3,"0",STR_PAD_LEFT)}}
                                        </h3>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <label>Título do Procedimento:</label>
                                            <input value="{{$procedimento->titulo}}" type="text" name="titulo" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-10">
                                            <label>Descrição do Procedimento:</label>
                                            <textarea rows="10" name="html" id="editor_01" class="form-control"
                                                      required>{!! $procedimento->html !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-10 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                Salvar Procedimento
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </form>

    </div>
@endsection


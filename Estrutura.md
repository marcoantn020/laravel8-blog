## if / if-else / if-elseif-else

    ______________if____________________
    @if(condicao)
        bloco a ser executado
    @endif
    ______________if-else____________________
    @if(condicao)
        bloco a ser executado
    @else
        bloco a ser executado
    @endif
    ______________if-elseif-else____________________
    @if(condicao)
        bloco a ser executado
    @elseif
        bloco a ser executado
    @else
        bloco a ser executado
    @endif
    ________________________________________

## dar print em uma variavel
    
    <p> {{$nome}} </p>
    ________________________________________

## for / foreach
    ___________for________________________________
    @for($i = 0,$iMax = count($arr); $i < $iMax; $i++)
        bloco a ser executado
    @endfor
    ___________foreach_____________________________
    @foreach($nomes as $nome)
        bloco a ser executado
    @endforeach
    OBS: o foreach tem uma variavel especial chamado $loop, 
    para mais detalhes (https://laravel.com/docs/8.x/blade#loops)
    ________________________________________

## adicionar codigo PHP

     @php
        bloco de codigo
    @endphp
    ________________________________________

## comentario do blade [nao é rederizado pelo navegado e nem pelo php]
    
    {{-- cometario do blade --}}
    ___________________________________________

## parametro opcional / parametro obrigatorio
    
    _________parametro opcional_______________________
    Route::get('/produtos_teste/{id?}', function ($id = null) {
    return view('product', ['id' => $id]);
    });
    _________parametro obrigatorio_______________________
    Route::get('/produtos_teste/{id}', function ($id) {
    return view('product', ['id' => $id]);
    });
    ___________________________________________

## parametro por query string
    
    __________parametro por query string______________
    Route::get('/produtos', function () {
    $search = request('search');
    return view('products', ['busca' => $search]);
    })
    ___________________________________________

## flash messages
    diretiva session na pagina que vai receber a flash messages
    ___________________________________________
        with('nome', 'mensagem')
    ___________________________________________
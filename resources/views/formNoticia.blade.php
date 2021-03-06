@extends('templateGeral')
@section('conteudo')

<h1>Cadastro de Notícia</h1>

@if(count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="{{action('NoticiaController@adicionaNoticia')}}" method="post">

	<input type="hidden" name="_token" value="{{{csrf_token()}}}">

	<div class="form-group">
		<label>Título</label>
		<input class="form-control" type="text" name="titulo" value="{{old('titulo')}}"/>
	</div>
	<div class="form-group">
		<label>Conteúdo</label>
		<textarea class="form-control" rows="15" name="conteudo">{{old('conteudo')}}</textarea>
	</div>
	<div class="form-group">
		<label>Categoria</label>
		<select class="form-control" name="categoria_id">
			<option value="">Selecione</option>
			@foreach ($categorias as $categoria)
			<option value="{{$categoria->id}}" @if (old('categoria_id') == $categoria->id) selected="selected" 
			@endif
			>
			{{$categoria->descricao}}
			</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Autor</label>
		<select class="form-control" name="autor_id">
			<option value="">Selecione</option>
			@foreach ($autores as $autor)
			<option value="{{$autor->id}}" @if (old('autor_id') == $autor->id) selected="selected" 
			@endif
			>
			{{$autor->nome}}
			</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Palavras-Chave</label>
		<input class="form-control" type="text" name="palavras_chave" value="{{old('palavras_chave')}}" />
	</div>

	<button type="submit" class="btn btn-primary">Salvar</button>
</form>

@endsection
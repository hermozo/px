@extends('layouts.website')
@section('title', 'Biblioteca virtual')
@section('content')

<br/>
<br/>

<h1 class="text-center">Biblioteca virtual</h1>
<div class="container">
    <?= $virtual[0]->texto; ?>
</div>


@endsection


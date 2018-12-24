@extends('layouts.website', [])
@section('title', 'Noticias')
@section('content')
<?php
use Illuminate\Support\Facades\View;
?>
<!-- <link href="{{ asset('css/page.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/page.css') }}" rel="stylesheet">
<section id="content_page">
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    		<h3>Casoso Destacados</h3>
    		<div id="content_nt" class="row">
    		<?= View::make('website.ntlist',['datos' => $datos])->render() ?>
    		</div>
    		</div>
    	</div>
    </div>
</section>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal_view">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">.</h4>
			</div>
			<div class="modal-body" id="content_modal">
				
			</div>
		</div>
	</div>
</div>
@endsection
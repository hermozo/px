
@extends('layouts.website')
@section('title', 'Resultados')
@section('content')
<br/>
<br/>
<br/>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p style="margin-left: 15px; color: #999999">Cerca de <?= count($datax); ?> resultados.</p>
                <legend></legend>
                <?php foreach ($datax as $dats) { ?>
                    <?php
                    switch ($dats['tipo']) {
                        case(1):
                            $url = URL::to('/') . $dats['url'];
                            break;
                        case(2):
                            $url = URL::to('/detail/') . '/' . $dats['url'];
                            break;
                        case(3):
                            $url = '';
                            break;
                    }
                    ?>
                    <p> <b><a href="<?= $url; ?>" class="btn btn-link" style="font-size: 20px;"> <?= $dats['titulo']; ?> </a> </b></p>
                    <p style="margin-left: 15px; color: #999999;"><?= substr($dats['texto'], 0, 300); ?>...</p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<br/>
<br/>
<br/>
<br/>
<br/>

@endsection
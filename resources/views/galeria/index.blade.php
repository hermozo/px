@foreach ($data as $d)
<?=
'<div class="img-thumbnail seleccionarImg" src="' . URL::to('images/' . $d->nombre) . '">'
 . '<img src="' . URL::to('images/' . $d->nombre) . '"  style="height:100px" title="' . $d->texto . '">'
 . '<p class="text-center" style="font-size:8px">' . $d->texto . '<p>'
 . '</div>';
?>
@endforeach

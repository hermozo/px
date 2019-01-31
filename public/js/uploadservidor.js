var Uploadservidor = /** @class */ (function () {
    function Uploadservidor() {
        var _this = this;
        $('#uploadGaleryFiles').change(function () {
            _this.imagenes = [];
            _this.iterador = 0;
            _this.subidos = '';
            _this.negados = '';
            for (var i = 0; i < this.files.length; i++) {
                if (this.files[i].size <= parseInt($("#TAMANIO").attr('name'))) {
                    _this.imagenes.push(this.files[i]);
                }
                else {
                    _this.negados += '<li class="list-group-item list-group-item-danger">' + this.files[i].name + '</li>';
                }
            }
            $("#estadosubir").html(this.negados);
            _this.listado();
        });
        $("#sortable").sortable({
            placeholder: 'placeholder',
            update: function (event, ui) {
                var dato = $('#sortable').sortable('serialize');
                fetch($('#ordenafotos').attr('name'), {
                    method: 'POST',
                    body: $.param({ info: dato, _token: $("input[name='_token']").val() }),
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).then(function (res) {
                    return res.json();
                }).then(function (response) {
                    console.log(response);
                }).catch(function (error) {
                    console.log(error);
                    $.notify("No se encuentra la RED!", "error");
                });
            }
        });
        $("#sortable").disableSelection();
        $(".eliminar-galery-img").click(function () {
            _this.actionDelete($(this).data('id'));
        });
    }
    Uploadservidor.prototype.actionDelete = function (id) {
        var url = $('#ordenafotos').attr('name') + '/' + id;
        console.log(url);
        var data = {
            id: id,
            _token: $("input[name='_token']").val()
        };
        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            $.notify("!Error al eliminar", "error");
            console.error(error);
        }).then(function (response) {
            $.notify('Eliminado correctamente.', "success");
            if (response == 1) {
                $("#item-" + id).hide('slow');
            }
        });
    };
    Uploadservidor.prototype.listado = function () {
        if (this.imagenes.length == this.iterador) {
            location.reload();
        }
        else {
            this.actionUpload(this.imagenes[this.iterador]);
            this.subidos += '<li class="list-group-item list-group-item-success">' + this.imagenes[this.iterador].name + '</li>';
            $("#estadosubir").html(this.subidos);
        }
    };
    Uploadservidor.prototype.actionUpload = function (img) {
        var _this = this;
        var file_data = img;
        var form_data = new FormData();
        form_data.append("_token", $('[name=_token]').val());
        form_data.append('file', file_data);
        form_data.append('tipo', 'galery');
        form_data.append('idp', $("#idGaleryre").attr('name'));
        $.ajax({
            url: $("#uploadtugare").attr('name'),
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
        }).done(function (data, textStatus, jqXHR) {
            _this.iterador++;
        }).fail(function (jqXHR, textStatus, errorThrown) {
            _this.iterador++;
        }).always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
            _this.listado();
        });
    };
    return Uploadservidor;
}());

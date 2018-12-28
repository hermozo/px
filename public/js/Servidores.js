var Servidores = /** @class */ (function () {
    function Servidores() {
        var _this = this;
        this.data = [];
        this.id = 0;
        this.url = $("#urlPath").attr("name");
        $("#servidores-btn-crear").click(function () {
            $("#servidordelainstitucion").modal("show");
        });
        $("#btn-regisrtar-servidores").click(function () {
            _this.actionCreate();
        });
        /*******Upload*****/
        $('#servidor-foto-upload').change(function () {
            var imagenes = [];
            var iterador = 0;
            for (var i = 0; i < this.files.length; i++) {
                console.log(this.files[i].name);
                console.log($('[name=_token]').val());
                var file_data = this.files[i];
                var form_data = new FormData();
                form_data.append("_token", $('[name=_token]').val());
                form_data.append('file', file_data);
                form_data.append('tipo', '1');
                $.ajax({
                    url: $('#imgUploadServidores').attr('name'),
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                }).done(function (data, textStatus, jqXHR) {
                    var arc = JSON.parse(data);
                    console.log(arc.archivo);
                    $("#servidor-foto").val(arc.archivo);
                    $("#imgUploadChangeservidor").attr('src', $("#referenciaImagen").attr('name') + '/' + arc.archivo);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }).always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
                    console.log(textStatus);
                });
            }
        });
    }
    Servidores.prototype.loadData = function () {
        this.data = [{
                foto: $("#servidor-foto").val(),
                nombre: $("#servidor-nombre").val(),
                apellidop: $("#servidor-apellidop").val(),
                apellidom: $("#servidor-apellidom").val(),
                profecion: $("#servidor-profecion").val(),
                direccion: $("#servidor-direccion").val(),
                ubicacion: $("#servidor-ubicacion").val(),
                telefono: $("#servidor-telefono").val(),
                interno: $("#servidor-interno").val(),
                email: $("#servidor-email").val(),
                unidad: $("#servidor-unidad").val(),
                descripcion: $("#servidor-descripcion").val(),
                _token: $("input[name='_token']").val(),
            }];
    };
    Servidores.prototype.actionCreate = function () {
        this.loadData();
        fetch(this.url + '/servidores', {
            method: 'POST',
            body: $.param(this.data[0]),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            console.log(error);
            $.notify("No se encuentra la RED!", "error");
        }).then(function (response) {
            if (response == 1) {
                $.notify('Registrado correctamente.', "success");
                setTimeout(function () {
                    location.reload();
                }, 500);
            }
            else {
                for (var _i = 0, _a = response.errors; _i < _a.length; _i++) {
                    var e = _a[_i];
                    $.notify(e, "error");
                }
            }
        });
    };
    return Servidores;
}());

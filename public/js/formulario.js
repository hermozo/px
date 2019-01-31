var Formulario = /** @class */ (function () {
    function Formulario() {
        this.url = $("#urlPathURLX").attr("name");
        var _this = this;
        $("#enviarformularioquejareclamos").click(function () {
            var data = $("#formularioquejareclamos").serialize();
            fetch(_this.url + '/formulario', {
                method: 'POST',
                body: data,
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
                        console.log(e);
                        $.notify(e, "error");
                    }
                }
            });
        });
        $('#uploadfoto').change(function () {
            var file_data = this.files[0];
            var imgattr = file_data.name.split('.');
            if (imgattr[(imgattr.length - 1)] == 'jpg' || imgattr[(imgattr.length - 1)] == 'png' ||
                imgattr[(imgattr.length - 1)] == 'docx' || imgattr[(imgattr.length - 1)] == 'pdf' ||
                imgattr[(imgattr.length - 1)] == 'doc' || imgattr[(imgattr.length - 1)] == 'xls' ||
                imgattr[(imgattr.length - 1)] == 'avi' || imgattr[(imgattr.length - 1)] == 'mp4' ||
                imgattr[(imgattr.length - 1)] == 'xlsx' || imgattr[(imgattr.length - 1)] == 'txt') {
                $('#cargandoUploadGif').show();
                var form_data = new FormData();
                form_data.append("_token", $('[name=_token]').val());
                form_data.append('file', file_data);
                $.ajax({
                    url: $('#imgUploadnoticiasformulario').attr('name'),
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',
                }).done(function (data, textStatus, jqXHR) {
                    var arc = JSON.parse(data);
                    $("#uploaddocumento").val(arc.archivo);
                    $('#cargandoUploadGif').hide();
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    $('#cargandoUploadGif').hide();
                }).always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
                    console.log(textStatus);
                    $('#cargandoUploadGif').hide();
                });
            }
            else {
                $.notify(file_data.name + ' !No es admitido.', "error");
            }
        });
    }
    return Formulario;
}());
$(document).ready(function () {
    new Formulario();
});

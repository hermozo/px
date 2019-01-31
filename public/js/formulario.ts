declare var $;

class Formulario {
    public url: string;

    constructor() {
        this.url = $("#urlPathURLX").attr("name");
        var _this = this;
        $("#enviarformularioquejareclamos").click(function () {
            var data = $("#formularioquejareclamos").serialize();
            fetch(_this.url + '/formulario', {
                method: 'POST',
                body: data,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then((res) => {
                return res.json()
            }).catch((error) => {
                console.log(error);
                $.notify("No se encuentra la RED!", "error");
            }).then((response) => {
                if (response == 1) {
                    $.notify('Registrado correctamente.', "success");
                    setTimeout(() => {
                        location.reload();
                    }, 500)
                } else {
                    for (let e of response.errors) {
                        console.log(e);
                        $.notify(e, "error");
                    }
                }
            });

        })


        $('#uploadfoto').change(function () {
            var file_data = this.files[0];
            let imgattr = file_data.name.split('.');
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
                    let arc = JSON.parse(data);
                    $("#uploaddocumento").val(arc.archivo);
                    $('#cargandoUploadGif').hide();
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR)
                    $('#cargandoUploadGif').hide();
                }).always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
                    console.log(textStatus);
                    $('#cargandoUploadGif').hide();
                });

            } else {
                $.notify(file_data.name + ' !No es admitido.', "error");
            }


        })

    }
}

$(document).ready(function () {
    new Formulario();
})




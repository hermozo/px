declare var $;
declare var CKEDITOR;

class Informaciones {
    public titulo: string;
    public descripcion: string;
    public contenido: string;
    public portal: string;
    public tipo: string;
    public fechainicio: string;
    public fechafinal: string;
    public dir: string;
    public api: string;

    constructor() {
        this.dir = $('#url-informacion').attr('name');
        let self = this;
        $("#btn-guardar-informaciones").click(() => {
            let contenido = CKEDITOR.instances['summary-ckeditor-informaciones'].getData();
            self.titulo = $("#form-titulo").val();
            self.descripcion = $("#form-descripcion").val();
            self.contenido = contenido;
            self.portal = $("#tipo-imagen").val();
            self.tipo = $("#tipo-informaciones").val();
            self.fechainicio = $("#from").val();
            self.fechafinal = $("#to").val();
            self.registrar();
        })

        $("#btn-guardar-informaciones-editar").click(() => {
            let contenido = CKEDITOR.instances['summary-ckeditor-informaciones'].getData();
            self.titulo = $("#form-titulo").val();
            self.descripcion = $("#form-descripcion").val();
            self.contenido = contenido;
            self.portal = $("#tipo-imagen").val();
            self.tipo = $("#tipo-informaciones").val();
            self.fechainicio = $("#from").val();
            self.fechafinal = $("#to").val();
            self.update($('#infoID').val());
        })

        let idinfo = 0;
        $(".eliminar-informacion").click(function () {
            $('.bs-eliminarinformaciones-modal-sm').modal('show');
            idinfo = $(this).data("id");
        })

        $("#eliminar-informacion-btn").click(function () {
            self.eliminar(idinfo);
        })


        $('#multiuniupload').change(function () {


            let imagenes = [];
            var iterador = 0;
            for (var i = 0; i < this.files.length; i++) {
                console.log(this.files[i].name);
                var file_data = this.files[i];
                let imgattr = file_data.name.split('.');
                if (imgattr[(imgattr.length - 1)] == 'jpg' || imgattr[(imgattr.length - 1)] == 'png') {
                    var file_data = this.files[i];
                    var form_data = new FormData();
                    form_data.append("_token", $('[name=_token]').val());
                    form_data.append('file', file_data);
                    form_data.append('tipo', '1');
                    $.ajax({
                        url: $('#imgUploadnoticias').attr('name'),
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'POST',
                    }).done(function (data, textStatus, jqXHR) {
                        let arc = JSON.parse(data);
                        console.log(arc.archivo);
                        $("#tipo-imagen").val(arc.archivo);
                        $("#imgUploadChange").attr('src', $("#referenciaImagen").attr('name') + '/' + arc.archivo);
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR)
                    }).always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
                        console.log(textStatus)
                    });
                } else {
                    $.notify(file_data.name + ' !No es admitido.', "error");
                }


            }


        })


        /* $("#irGaleria").click(function () {

            $("#galeriaMultimedia").dialog({
                  width: 800,
                  height: 500,
                  modal: true,
                  show: 'fade',
                  hide: 'fade',
                  open: function () {
                      $("#galeriaMultimedia").load($("#url-galeria").attr('name'), function () {
                          $(".seleccionarImg").click(function () {
                              //alert($(this).attr('src'));
                              $("#tipo-imagen").val($(this).attr('src'));
                              $("#imgUploadChange").attr('src', $(this).attr('src'));
                              $("#galeriaMultimedia").dialog('close');
                          })
                      });

                  }
              })
        })*/

        $(function () {
            var dateFormat = "yy-dd-mm",
                from = $("#from")
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 3,
                        dateFormat: 'yy-mm-dd'
                    })
                    .on("change", function () {
                        to.datepicker("option", "minDate", getDate(this));
                    }),
                to = $("#to").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3,
                    dateFormat: 'yy-mm-dd'
                })
                    .on("change", function () {
                        from.datepicker("option", "maxDate", getDate(this));
                    });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }
                return date;
            }
        });
    }


    public update(id) {
        let url = this.dir + '/' + id;
        let data = {
            titulo: this.titulo,
            descripcion: this.descripcion,
            contenido: this.contenido,
            portal: this.portal,
            tipo: this.tipo,
            fechainicio: this.fechainicio,
            fechafinal: this.fechafinal,
            _token: $("input[name='_token']").val()
        };
        fetch(url, {
            method: 'PUT',
            body: $.param(data),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            $.notify("No se encuentra la RED!", "error");
            console.error(error.errors)
        }).then((response) => {
            if (response == 1) {
                $.notify('Registrado correctamente.', "success");
                location.href = $('#url-informaciones').attr('name') + '/' + $('#url-informacion').attr('href');
            } else {
                for (let e of response.errors) {
                    $.notify(e, "error");
                }
            }
        });
    }

    public eliminar(id) {
        let url = this.dir + '/' + id;
        let data = {
            id: id,
            _token: $("input[name='_token']").val()
        }
        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            $.notify("!Error al eliminar", "error");
            console.error(error)
        }).then((response) => {
            $.notify('Eliminado correctamente.', "success");
            if (response == 1) {
                location.reload();
            }
        });
    }

    public registrar() {
        let url = this.dir;
        let data = {
            titulo: this.titulo,
            descripcion: this.descripcion,
            contenido: this.contenido,
            portal: this.portal,
            tipo: this.tipo,
            fechainicio: this.fechainicio,
            fechafinal: this.fechafinal,
            _token: $("input[name='_token']").val()
        };
        fetch(url, {
            method: 'POST',
            body: $.param(data),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            $.notify("No se encuentra la RED!", "error");
            console.error(error.errors)
        }).then((response) => {
            if (response == 1) {
                $.notify('Registrado correctamente.', "success");
                location.href = $('#url-informaciones').attr('name') + '/' + $('#url-informacion').attr('href');
            } else {
                for (let e of response.errors) {
                    $.notify(e, "error");
                }
            }
        });
    }
}

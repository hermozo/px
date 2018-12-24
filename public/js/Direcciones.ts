declare var $;

class Direcciones {
    public data: Array<{ direccion: string, lng: number, lat: number, heading: string, pitch: number, _token: string }>;
    public url: string;
    public id: number;

    constructor() {
        this.id = 0;
        this.url = $("#urlPath").attr("name");
        $("#guardar-btn").click(() => {
            this.actionCreate();
        })

        let _this = this;
        $(".eliminar-direccion").click(function () {
            $('#modal-eliminar').modal('show');
            _this.id = $(this).data("id");
        })
        $("#eliminar-direccion-btn").click(function () {
            _this.actionDelete();
        })

        $(".btn-edit-direcciones").click(function () {
            $("#guardar-btn").hide();
            $("#guardar-btn-cambios").show();
            $('#myModal').modal('show');
            _this.id = $(this).data("id");
            _this.actionView();
        })

        $("#nuevaDireccion").click(() => {
            $("#guardar-btn").show();
            $("#guardar-btn-cambios").hide();
        })

        $("#guardar-btn-cambios").click(() => {
            this.actionUpdate();
        })

    }


    public actionView() {
        let url = this.url + '/direcciones/' + this.id;
        fetch(url, {
            method: 'GET',
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            console.error(error)
        }).then((response) => {
            this.id = response.id;
            $("#form-direccion").val(response.direccion);
            $("#form-longitud").val(response.lng);
            $("#form-latitud").val(response.lat);
            $("#form-cabecera").val(response.heading);
            $("#form-punto").val(response.pitch);
        });
    }

    public actionUpdate() {
        this.cargadata();
        fetch(this.url + '/direcciones/' + this.id, {
            method: 'PUT',
            body: $.param(this.data[0]),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            $.notify("No se encuentra la RED!", "error");
        }).then((response) => {
            if (response == 1) {
                $.notify('Modificado correctamente.', "success");
                setTimeout(() => {
                    location.reload();
                }, 500)
            } else {
                for (let e of response.errors) {
                    $.notify(e, "error");
                }
            }
        });
    }

    public actionDelete() {
        let url = this.url + '/direcciones/' + this.id;
        let data = {
            id: this.id,
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
                setTimeout(() => {
                    location.reload();
                }, 500)
            }
        });
    }

    public cargadata() {
        this.data = [{
            direccion: $("#form-direccion").val(),
            lng: $("#form-longitud").val(),
            lat: $("#form-latitud").val(),
            heading: $("#form-cabecera").val(),
            pitch: $("#form-punto").val(),
            _token: $("input[name='_token']").val(),
        }]
    }

    public actionCreate() {
        this.cargadata();
        fetch(this.url + '/' + 'direcciones', {
            method: 'POST',
            body: $.param(this.data[0]),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            $.notify("No se encuentra la RED!", "error");
        }).then((response) => {
            if (response == 1) {
                $.notify('Registrado correctamente.', "success");
                setTimeout(() => {
                    location.reload();
                }, 500)
            } else {
                for (let e of response.errors) {
                    $.notify(e, "error");
                }
            }
        });
    }


}

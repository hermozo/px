declare var $;

class Galery {
    public data: Array<{ nombre: string, descripcion: string, tipo: number, _token: string }>;
    public url: string;
    public id: number;

    constructor() {
        this.data = [];
        this.id = 0;
        this.url = $("#urlPath").attr("name");

        $("#btn-crear-presentacion").click(() => {
            $("#myModalGalery").modal('show');
            $("#btn-crear-galery").show();
            $("#btn-guardar-galery").hide();
        })
        $("#btn-crear-galery").click(() => {
            this.actionCreate();
        })

        let _this = this;
        $(".eliminar-galery").click(function () {
            $('#modal-eliminar-galery').modal('show');
            _this.id = $(this).data("id");
        })
        $("#eliminar-galery-btn").click(function () {
            _this.actionDelete();
        })

        $(".editar-galery").click(function () {
            $("#myModalGalery").modal('show');
            $("#btn-crear-galery").hide();
            $("#btn-guardar-galery").show();
            _this.id = $(this).data("id");
            _this.actionView();
        })
        $("#btn-guardar-galery").click(function () {
            _this.actionUpdate();
        })

    }

    public actionView() {
        let url = this.url + '/galeria/' + this.id;
        fetch(url, {
            method: 'GET',
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            console.error(error)
        }).then((response) => {
            this.id = response.id;
            $("#nombrePresentacion").val(response.nombre);
            $("#descripcionPresentacion").val(response.descripcion)
        });
    }


    public actionUpdate() {
        this.loadData();
        let url = this.url + '/galery/' + this.id;
        fetch(url, {
            method: 'PUT',
            body: $.param(this.data[0]),
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
                $.notify('Modificado correctamente.', "success");
                location.reload();
            } else {
                for (let e of response.errors) {
                    $.notify(e, "error");
                }
            }
        });
    }


    public loadData() {
        this.data = [{
            nombre: $("#nombrePresentacion").val(),
            descripcion: $("#descripcionPresentacion").val(),
            tipo: $("#tipoPresentacion").val(),
            _token: $("input[name='_token']").val(),
        }];
    }

    public actionCreate() {
        this.loadData();
        fetch(this.url + '/galery', {
            method: 'POST',
            body: $.param(this.data[0]),
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
                    $.notify(e, "error");
                }
            }
        });
    }

    public actionDelete() {
        let url = this.url + '/galery/' + this.id;
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


}


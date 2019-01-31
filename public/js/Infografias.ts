declare var $;

class Infografias {
    public data: Array<{ nombre: string, descripcion: string, _token: string }>;
    public url: string;
    public id: number;

    constructor() {
        this.data = [];
        this.id = 0;
        this.url = $("#urlPath").attr("name");
        var _this = this;
        $("#infografiasModal").click(function () {
            $("#myModalInfografias").modal("show");
            $("#crearInfografias").show();
            $("#editarInfografias").hide();
        })

        $("#crearInfografias").click(function () {
            _this.actionCreate();
        })

        $("#editarInfografias").click(function () {
            _this.actionUpdate();
        })

        $(".editar-infografia").click(function () {
            $("#myModalInfografias").modal("show");
            $("#crearInfografias").hide();
            $("#editarInfografias").show();
            _this.id = $(this).data("id");
            _this.actionView();
        })

        $(".eliminar-infografia").click(function () {
            $("#modal-eliminar-Infografias").modal("show");
            _this.id = $(this).data("id");
        })
        $("#eliminar-infografia-btn").click(function () {
            _this.actionDelete();
        })
    }

    public loadData() {
        this.data = [{
            nombre: $("#infografiaNombre").val(),
            descripcion: $("#infografiaDescripcion").val(),
            _token: $("input[name='_token']").val(),
        }];
    }

    public actionView() {
        let url = this.url + '/infografia/' + this.id;
        fetch(url, {
            method: 'GET',
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            console.error(error)
        }).then((response) => {
            this.id = response.id;
            $("#infografiaNombre").val(response.nombre);
            $("#infografiaDescripcion").val(response.descripcion)
        });
    }

    public actionUpdate() {
        this.loadData();
        let url = this.url + '/infografia/' + this.id;
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

    public actionCreate() {
        this.loadData();
        fetch(this.url + '/infografia', {
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
        let url = this.url + '/infografia/' + this.id;
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

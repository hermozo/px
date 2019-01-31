declare var $;

class Graficos {
    public data: Array<{ nombre: string, descripcion: string, porcentaje: number, id_infografia: number, _token: string }>;
    public url: string;
    public id: number;

    constructor() {
        this.data = [];
        this.id = 0;
        this.url = $("#urlPath").attr("name");

        var _this = this;
        var handle = $("#graficosPorcentaje");
        $("#slider").slider({
            create: function () {
                handle.text($(this).slider("value"));
            },
            slide: function (event, ui) {
                handle.text(ui.value);
                _this.id = ui.value;
            }
        });

        $("#registrarGrafico").click(function () {
            _this.loadData();
            _this.actionCreate();
        })

        $(".eliminar-graficos").click(function () {
            _this.id = $(this).data('id');
            _this.actionDelete();
        })


    }

    public loadData() {
        this.data = [{
            nombre: $("#graficosNombre").val(),
            descripcion: $("#graficosDescripcion").val(),
            porcentaje: this.id,
            id_infografia: $("#graficosIdinfo").val(),
            _token: $("input[name='_token']").val(),
        }];
    }

    public actionCreate() {
        this.loadData();
        fetch(this.url + '/graficos', {
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
        let url = this.url + '/graficos/' + this.id;
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

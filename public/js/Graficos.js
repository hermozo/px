var Graficos = /** @class */ (function () {
    function Graficos() {
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
        });
        $(".eliminar-graficos").click(function () {
            _this.id = $(this).data('id');
            _this.actionDelete();
        });
    }
    Graficos.prototype.loadData = function () {
        this.data = [{
                nombre: $("#graficosNombre").val(),
                descripcion: $("#graficosDescripcion").val(),
                porcentaje: this.id,
                id_infografia: $("#graficosIdinfo").val(),
                _token: $("input[name='_token']").val(),
            }];
    };
    Graficos.prototype.actionCreate = function () {
        this.loadData();
        fetch(this.url + '/graficos', {
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
    Graficos.prototype.actionDelete = function () {
        var url = this.url + '/graficos/' + this.id;
        var data = {
            id: this.id,
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
                setTimeout(function () {
                    location.reload();
                }, 500);
            }
        });
    };
    return Graficos;
}());

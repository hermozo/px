var Galery = /** @class */ (function () {
    function Galery() {
        var _this_1 = this;
        this.data = [];
        this.id = 0;
        this.url = $("#urlPath").attr("name");
        $("#btn-crear-presentacion").click(function () {
            $("#myModalGalery").modal('show');
            $("#btn-crear-galery").show();
            $("#btn-guardar-galery").hide();
        });
        $("#btn-crear-galery").click(function () {
            _this_1.actionCreate();
        });
        var _this = this;
        $(".eliminar-galery").click(function () {
            $('#modal-eliminar-galery').modal('show');
            _this.id = $(this).data("id");
        });
        $("#eliminar-galery-btn").click(function () {
            _this.actionDelete();
        });
    }
    Galery.prototype.loadData = function () {
        this.data = [{
                nombre: $("#nombrePresentacion").val(),
                descripcion: $("#descripcionPresentacion").val(),
                tipo: $("#tipoPresentacion").val(),
                _token: $("input[name='_token']").val(),
            }];
    };
    Galery.prototype.actionCreate = function () {
        this.loadData();
        fetch(this.url + '/galery', {
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
    Galery.prototype.actionDelete = function () {
        var url = this.url + '/galery/' + this.id;
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
    Galery.prototype.actionView = function () {
    };
    Galery.prototype.actionUpdate = function () {
    };
    return Galery;
}());

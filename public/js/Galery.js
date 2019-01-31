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
        $(".editar-galery").click(function () {
            $("#myModalGalery").modal('show');
            $("#btn-crear-galery").hide();
            $("#btn-guardar-galery").show();
            _this.id = $(this).data("id");
            _this.actionView();
        });
        $("#btn-guardar-galery").click(function () {
            _this.actionUpdate();
        });
    }
    Galery.prototype.actionView = function () {
        var _this_1 = this;
        var url = this.url + '/galeria/' + this.id;
        fetch(url, {
            method: 'GET',
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            console.error(error);
        }).then(function (response) {
            _this_1.id = response.id;
            $("#nombrePresentacion").val(response.nombre);
            $("#descripcionPresentacion").val(response.descripcion);
        });
    };
    Galery.prototype.actionUpdate = function () {
        this.loadData();
        var url = this.url + '/galery/' + this.id;
        fetch(url, {
            method: 'PUT',
            body: $.param(this.data[0]),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            $.notify("No se encuentra la RED!", "error");
            console.error(error.errors);
        }).then(function (response) {
            if (response == 1) {
                $.notify('Modificado correctamente.', "success");
                location.reload();
            }
            else {
                for (var _i = 0, _a = response.errors; _i < _a.length; _i++) {
                    var e = _a[_i];
                    $.notify(e, "error");
                }
            }
        });
    };
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
    return Galery;
}());

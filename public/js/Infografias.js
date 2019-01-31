var Infografias = /** @class */ (function () {
    function Infografias() {
        this.data = [];
        this.id = 0;
        this.url = $("#urlPath").attr("name");
        var _this = this;
        $("#infografiasModal").click(function () {
            $("#myModalInfografias").modal("show");
            $("#crearInfografias").show();
            $("#editarInfografias").hide();
        });
        $("#crearInfografias").click(function () {
            _this.actionCreate();
        });
        $("#editarInfografias").click(function () {
            _this.actionUpdate();
        });
        $(".editar-infografia").click(function () {
            $("#myModalInfografias").modal("show");
            $("#crearInfografias").hide();
            $("#editarInfografias").show();
            _this.id = $(this).data("id");
            _this.actionView();
        });
        $(".eliminar-infografia").click(function () {
            $("#modal-eliminar-Infografias").modal("show");
            _this.id = $(this).data("id");
        });
        $("#eliminar-infografia-btn").click(function () {
            _this.actionDelete();
        });
    }
    Infografias.prototype.loadData = function () {
        this.data = [{
                nombre: $("#infografiaNombre").val(),
                descripcion: $("#infografiaDescripcion").val(),
                _token: $("input[name='_token']").val(),
            }];
    };
    Infografias.prototype.actionView = function () {
        var _this_1 = this;
        var url = this.url + '/infografia/' + this.id;
        fetch(url, {
            method: 'GET',
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            console.error(error);
        }).then(function (response) {
            _this_1.id = response.id;
            $("#infografiaNombre").val(response.nombre);
            $("#infografiaDescripcion").val(response.descripcion);
        });
    };
    Infografias.prototype.actionUpdate = function () {
        this.loadData();
        var url = this.url + '/infografia/' + this.id;
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
    Infografias.prototype.actionCreate = function () {
        this.loadData();
        fetch(this.url + '/infografia', {
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
    Infografias.prototype.actionDelete = function () {
        var url = this.url + '/infografia/' + this.id;
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
    return Infografias;
}());

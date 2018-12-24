var Direcciones = /** @class */ (function () {
    function Direcciones() {
        var _this_1 = this;
        this.id = 0;
        this.url = $("#urlPath").attr("name");
        $("#guardar-btn").click(function () {
            _this_1.actionCreate();
        });
        var _this = this;
        $(".eliminar-direccion").click(function () {
            $('#modal-eliminar').modal('show');
            _this.id = $(this).data("id");
        });
        $("#eliminar-direccion-btn").click(function () {
            _this.actionDelete();
        });
        $(".btn-edit-direcciones").click(function () {
            $("#guardar-btn").hide();
            $("#guardar-btn-cambios").show();
            $('#myModal').modal('show');
            _this.id = $(this).data("id");
            _this.actionView();
        });
        $("#nuevaDireccion").click(function () {
            $("#guardar-btn").show();
            $("#guardar-btn-cambios").hide();
        });
        $("#guardar-btn-cambios").click(function () {
            _this_1.actionUpdate();
        });
    }
    Direcciones.prototype.actionView = function () {
        var _this_1 = this;
        var url = this.url + '/direcciones/' + this.id;
        fetch(url, {
            method: 'GET',
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            console.error(error);
        }).then(function (response) {
            _this_1.id = response.id;
            $("#form-direccion").val(response.direccion);
            $("#form-longitud").val(response.lng);
            $("#form-latitud").val(response.lat);
            $("#form-cabecera").val(response.heading);
            $("#form-punto").val(response.pitch);
        });
    };
    Direcciones.prototype.actionUpdate = function () {
        this.cargadata();
        fetch(this.url + '/direcciones/' + this.id, {
            method: 'PUT',
            body: $.param(this.data[0]),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            $.notify("No se encuentra la RED!", "error");
        }).then(function (response) {
            if (response == 1) {
                $.notify('Modificado correctamente.', "success");
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
    Direcciones.prototype.actionDelete = function () {
        var url = this.url + '/direcciones/' + this.id;
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
    Direcciones.prototype.cargadata = function () {
        this.data = [{
                direccion: $("#form-direccion").val(),
                lng: $("#form-longitud").val(),
                lat: $("#form-latitud").val(),
                heading: $("#form-cabecera").val(),
                pitch: $("#form-punto").val(),
                _token: $("input[name='_token']").val(),
            }];
    };
    Direcciones.prototype.actionCreate = function () {
        this.cargadata();
        fetch(this.url + '/' + 'direcciones', {
            method: 'POST',
            body: $.param(this.data[0]),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
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
    return Direcciones;
}());

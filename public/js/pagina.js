//var API = 'http://192.168.89.5:8000/api';
var Pagina = /** @class */ (function () {
    function Pagina() {
        this.startEvents();
        this.api = $("#url-pagina").attr('name');
    }
    Pagina.prototype.startEvents = function () {
        var _this = this;
        var idpage = 0;
        var self = this;
        $('#crearCategoria').click(function () {
            self.categoriaName = $("#textCategoriMenu").val();
            self.categoriaDescripcion = $("#textCategoriaDescripcion").val();
            self.registrar();
        });
        $(".btn-crear-categoria").click(function () {
            self.paginaid = $(this).data('id');
            $('.bs-example-modal-sm').modal('show');
        });
        $("#btn-guardar-texto").click(function () {
            _this.modificar();
        });
        $(".btn-eliminar-pagina").click(function () {
            $('.bs-eliminar-modal-sm').modal('show');
            idpage = $(this).data('id');
        });
        $("#eliminarCategoria").click(function () {
            self.eliminar(idpage);
        });
        $("#textCategoriMenu").keyup(function () {
            var u = self.getCleanedString($(this).val());
            $("#textCategoriaDescripcion").val(u);
        });
    };
    Pagina.prototype.getCleanedString = function (cadena) {
        var specialChars = "!@#$^&%*()+=-[]\/{}|:<>?,.";
        for (var i = 0; i < specialChars.length; i++) {
            cadena = cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
        }
        cadena = cadena.toLowerCase();
        cadena = cadena.replace(/ /g, "-");
        cadena = cadena.replace(/á/gi, "a");
        cadena = cadena.replace(/é/gi, "e");
        cadena = cadena.replace(/í/gi, "i");
        cadena = cadena.replace(/ó/gi, "o");
        cadena = cadena.replace(/ú/gi, "u");
        cadena = cadena.replace(/ñ/gi, "n");
        return cadena;
    };
    Pagina.prototype.eliminar = function (id) {
        var url = this.api + '/pagina/' + id;
        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            $.notify("No se encuentra la RED!", "error");
            console.error(error);
        }).then(function (response) {
            $.notify('Eliminado correctamente.', "success");
            if (response == 1) {
                location.reload();
            }
        });
    };
    Pagina.prototype.modificar = function () {
        var contenido = CKEDITOR.instances['summary-ckeditor'].getData();
        console.log(contenido);
        var id = $("#keyId").data('val');
        var data = {
            titulo: contenido,
            _token: $("input[name='_token']").val(),
        };
        var url = this.api + '/contenido/' + id;
        fetch(url, {
            method: 'PUT',
            body: $.param(data),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            console.error(error);
        }).then(function (response) {
            if (response == 1) {
                location.reload();
            }
        });
    };
    Pagina.prototype.registrar = function () {
        var url = this.api + '/pagina';
        var data = {
            titulo: this.categoriaName,
            descripcion: this.categoriaDescripcion,
            idpagina: this.paginaid,
            _token: $("input[name='_token']").val(),
        };
        fetch(url, {
            method: 'POST',
            body: $.param(data),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function (res) {
            return res.json();
        }).catch(function (error) {
            $.notify("No se encuentra la RED!", "error");
            console.error(error);
        }).then(function (response) {
            $.notify('Registrado correctamente.', "success");
            if (response == 1) {
                location.reload();
            }
        });
    };
    return Pagina;
}());

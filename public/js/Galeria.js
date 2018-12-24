var Galeria = /** @class */ (function () {
    function Galeria() {
        var _this = this;
        this.dir = $('#url-galeria').attr('name');
        $(".btn-eliminar-multimedia").click(function () {
            $('.bs-eliminarinformaciones-modal-sm').modal('show');
            _this.idimg = $(this).data('id');
        });
        $("#eliminar-galeria-btn").click(function () {
            _this.eliminar(_this.idimg);
        });
    }
    Galeria.prototype.eliminar = function (id) {
        var url = this.dir + '/' + id;
        var data = {
            id: id,
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
            $('.bs-eliminarinformaciones-modal-sm').modal('hide');
            $("#multi-" + id).hide();
        });
    };
    return Galeria;
}());

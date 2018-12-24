declare var $;
declare var CKEDITOR;

class Galeria {
    public dir: string;
    public idimg: number;

    constructor() {
        let _this = this;
        this.dir = $('#url-galeria').attr('name');
        $(".btn-eliminar-multimedia").click(function () {
            $('.bs-eliminarinformaciones-modal-sm').modal('show');
            _this.idimg = $(this).data('id');
        })

        $("#eliminar-galeria-btn").click(function () {
            _this.eliminar(_this.idimg);
        });
    }

    public eliminar(id) {
        let url = this.dir + '/' + id;
        let data = {
            id: id,
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
            $('.bs-eliminarinformaciones-modal-sm').modal('hide');
            $("#multi-" + id).hide();
        });
    }
}

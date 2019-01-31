declare var $;
declare var CKEDITOR;

//var API = 'http://192.168.89.5:8000/api';


class Pagina {
    public categoriaName: string;
    public categoriaDescripcion: string;
    public paginaid: string;
    public texto: string;
    public api: string;

    constructor() {
        this.startEvents();

        this.api = $("#url-pagina").attr('name');

    }

    public startEvents() {
        let idpage = 0;
        let self = this;
        $('#crearCategoria').click(function () {
            self.categoriaName = $("#textCategoriMenu").val();
            self.categoriaDescripcion = $("#textCategoriaDescripcion").val();
            self.registrar();
        })
        $(".btn-crear-categoria").click(function () {
            self.paginaid = $(this).data('id');
            $('.bs-example-modal-sm').modal('show')
        });
        $("#btn-guardar-texto").click(() => {
            this.modificar();
        });
        $(".btn-eliminar-pagina").click(function () {
            $('.bs-eliminar-modal-sm').modal('show');
            idpage = $(this).data('id');
        })
        $("#eliminarCategoria").click(() => {
            self.eliminar(idpage);
        })


        $("#textCategoriMenu").keyup(function () {
            let u = self.getCleanedString($(this).val());
            $("#textCategoriaDescripcion").val(u);
        })


    }


    public getCleanedString(cadena) {
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
    }


    public eliminar(id) {
        let url = this.api + '/pagina/' + id;
        fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            $.notify("No se encuentra la RED!", "error");
            console.error(error)
        }).then((response) => {
            $.notify('Eliminado correctamente.', "success");
            if (response == 1) {
                location.reload();
            }
        });
    }

    public modificar() {
        let contenido = CKEDITOR.instances['summary-ckeditor'].getData();
        console.log(contenido);
        let id = $("#keyId").data('val');
        let data = {
            titulo: contenido,
            _token: $("input[name='_token']").val(),
        };
        let url = this.api + '/contenido/' + id;
        fetch(url, {
            method: 'PUT',
            body: $.param(data),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            console.error(error)
        }).then((response) => {
            if (response == 1) {
                location.reload();
            }
        });
    }

    public registrar() {
        let url = this.api + '/pagina';
        let data = {
            titulo: this.categoriaName,
            descripcion: this.categoriaDescripcion,
            idpagina: this.paginaid,
            _token: $("input[name='_token']").val(),
        };
        fetch(url, {
            method: 'POST',
            body: $.param(data),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then((res) => {
            return res.json()
        }).catch((error) => {
            $.notify("No se encuentra la RED!", "error");
            console.error(error)
        }).then((response) => {
            $.notify('Registrado correctamente.', "success");
            if (response == 1) {
                location.reload();
            }
        });
    }
}

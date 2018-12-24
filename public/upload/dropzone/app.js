var img = [];
jQuery("div.dropzone").dropzone({
            url: "http://192.168.89.152:82/admin/site/upload",
            method: 'POST',
            init: function () {
                this.on("success", function (file, response) {
                    var obj = jQuery.parseJSON(response);
                    img.push(obj);
                })
            }, 
            queuecomplete: function () {
				console.log(img)
               // localStorage.setItem("IMG", JSON.stringify(img));
            }
});



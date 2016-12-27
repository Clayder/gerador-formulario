angular.module('notesApp', [])
        .controller('Formulario', function ($http) {


            var app = this;
            var objForm = [];
            app.submitInput = function () {
                var item = new Object();
                item = app.input;
                item.tipo = app.typeInput.tipo;
                objForm.push(item);

                console.log(app.input);
                //delete app.input;
                app.input = "";
                console.log(objForm);
                app.msgInput = true;
            };
            app.submitSelect = function () {

                var item = new Object();
                item = app.select;
                objForm.push(item);
                console.log(app.select);
                app.select = "";
                console.log(objForm);
                app.msgSelect = true;
            };
            app.submitRadio = function () {
                var item = new Object();
                item = app.radio;
                objForm.push(item);
                console.log(app.radio);
                app.radio = "";
                console.log(objForm);
                app.msgRadio = true;
            };

            app.enviar = function () {
                var myJsonString = JSON.stringify(objForm);
                console.log(myJsonString);
                var teste = new Object();
                teste.um = 1;
                teste.dois = 2;
                console.log(teste);

                $.ajax({
                    url: base_url,
                    type: 'post',
                    data: {"dados": myJsonString},
                    dataType: 'hmtl',
                    beforeSend: function () {

                    },
                    success: function (retorno) {
                        console.log(retorno);
                    },
                    error: function (erro) {
                        console.log(erro.responseText);
                    }
                });
            };
        });



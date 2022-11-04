window.onload = function () {
    $("#bt_busca").click(function () {
        let busca = $("#busca").val();
        if (busca === "") {
            alert("Precisa informar um termo para busca!")
        } else {
            window.location = `/?busca=${busca}`;
        }
    });

    $(document).on("click", ".bt_afavoritar", function (ev) {
        ev.preventDefault();
        const $this = $(this);
        let id_versiculo = $this.data("versiculo"); //data-versiculo

        $.post("/favoritos", {versiculo: id_versiculo}, function (response) {
            if (response.status === "success") {
                $this.find("i").removeClass("fa-star-o").addClass("fa-star");
                $this.removeClass("bt_afavoritar").addClass("bt_desafavoritar");
            }
        }, "json");
    });

    $(document).on("click", ".bt_desafavoritar", function (ev) {
        ev.preventDefault();
        const $this = $(this);
        let id_versiculo = $this.data("versiculo"); //data-versiculo

        $.ajax({
            url: `/favoritos/${id_versiculo}`,
            dataType: "json",
            method: "delete",
            success: function (response) {
                if (response.status === "success") {
                    $this.find("i").removeClass("fa-star").addClass("fa-star-o");
                    $this.removeClass("bt_desafavoritar").addClass("bt_afavoritar");
                }
            }
        });
    });

    $(document).on("click", ".bt_remover_favorito", function (ev) {
        ev.preventDefault();
        const $this = $(this);
        let id_versiculo = $this.data("versiculo"); //data-versiculo

        $.ajax({
            url: `/favoritos/${id_versiculo}`,
            dataType: "json",
            method: "delete",
            success: function (response) {
                if (response.status === "success") {
                    $this.parent().fadeOut("slow", function () {
                        $(this).remove();
                    })
                }
            }
        });
    });

    $(document).on("click", "#bt_salvar_anotacao", function (ev) {
        ev.preventDefault();
        let dados = $("#form_anotacoes").serialize();
        $("#bt_salvar_anotacao").attr("disabled", true).text("Salvando ... ");
        $.ajax({
            url: "/anotacao/salvar",
            dataType: "json",
            method: "post",
            data: dados,
            success: function (response) {
                console.log(response);
                if (response.status === "success") {
                    $("#div_msg")
                        .removeClass("d-none")
                        .removeClass("alert-danger")
                        .addClass("alert-success")
                        .empty()
                        .append("<p>Sua anotação foi salva com sucesso!</p>")

                    $("#bt_salvar_anotacao").attr("disabled", false).text("Salvar Anotação");

                    $("#id_anotacao").val(response.id_anotacao)
                }
            },
            error: function(error) {
                const errors = error.responseJSON.errors;

                $("#div_msg").removeClass("d-none")
                $(".form-control").removeClass("input-error");
                let texto = "<ul>";
                for(let chave of Object.keys(errors)) {
                    for (let error of errors[chave]) {
                        texto += `<li> ${error} </li>`;
                        $(`#${chave}`).addClass("input-error");
                    }
                }
                texto += "</ul>"
                $("#div_msg").empty().append(texto);
                $("#bt_salvar_anotacao").attr("disabled", false).text("Salvar Anotação");
            }
        });
    });

    $(document).on("click", ".bt_excluir_anotacao", function (ev) {
       ev.preventDefault();
        const $this = $(this);
        let id_anotacao = $this.data("anotacao"); //data-versiculo

        if (confirm("Deseja realmente excluir essa anotação?")) {
            $.ajax({
                url: `/anotacao/${id_anotacao}`,
                dataType: "json",
                method: "delete",
                success: function (response) {
                    if (response.status === "success") {
                        $(`.card-anotacao-${id_anotacao}`).fadeOut("slow", function () {
                            $(this).remove();
                        })
                    }
                }
            });
        }
    });

    Fancybox.bind("[data-fancybox]", {
        on: {
            destroy: (fancybox, slide) => {
                window.location.reload();
            },
        },
    });
}

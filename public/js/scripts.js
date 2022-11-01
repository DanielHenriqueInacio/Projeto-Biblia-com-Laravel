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
}

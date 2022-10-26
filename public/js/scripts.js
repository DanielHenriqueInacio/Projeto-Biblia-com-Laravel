window.onload = function() {
    $("#bt_busca").click(function(){
        let busca = $("#busca").val();
        if (busca === "") {
            alert("Precisa informar um termo para busca!")
        } else {
            window.location = `/index.php?busca=${busca}`;
        }
    })
}
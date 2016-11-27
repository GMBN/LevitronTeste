function toId(id) {
    $('html, body').animate({
        scrollTop: $(id).offset().top - 100
    }, 1000);
}

$(document).ready(function () {
    $("#categoria_view").load("/blog/categoria/view");
    $("#post_ultimos").load("/blog/post/ultimos");
    carregarComentario();

});

function carregarComentario() {
    $("#post_comentario").load("/blog/comentario/view/" + id_post);
}
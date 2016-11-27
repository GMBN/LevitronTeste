
<div class="row">
    <div class="col-md-12 galeria" style="
         height:5000;
         -webkit-column-count: 6;
         -webkit-column-width: 160px;
         -webkit-column-gap:   0px;
         -moz-column-width:    160px;
         -moz-column-count:    6;
         -moz-column-gap:      0px;
         column-count:         6;
         column-width: 160px;
         column-gap:           0px;">
        <?php
        $function = '';
        foreach ($rs as $r) {
            if (isset($_GET['insert'])) {
                $function = 'onclick="top.tinymce.activeEditor.windowManager.getParams().addImg(\'' . $r['arquivo'] . '\')"';
            }
            echo '<a href="javascript:void(0)" ' . $function . ' ><img class="thumbnail" data-url="' . $r['arquivo'] . '" src="/img/blog/150x/' . $r['nome'] . '" /></a>';
        }
        ?>
    </div>
</div>
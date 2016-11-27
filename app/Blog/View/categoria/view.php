<div class="widget">
    <h5 class="widget-title line-bottom">Categorias</h5>
    <div class="categories">
        <ul class="list list-border angle-double-right">
            <?php 
            foreach($rs as $r){
            ?>
            <li><a href="/blog/<?=$r['slug'] ?>"><?=$r['titulo'] ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
<div class="widget">
    <h5 class="widget-title line-bottom">Últimos Posts</h5>
    <div class="latest-posts">
        <?php foreach($rs as $r){ 
            $url = '/blog/'.$r['c_slug'].'/'.$r['p_slug'];
            ?>
        <article class="post media-post clearfix pb-0 mb-10" >
            <a class="post-thumb mt-5 thumbnail"  href="<?= $url ?>"><img style="max-width: 90px" src="<?= $r['p_img'] ?>" alt=""></a>
            <div class="post-right">
                <h5 class="post-title mt-0" style="line-height: 1!important;"><a style="line-height:1.3!important" href="<?= $url ?>"><?= $r['p_titulo'] ?></a></h5>
                <!--<p><?= $r['p_resumo'] ?></p>-->
            </div>
        </article>
        <?php } ?>
    </div>
</div>

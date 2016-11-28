<script>
    var id_post = <?= $rs['id'] ?>;
</script>

<?php
$this->title($rs['titulo']);
$this->metaDesc($rs['resumo']);
$this->metaImg($rs['img']);

$imgFundo = $this->getConfig('imagemFundo');
?>

<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?= $imgFundo ?>">
    <div class="container pt-120 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-50">
            <div class="row"> 
                <div class="col-md-12">
                    <h1 class="title text-white"><?= $rs['titulo'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Blog -->
<section>
    <div class="container mb-30 pt-30 pb-30">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-posts single-post">
                    <article class="post clearfix mb-0">
                        <div class="entry-meta">
                            <ul class="list-inline">
                                <li>Postado: <span class="text-theme-colored"><?= $this->descData($rs['created']); ?></span></li>
                                <li>Autor: <a href="javascript:toId('#autor_post');"  class="text-theme-colored"><?= $rs['autor_nome'] ?></a></li>
                                <li>Comentários: <a href="javascript:toId('#post_comentario');" class="text-theme-colored"><i class="fa fa-comment-o"></i> <?= (int) $rs['comentario'] ?></a></li>
                            </ul>
                        </div>
                        <div class="entry-content mt-10">
                            <p class="mb-15">
                                <?= $rs['conteudo'] ?> 
                            </p>
                          <!--<p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
        <!--                  <p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                          <blockquote class="theme-colored pt-20 pb-20">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                          </blockquote>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>-->
                            <div class="mt-30 mb-0">

                                <h5 class="pull-left mt-10 mr-20 text-theme-colored">Compartilhe:</h5><div class="addthis_inline_share_toolbox"></div>
                            </div>
                        </div>
                    </article>
                    <div class="tagline p-0 pt-20 mt-5">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="tags">
                                    <p class="mb-0"><i class="fa fa-tags text-theme-colored"></i> <span>Categoria:</span> <a href="/blog/<?= $rs['c_slug'] ?>" class="text-theme-colored"><?= $rs['c_titulo'] ?> </a></p>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="author-details media-post" id="autor_post">
                        <span class="post-thumb mb-0"><img class="img-thumbnail" alt="" src="<?= $rs['autor_img'] ?>"></span>
                        <div class="post-right">
                            <h5 class="post-title mt-0 mb-0"><span class="font-18"><?= $rs['autor_nome'] ?></span></h5>
                            <p><?= $rs['autor_sobre'] ?></p>
                            <ul class="social-icons square-sm m-0">
                                <?php
                                if (!empty($rs['u_facebook'])) {
                                    echo '<li><a target="_blank" href="' . $rs['u_facebook'] . '"><i class="fa fa-facebook"></i></a></li>';
                                }
                                if (!empty($rs['u_twitter'])) {
                                    echo '<li><a target="_blank" href="' . $rs['u_twitter'] . '"><i class="fa fa-twitter"></i></a></li>';
                                }
                                if (!empty($rs['u_google'])) {
                                    echo '<li><a target="_blank" href="' . $rs['u_google'] . '"><i class="fa fa-google-plus"></i></a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="post_comentario"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="sidebar sidebar-right mt-sm-30">
                    <!--                    <div class="widget">
                                            <h5 class="widget-title line-bottom">Search box</h5>
                                            <div class="search-form">
                                                <form>
                                                    <div class="input-group">
                                                        <input type="text" placeholder="Click to Search" class="form-control search-input">
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>-->
                    <div  id="categoria_view">
                    </div>
                    <div  id="post_ultimos">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-557dcb69251c4db8"></script> 
<?php
$this->addJs('/assets/js/blog-post.js');
?>
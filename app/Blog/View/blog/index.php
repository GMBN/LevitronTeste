<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/site/img/blog.jpg">
    <div class="container pt-120 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-50">
            <div class="row"> 
                <div class="col-md-12">
                    <h1 class="title text-white">Blog</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
        <?php foreach ($rs as $r) { 
            $url_post = '/blog/'.$r['c_slug'].'/'.$r['p_slug'];
            ?>
            <div class=" clearfixcol-sm-6 col-md-4 pr-5 pl-5 pt-0 pb-0 col-lg-4 mt-5 mb-5"  style="min-height:500px;height: 100%">
                <article class="post clearfix maxwidth600 mb-30">
                    <div class="entry-header">
                        <div class="post-thumb thumb"> <img src="<?= $r['p_img'] ?>" alt="" class="img-responsive img-fullwidth"> </div>
                    </div>
                    <div class="entry-content border-1px p-20">
                        <h5 class="entry-title mt-0 pt-0"><a href="<?= $url_post ?>"><?= $r['p_titulo'] ?></a></h5>
                        <div class="entry-meta">
                            <ul class="list-inline entry-date font-12 mt-5">
                                <li style="width: 100%;"><span class="text-theme-colored"><?= $this->descData($r['p_created']);?></span></li>
                                <li><a class="text-theme-colored" href="#">| <?= $r['nome_autor'] ?></a></li>
                            </ul>
                        </div>
                        <p class="text-left mb-20 mt-15 font-13"><?= $r['p_resumo'] ?></p>
                        <div>
                            <span><i class="fa fa-comment-o"></i> <?= (int) $r['comentario'] ?></span>
                        <a class="btn btn-dark btn-theme-colored btn-sm btn-flat pull-right mt-0" href="<?= $url_post ?>">Ler Mais</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </article>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <nav>
                <ul class="pagination theme-colored xs-pull-center m-0">
                    <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">...</a></li>
                    <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- end main-content -->
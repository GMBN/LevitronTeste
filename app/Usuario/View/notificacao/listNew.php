<?php
if ($rs) {
    ?>
    <li class="header">Há  <?= count($rs) ?> Notificações</li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            <?php foreach ($rs as $r) { 
                $img = !empty($r['u_img'])?$r['u_img']:$this->avatar();
                
                ?>
                <li><!-- start message -->
                    <a href="/usuario/notificacao/redirect/<?= $r['id'] ?>">
                        <div class="pull-left">
                            <img src="<?= $img?>" class="img-circle">
                        </div>
                        <h4>
                            <?php
                            if(!empty($r['u_nome'])){ 
                                echo $r['u_nome'];
                            }else{
                                echo $r['titulo'];
                            }
                                    ?>
                            <!--<small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                        </h4>
                        <p><?= $r['titulo'] ?></p>
                        <p>em: <?= $this->date($r['created']) ?></p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </li>
<?php }else{ ?>
<li class="footer"><a href="#">Não há nehuma notificação</a></li>
<?php 
}
?>
<!--<li class="footer"><a href="#">Ver todas as notificações</a></li>-->
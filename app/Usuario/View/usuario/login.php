<?php
if (empty($redirect)) {
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : null;
}
?>

<!-- Start main-content -->
<div class="main-content">
    <!-- Section: inner-header -->
    <section class="divider parallax layer-overlay overlay-dark-5" data-bg-img="/img/site/login.jpg">
<!--        <div class="container pt-100 pb-20">
             Section Content 
            <div class="section-content">
                <div class="row"> 
                    <div class="col-md-12">
                        <h3 class="title text-white">Acessar Minha Conta</h3>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="container-fluid pt-100">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-white bg-lightest-transparent border-1px p-30 mb-0 p-30 pt-10">
            <h3 class="text-center text-white  mb-20 ">Login</h3>
                    <hr>            
                    <?= $this->msg(); ?>
                    <form name="login-form" method="POST" class="clearfix app-form-login ">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>E-mail</label>
                                <input name="email" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label >Senha</label>
                                <input type="password" name="senha" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="redirect" value="<?= $redirect; ?>" />
                        <!--              <div class="checkbox pull-left mt-15">
                                        <label for="form_checkbox">
                                          <input id="form_checkbox" name="form_checkbox" type="checkbox">
                                          Remember me </label>
                                      </div>-->
                        <div class="form-group  mt-10">
                            <button type="submit" class="btn btn-block btn-dark hvr-sweep-to-right"><i class="fa fa-sign-in"></i> Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

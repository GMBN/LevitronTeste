<?php

$e->on('notFound', function() {
    http_response_code(404);
    echo'não encontrado';
    $view = ROOT . '/app/Base/View/notFound.php';
    $template = ROOT . '/app/Site/View/template/bootstrap.php';
    $service = new \App\Base\Service\View();
    return $service->render([], $view, $template);
});


new \App\Base\Event\View\Seo();
new \App\Base\Event\View\Render();
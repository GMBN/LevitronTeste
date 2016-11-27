<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                 <tr>
                  <th style="width: 10px">#</th>
                  <th>Titulo</th>
                  <th>Conteúdo</th>
                  <th style="width: 40px">Label</th>
                </tr>
                 <?php foreach($result as $r){ ?>
                <tr>
                  <td><?= $r['id'] ?></td>
                  <td><?= $r['titulo'] ?></td>
                  <td><?= $r['conteudo'] ?>
                  <td><a class="btn btn-default btn-sm" href="/admin/blog/post/edit/<?= $r['id'] ?>"><i class="fa fa-pencil"></i> Editar</a></td>
                </tr>
                 <?php } ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>
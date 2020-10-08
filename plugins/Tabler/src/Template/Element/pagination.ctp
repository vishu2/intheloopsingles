<div class="d-flex">
  <ul class="pagination ml-auto">
      <?php
          $this->Paginator->setTemplates([
              'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          $this->Paginator->setTemplates([
              'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          ?>
          <?= $this->Paginator->prev('<< Previous') ?>
          <?php
          $this->Paginator->setTemplates([
              'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
              'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          ?>
          <?= $this->Paginator->numbers() ?>

          <?php
          $this->Paginator->setTemplates([
              'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          $this->Paginator->setTemplates([
              'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
          ]);
          ?>
          <?= $this->Paginator->next('Next >>') ?>
  </ul>
</div>
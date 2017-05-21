<div class="sb-content">
  <div class="tab-navigation">
    <ul role="tablist" class="nav nav-tabs nav-justified">
      <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Chat</a></li>
      <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Todo</a></li>
      <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Settings</a></li>
    </ul>
  </div>
  <div class="tab-panel">
    <div class="tab-content">
      <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
        @include('layouts.partials.right-items.tab-chat')
      </div>
      <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
        @include('layouts.partials.right-items.tab-todo')
      </div>
      <div id="tab3" role="tabpanel" class="tab-pane tab-settings">
        @include('layouts.partials.right-items.tab-settings')
      </div>
    </div>
  </div>
</div>
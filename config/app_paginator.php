<?php

  return [
        'nextActive' => '<li class="next page-item"><a class="page-link" rel="next" href="{{url}}">{{text}}</a></li>',
        'nextDisabled' => '<li class="next disabled page-item"><a class="page-link" href="" onclick="return false;">{{text}}</a></li>',
        'prevActive' => '<li class="prev page-item"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
        'prevDisabled' => '<li class="prev disabled page-item"><a class="page-link" href="" onclick="return false;">{{text}}</a></li>',
        'first' => '<li class="first page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'last' => '<li class="last page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'current' => '<li class="page-item active"><a class="page-link" href="">{{text}}</a></li>',

        'inputContainer' => '<div class="input {{type}}{{required}} d-inline-block">{{content}}</div>',
        'select' => '<select class="form-control form-control-sm" style="width:auto" name="{{name}}"{{attrs}}>{{content}}</select>',

        //'counterRange' => '{{start}} - {{end}} of {{count}}',
        //'counterPages' => '{{page}} of {{pages}}',
        //'ellipsis' => '<li class="ellipsis">&hellip;</li>',
        //'sort' => '<a href="{{url}}">{{text}}</a>',
        //'sortAsc' => '<a class="asc" href="{{url}}">{{text}}</a>',
        //'sortDesc' => '<a class="desc" href="{{url}}">{{text}}</a>',
        //'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
        //'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',
      ];

<?php

Breadcrumbs::register('admin.stocks.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.stocks.management'), route('admin.stocks.index'));
});

Breadcrumbs::register('admin.stocks.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.stocks.index');
    $breadcrumbs->push(trans('menus.backend.stocks.create'), route('admin.stocks.create'));
});

Breadcrumbs::register('admin.stocks.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.stocks.index');
    $breadcrumbs->push(trans('menus.backend.stocks.edit'), route('admin.stocks.edit', $id));
});

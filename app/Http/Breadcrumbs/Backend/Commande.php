<?php

Breadcrumbs::register('admin.commandes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.commandes.management'), route('admin.commandes.index'));
});

Breadcrumbs::register('admin.commandes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.commandes.index');
    $breadcrumbs->push(trans('menus.backend.commandes.create'), route('admin.commandes.create'));
});

Breadcrumbs::register('admin.commandes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.commandes.index');
    $breadcrumbs->push(trans('menus.backend.commandes.edit'), route('admin.commandes.edit', $id));
});

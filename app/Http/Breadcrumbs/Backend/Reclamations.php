<?php

Breadcrumbs::register('admin.reclamations.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.reclamations.management'), route('admin.reclamations.index'));
});

Breadcrumbs::register('admin.reclamations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.reclamations.index');
    $breadcrumbs->push(trans('menus.backend.reclamations.create'), route('admin.reclamations.create'));
});

Breadcrumbs::register('admin.reclamations.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.reclamations.index');
    $breadcrumbs->push(trans('menus.backend.reclamations.edit'), route('admin.reclamations.edit', $id));
});

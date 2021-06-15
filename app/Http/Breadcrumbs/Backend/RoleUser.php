<?php

Breadcrumbs::register('admin.roleusers.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.roleusers.management'), route('admin.roleusers.index'));
});

Breadcrumbs::register('admin.roleusers.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.roleusers.index');
    $breadcrumbs->push(trans('menus.backend.roleusers.create'), route('admin.roleusers.create'));
});

Breadcrumbs::register('admin.roleusers.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.roleusers.index');
    $breadcrumbs->push(trans('menus.backend.roleusers.edit'), route('admin.roleusers.edit', $id));
});

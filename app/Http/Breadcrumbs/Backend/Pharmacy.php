<?php

Breadcrumbs::register('admin.pharmacies.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.pharmacies.management'), route('admin.pharmacies.index'));
});

Breadcrumbs::register('admin.pharmacies.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.pharmacies.index');
    $breadcrumbs->push(trans('menus.backend.pharmacies.create'), route('admin.pharmacies.create'));
});

Breadcrumbs::register('admin.pharmacies.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.pharmacies.index');
    $breadcrumbs->push(trans('menus.backend.pharmacies.edit'), route('admin.pharmacies.edit', $id));
});

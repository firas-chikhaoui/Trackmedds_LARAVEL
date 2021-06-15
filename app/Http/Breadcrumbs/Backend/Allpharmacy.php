<?php

Breadcrumbs::register('admin.allpharmacies.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.allpharmacies.management'), route('admin.allpharmacies.index'));
});

Breadcrumbs::register('admin.allpharmacies.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.allpharmacies.index');
    $breadcrumbs->push(trans('menus.backend.allpharmacies.create'), route('admin.allpharmacies.create'));
});

Breadcrumbs::register('admin.allpharmacies.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.allpharmacies.index');
    $breadcrumbs->push(trans('menus.backend.allpharmacies.edit'), route('admin.allpharmacies.edit', $id));
});

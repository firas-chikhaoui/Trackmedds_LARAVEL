<?php

Breadcrumbs::register('admin.mypharmacies.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.mypharmacies.management'), route('admin.mypharmacies.index'));
});

Breadcrumbs::register('admin.mypharmacies.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.mypharmacies.index');
    $breadcrumbs->push(trans('menus.backend.mypharmacies.create'), route('admin.mypharmacies.create'));
});

Breadcrumbs::register('admin.mypharmacies.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.mypharmacies.index');
    $breadcrumbs->push(trans('menus.backend.mypharmacies.edit'), route('admin.mypharmacies.edit', $id));
});

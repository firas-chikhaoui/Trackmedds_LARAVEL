<?php

Breadcrumbs::register('admin.reclamations.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.reclamations.management'), route('admin.reclamations.index'));
});

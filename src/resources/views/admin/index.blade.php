@extends('core::admin.master')

@section('title', __('files::global.name'))

@section('content')

<div ng-app="typicms" ng-cloak ng-controller="ListController">

    <a id="uploaderAddButton" href="#" class="btn-add" title="@lang('files::global.New')">
        <i class="fa fa-plus-circle"></i><span class="sr-only">@lang('files::global.New')</span>
    </a>

    <h1>@lang('files::global.name')</h1>

    <div class="dropzone" dropzone id="dropzone">
        <div class="dz-message">@lang('files::global.Click or drop files to upload')</div>
    </div>

    <div class="btn-toolbar">
        @include('core::admin._lang-switcher-for-list')
    </div>

    <div class="table-responsive">

        <table st-table="displayedModels" st-safe-src="models" st-order st-filter class="table table-condensed table-main">
            <thead>
                <tr>
                    <th class="delete"></th>
                    <th class="edit"></th>
                    <th st-sort="created_at" st-sort-default="reverse" class="created_at st-sort">{{ __('Date') }}</th>
                    <th st-sort="type" class="type st-sort">{{ __('Type') }}</th>
                    <th class="image">{{ __('Image') }}</th>
                    <th st-sort="file" class="title st-sort">{{ __('Filename') }}</th>
                    <th st-sort="alt_attribute_translated" class="selected st-sort">{{ __('Alt attribute') }}</th>
                    <th st-sort="width" class="width st-sort">{{ __('Width') }}</th>
                    <th st-sort="height" class="width st-sort">{{ __('Height') }}</th>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>
                        <input st-search="file" class="form-control input-sm" placeholder="@lang('Search')…" type="text">
                    </td>
                    <td>
                        <input st-search="alt_attribute_translated" class="form-control input-sm" placeholder="@lang('Search')…" type="text">
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="model in displayedModels">
                    <td typi-btn-delete action="delete(model, model.file)"></td>
                    <td>
                        @include('core::admin._button-edit', ['module' => 'files'])
                    </td>
                    <td>@{{ model.created_at | dateFromMySQL:'short' }}</td>
                    <td>@{{ model.type }}</td>
                    <td ng-switch="model.type">
                        <img ng-switch-when="i" ng-src="@{{ model.thumb_src }}" alt="@{{ model.alt_attribute_translated }}">
                        <span class="fa fa-fw fa-file-text-o" ng-switch-default></span>
                    </td>
                    <td>@{{ model.file }}</td>
                    <td>@{{ model.alt_attribute_translated }}</td>
                    <td>@{{ model.width }}</td>
                    <td>@{{ model.height }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9" typi-pagination></td>
                </tr>
            </tfoot>
        </table>

    </div>

</div>

@endsection

<div ng-app="typicms">
    @include('files::admin._filemanager', ['options' => ['dropzoneHidden', 'multiple', 'modal']])
    @include('files::admin.files')
</div>
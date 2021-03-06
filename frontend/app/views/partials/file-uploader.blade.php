<div ng-controller="paperworkFileUploadController" class="file-upload-wrapper padding-twenty" uploader="uploader" nv-file-drop="" uploader="uploader" filters="queueLimit, customFilter">

    <div class="file-uploader">
        @if ($uploadEnabled)
        <div class="file-upload-dropzone" over-class="file-upload-dropzone-active" nv-file-over="" uploader="uploader">
            <span><i class="fa fa-upload"></i> [[Lang::get('keywords.upload_document')]]</span>
        </div>
        @endif

        <table class="table" ng-show="(uploader.queue.length > 0 || fileList.length > 0)">
            <thead>
                <tr>
                    <th class="status-th"></th>
                    <th>Name</th>
                    @if ($actionsEnabled)
                    <th ng-show="uploader.isHTML5"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in fileList">
                    <td class="status-td">
                        <i class="fa fa-file-o"></i>
                    </td>
                    <td><a href="#"><strong>{{ item.filename }}</strong></a></td>
                    @if ($actionsEnabled)
                    <td>
                        <a class="">[[Lang::get('keywords.insert')]]</a>
                        &nbsp;|&nbsp;
                        <a class="">[[Lang::get('keywords.delete')]]</a>
                    </td>
                    @endif
                </tr>
                <tr ng-repeat="item in uploader.queue">
                    <td class="status-td">
                        <span ng-show="item.isSuccess"><i class="fa fa-check"></i></span>
                        <span ng-show="item.isCancel"><i class="fa fa-times"></i></i></span>
                        <span ng-show="item.isError"><i class="fa fa-exclamation-triangle"></i></i></span>
                        <span ng-show="item.isUploading"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                    </td>
                    <td><strong>{{ item.file.name }}</strong></td>
                    <td ng-show="uploader.isHTML5">
                        <div class="progress" style="margin-bottom: 0;">
                            <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        @if ($uploadEnabled)
        <div class="text-align-right">
            <button type="button" class="btn btn-success" ng-click="uploader.uploadAll()" ng-hide="uploader.getNotUploadedItems().length < 1 || uploader.isUploading">
                <i class="fa fa-upload"></i> [[Lang::get('keywords.upload')]]
            </button>
            <button type="button" class="btn btn-warning" ng-click="uploader.cancelAll()" ng-hide="!uploader.isUploading">
                <i class="fa fa-times"></i> [[Lang::get('keywords.cancel')]]
            </button>
            <button type="button" class="btn btn-danger" ng-click="uploader.clearQueue()" ng-hide="!uploader.queue.length || uploader.isUploading">
                <i class="fa fa-trash-o"></i> [[Lang::get('keywords.remove')]]
            </button>
        </div>
        @endif

    </div>

</div>
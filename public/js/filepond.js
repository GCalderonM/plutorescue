/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/assets/js/filepond.js ***!
  \*****************************************/
FilePond.registerPlugin(FilePondPluginFileEncode, FilePondPluginFileValidateType, FilePondPluginImageExifOrientation, FilePondPluginImagePreview, FilePondPluginImageCrop, FilePondPluginImageResize, FilePondPluginImageTransform, FilePondPluginFilePoster); // USER PROFILE IMAGE

if (user_img !== 'undefined') {
  FilePond.create(document.querySelector('input[id="avatar"]'), {
    labelIdle: "Arrastra & suelta tu imagen o <span class=\"filepond--label-action\">B\xFAscala</span>",
    imagePreviewHeight: 190,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleProgressIndicatorPosition: 'center bottom',
    styleButtonRemoveItemPosition: 'center bottom',
    styleButtonProcessItemPosition: 'center bottom',
    files: [{
      source: '12345',
      options: {
        type: 'local',
        file: {
          name: user_img
        },
        metadata: {
          poster: user_img
        }
      }
    }]
  });
} else {
  FilePond.create(document.querySelector('input[id="avatar"]'), {
    labelIdle: "Arrastra & suelta tu imagen o <span class=\"filepond--label-action\">B\xFAscala</span>",
    imagePreviewHeight: 190,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleProgressIndicatorPosition: 'center bottom',
    styleButtonRemoveItemPosition: 'center bottom',
    styleButtonProcessItemPosition: 'center bottom'
  });
}

FilePond.setOptions({
  server: {
    url: '/dashboard/upload',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }
});
/******/ })()
;
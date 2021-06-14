FilePond.registerPlugin(
    FilePondPluginFileEncode,
    FilePondPluginImagePreview,
    FilePondPluginFilePoster
);

// ANNOUNCE IMAGES
if (announces_images !== 'undefined') {
    if (announces_images.length > 0) {
        FilePond.create(
            document.querySelector('input[id="announce_image1"]'),
            {
                labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
                imagePreviewHeight: '120px',
                files: [{
                    source: '12345',
                    options: {
                        type: 'local',
                        file: {
                            name: announces_images[0].split("/")[3],
                        },
                        metadata: {
                            poster: announces_images[0]
                        }
                    }
                }],
            },
        );
    } else {
        FilePond.create(
            document.querySelector('input[id="announce_image1"]'),
            {
                labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
                imagePreviewHeight: '120px',
            },
        );
    }

    if (announces_images.length > 1) {
        FilePond.create(
            document.querySelector('input[id="announce_image2"]'),
            {
                labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
                imagePreviewHeight: '120px',
                files: [{
                    source: '12345',
                    options: {
                        type: 'local',
                        file: {
                            name: announces_images[1].split("/")[3],
                        },
                        metadata: {
                            poster: announces_images[1]
                        }
                    }
                }]
            },
        );
    } else {
        FilePond.create(
            document.querySelector('input[id="announce_image2"]'),
            {
                labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
                imagePreviewHeight: '120px',
            },
        );
    }

    if(announces_images.length > 2) {
        FilePond.create(
            document.querySelector('input[id="announce_image3"]'),
            {
                labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
                imagePreviewHeight: '120px',
                files: [{
                    source: '12345',
                    options: {
                        type: 'local',
                        file: {
                            name: announces_images[2].split("/")[3],
                        },
                        metadata: {
                            poster: announces_images[2]
                        }
                    }
                }]
            },
        );
    } else {
        FilePond.create(
            document.querySelector('input[id="announce_image3"]'),
            {
                labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
                imagePreviewHeight: '120px',
            },
        );
    }

    if (announces_images.length > 3) {
        FilePond.create(
            document.querySelector('input[id="announce_image4"]'),
            {
                labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
                imagePreviewHeight: '120px',
                files: [{
                    source: '12345',
                    options: {
                        type: 'local',
                        file: {
                            name: announces_images[3].split("/")[3],
                        },
                        metadata: {
                            poster: announces_images[3]
                        }
                    }
                }]
            },
        );
    } else {
        FilePond.create(
            document.querySelector('input[id="announce_image4"]'),
            {
                labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
                imagePreviewHeight: '120px',
            },
        );
    }
} else {
    FilePond.create(
        document.querySelector('input[id="announce_image1"]'),
        {
            labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
            imagePreviewHeight: '120px',
        },
    );

    FilePond.create(
        document.querySelector('input[id="announce_image2"]'),
        {
            labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
            imagePreviewHeight: '120px',
        },
    );

    FilePond.create(
        document.querySelector('input[id="announce_image3"]'),
        {
            labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
            imagePreviewHeight: '120px',
        },
    );

    FilePond.create(
        document.querySelector('input[id="announce_image4"]'),
        {
            labelIdle: `Arrastra & suelta tu imagen o <span class="filepond--label-action">Búscala</span>`,
            imagePreviewHeight: '120px',
        },
    );
}

$('#announce_image1').on('FilePond:removefile', function(e) {
    $('#announce_image1Remove').val(0);
});

$('#announce_image2').on('FilePond:removefile', function(e) {
    $('#announce_image2Remove').val(0);
});

$('#announce_image3').on('FilePond:removefile', function(e) {
    $('#announce_image3Remove').val(0);
});

$('#announce_image4').on('FilePond:removefile', function(e) {
    $('#announce_image4Remove').val(0);
});

// HEADERS FOR UPLOAD SERVER
FilePond.setOptions({
    server: {
        url: '/dashboard/upload',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
});

<style>
    .fixed-button {
        background: #fff;
        border-radius: 20%;
        bottom: 30px;
        font-size: 1.25rem;
        z-index: 990;
        box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.16);
        cursor: pointer;
    }

    .fixed-plugin {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        bottom: 20px;
        position: sticky;
        width: 100%;
    }
</style>

<div class="fixed-plugin mx-auto">
    <div class="fixed-button">
        @if (Route::currentRouteName() === 'gallery')
        <a class="text-white px-2 py-2 btnbg" href="{{ route('home', ['uid' => session('uidd')]) }}">
            <i class="fa fa-home py-2" aria-hidden="true"></i> Home
        </a>
        @else
        <a class="text-white px-2 py-2 btnbg" href="{{ route('gallery', ['uid' => session('uidd')]) }}">
            <i class="fa fa-images py-2" aria-hidden="true"></i> Gallery
        </a>
        @endif
    </div>
    <div class="fixed-button">
        <form id="upload-form" method="post" action="{{ route('upload') }}" enctype="multipart/form-data" style="margin: 0;">
            @csrf
            <input type="file" name="images[]" id="file-input" multiple style="display: none;" />
            <input type="hidden" name="tag" id="tag" value="pre-wedding">
            <label for="file-input" class="btn text-white px-2 py-2 upload-button btnbg" style="margin: 0;">
                <i class="fa fa-upload py-2" aria-hidden="true"></i> Upload
            </label>
        </form>
        <div class="progress mt-2" style="display: none;">
            <div id="upload-progress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="fixed-button">
        <a class=" text-white  px-2 py-2 btnbg">
            <i class="fa fa-cog py-2" aria-hidden="true"> </i>
            More
        </a>
    </div>
</div>

<!-- Modal for entering guest name -->
<div id="guestNameModal" style="display: none;">
    <div style="background: #fff; padding: 20px; border-radius: 5px; width: 300px; margin: auto; position: fixed; top: 20%; left: 50%; transform: translate(-50%, -20%); z-index: 1000;">
        <h5>Please enter your name:</h5>
        <input type="text" id="guestNameInput" class="form-control mb-2" placeholder="Your Name" />
        <button id="saveGuestName" class="btn btn-primary btn-sm">Save</button>
    </div>
    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;" onclick="hideModal()"></div>
</div>

<div id="response-modal" class="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close modal-close" aria-label="Close"></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary modal-close">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Helper function to get a cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Helper function to set a cookie
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = `${name}=${value};path=/;expires=${date.toUTCString()}`;
    }

    window.addEventListener('load', function() {
        // Show modal
        function showModal() {
            $('#guestNameModal').fadeIn();
        }

        // Hide modal
        function hideModal() {
            $('#guestNameModal').fadeOut();
        }

        // Handle Upload Button Click
        $('.upload-button').on('click', function(event) {
            const guestName = getCookie('guest_name');
            if (!guestName) {
                event.preventDefault(); // Stop the default file input click
                showModal(); // Show modal to enter the name
            }
        });

        // Handle Save Name Button Click
        $('#saveGuestName').on('click', function() {
            const guestName = $('#guestNameInput').val().trim();
            if (guestName) {
                setCookie('guest_name', guestName, 30); // Save the name in a cookie for 30 days
                hideModal();
                $('#file-input').trigger('click'); // Trigger file input click
            } else {
                alert('Please enter your name.');
            }
        });

        $('#file-input').on('change', function() {
            const files = this.files;
            if (files.length > 0) {
                uploadFiles(files);
            }
        });

        // Close the modal when needed
        $('.modal-close').on('click', function() {
            const modal = $('#response-modal');
            modal.removeClass('show').fadeOut();
        });

        function uploadFiles(files) {
            const formData = new FormData();
            const $progressBar = $('.progress');
            const $progress = $('#upload-progress');

            // Append files to the formData
            for (let i = 0; i < files.length; i++) {
                formData.append('images[]', files[i]);
            }

            // Get the value of the 'tag' input field
            const tagValue = $('#tag').val();
            formData.append('tag', tagValue); // Add the tag value to the request

            // Show progress bar
            $progressBar.show();
            $progress.css('width', '0%');

            // Make an AJAX request
            $.ajax({
                url: "{{ route('upload') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    const xhr = new window.XMLHttpRequest();
                    // Track upload progress
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            const percentComplete = Math.round((e.loaded / e.total) * 100);
                            $progress.css('width', percentComplete + '%')
                                .attr('aria-valuenow', percentComplete)
                                .text(percentComplete + '%');
                        }
                    });
                    return xhr;
                },
                success: function() {
                    const modal = $('#response-modal');
                    modal.find('.modal-title').text('Upload Successful');
                    modal.find('.modal-body').html('Your files have been uploaded successfully!');
                    modal.addClass('show').fadeIn();

                    modal.on('hidden.bs.modal', function() {
                        location.reload(); // Refresh the page
                    });
                },
                error: function() {
                    const modal = $('#response-modal');
                    modal.find('.modal-title').text('Upload Failed');
                    modal.find('.modal-body').html('An error occurred during the upload. Please try again.');
                    modal.addClass('show').fadeIn();
                },
                complete: function() {
                    // Reset progress bar
                    $progressBar.hide();
                    $progress.css('width', '0%').text('');
                }
            });
        }
    });
</script>
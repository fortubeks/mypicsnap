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
        @if (Request::is('gallery'))
        <a class="text-white px-2 py-2 btnbg" href="{{ route('home') }}">
            <i class="fa fa-home py-2" aria-hidden="true"></i> Home
        </a>
        @else
        <a class="text-white px-2 py-2 btnbg" href="{{ route('gallery') }}">
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

    // Show modal
    function showModal() {
        document.getElementById('guestNameModal').style.display = 'block';
    }

    // Hide modal
    function hideModal() {
        document.getElementById('guestNameModal').style.display = 'none';
    }

    // Handle Upload Button Click
    document.querySelector('.upload-button').addEventListener('click', function(event) {
        const guestName = getCookie('guest_name');
        if (!guestName) {
            event.preventDefault(); // Stop the default file input click
            showModal(); // Show modal to enter the name
        }
    });

    // Handle Save Name Button Click
    document.getElementById('saveGuestName').addEventListener('click', function() {
        const guestName = document.getElementById('guestNameInput').value.trim();
        if (guestName) {
            setCookie('guest_name', guestName, 30); // Save the name in a cookie for 30 days
            hideModal();
            document.getElementById('file-input').click(); // Trigger file input click
        } else {
            alert('Please enter your name.');
        }
    });

    document.getElementById('file-input').addEventListener('change', function(event) {
        const files = event.target.files;
        if (files.length > 0) {
            uploadFiles(files);
        }
    });

    function uploadFiles(files) {
        const formData = new FormData();
        const progressBar = document.querySelector('.progress');
        const progress = document.getElementById('upload-progress');

        // Append files to the formData
        for (let i = 0; i < files.length; i++) {
            formData.append('images[]', files[i]);
        }

        // Show progress bar
        progressBar.style.display = 'block';
        progress.style.width = '0%';

        // Make an AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open('POST', "{{ route('upload') }}", true);

        // Add CSRF token to the request header
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

        // Track upload progress
        xhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
                const percentComplete = Math.round((e.loaded / e.total) * 100);
                progress.style.width = percentComplete + '%';
                progress.setAttribute('aria-valuenow', percentComplete);
                progress.innerHTML = percentComplete + '%';
            }
        });

        // Handle response
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert('Upload Successful!');
                window.location.reload();
            } else {
                alert('Error occurred during upload.');
            }
            // Reset progress bar
            progressBar.style.display = 'none';
            progress.style.width = '0%';
            progress.innerHTML = '';
        };

        // Handle errors
        xhr.onerror = function() {
            alert('Upload failed.');
            progressBar.style.display = 'none';
        };

        // Send form data
        xhr.send(formData);
    }
</script>
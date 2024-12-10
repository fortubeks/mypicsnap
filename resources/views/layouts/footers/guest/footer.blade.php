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
        <a class=" text-dark  px-2 py-2" href="{{route('gallery')}}">
            <i class="fa fa-images py-2" aria-hidden="true"> </i>
            Gallery
        </a>
    </div>
    <div class="fixed-button">
        <form id="upload-form" method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="images[]" id="file-input" multiple style="display: none;" />
            <input type="hidden" name="tag" id="tag" value="pre-wedding">
            <label for="file-input" class="btn text-dark px-2 py-2">
                <i class="fa fa-upload py-2" aria-hidden="true"></i> Upload
            </label>
        </form>
        <div class="progress mt-2" style="display: none;">
            <div id="upload-progress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="fixed-button">
        <a class=" text-dark  px-2 py-2">
            <i class="fa fa-cog py-2" aria-hidden="true"> </i>
            More
        </a>
    </div>
</div>

<script>
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
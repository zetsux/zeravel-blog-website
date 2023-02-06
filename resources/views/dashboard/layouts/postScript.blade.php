<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/([^\w ]|_)/g, '').replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/convertTo-Slug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImg() {
        const image = document.querySelector('#image');
        const preview = document.querySelector('.img-preview');

        preview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(e) {
            preview.src = e.target.result;
        }
    }
</script>
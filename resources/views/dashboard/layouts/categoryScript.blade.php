<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener("keyup", function() {
        let preslug = name.value;
        preslug = preslug.replace(/([^\w ]|_)/g, '').replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });

    name.addEventListener('change', function() {
        fetch('/dashboard/categories/convertTo-Slug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });
</script>
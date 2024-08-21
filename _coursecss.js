document.addEventListener("DOMContentLoaded", function() {
    fetch('_phpcourse.php')
        .then(response => response.json())
        .then(data => {
            const youtubeVideos = document.getElementById('youtubeVideos');
            data.forEach((video, index) => {
                const activeClass = index === 0 ? 'active' : '';
                const videoHTML = `
                    <div class="carousel-item ${activeClass}">
                        <img src="${video.thumbnail}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>${video.title}</h5>
                        </div>
                    </div>
                `;
                youtubeVideos.innerHTML += videoHTML;
            });
        })
        .catch(error => console.error('Error fetching videos:', error));
});

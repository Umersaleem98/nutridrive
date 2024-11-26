<style>
    /* Apply fade-in effect */
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.fade-in {
    animation: fadeIn 2s ease-in-out;
}

/* Apply filter and overlay to the image */
.site-blocks-cover {
    position: relative;
    background-image: url('templates/images/hero_1.jpg');
    height: 60vh;
    background-size: cover;
    background-position: center center;
    filter: brightness(0.8) contrast(1.2); /* Adjust brightness and contrast */
    transition: filter 0.3s ease-in-out; /* Smooth filter transition */
}

.site-blocks-cover:hover {
    filter: brightness(1) contrast(1); /* Adjust filter on hover (optional) */
}

.site-blocks-cover::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.212); /* Semi-transparent black overlay */
    z-index: 1; /* Make sure overlay is above the image */
}

.site-blocks-cover .container {
    position: relative;
    z-index: 2; /* Make sure the text is above the overlay */
}

/* Optional: Adjust the opacity of text */
.site-block-cover-content h1, .site-block-cover-content h2 {
    opacity: 0.9;
}

</style>

<div class="site-blocks-cover fade-in" style="background-image: url('templates/images/hero_1.jpg'); height: 60vh; background-size: cover; background-position: center center;">
    <div class="container" style="height: 100%;">
        <div class="row" style="height: 100%;">
            <div class="col-lg-7 mx-auto order-lg-2 align-self-center" style="height: 100%;">
                <div class="site-block-cover-content text-center" style="height: 100%; display: flex; flex-direction: column; justify-content: center;">
                    <h1 class="text-fade" style="font-size: 2.5rem; font-weight: bold; color:#ffffff;">Welcome To NutriDrive</h1>
                    <h2 class="sub-title" style="font-size: 1.5rem; color:#ffffff;">Steering towards healthier lifestyle!</h2>
                    <p>
                        <a href="{{ url('store') }}" class="btn btn-danger px-5 py-3" style="font-size: 1.2rem;">Shop Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

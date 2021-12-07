@include('partials.main_header')

@include('partials.main_navbar')


    <header >

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> -->
                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
        <div class="carousel-inner">
       
            <div class="carousel-item active">
            <img class="d-block w-100" src="https://source.unsplash.com/8yS04veb1TQ/1400x400" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="https://source.unsplash.com/H9t723yPjYI/1400x400" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>



    </header>


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Engaging Background Images</h2>
                <p class="lead">The background images used in this template are sourced from Unsplash and are open source and free to use.</p>
                <p class="mb-0">I can't tell you how many people say they were turned off from science because of a science teacher that completely sucked out all the inspiration and enthusiasm they had for the course.</p>

            </div>
        </div>
    </div>

        







@include('partials.main_footer')

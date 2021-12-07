@include('partials.main_header')

@include('partials.main_navbar')

<div class="container">
    <div class="row">
        

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold  my-5">Contact us</h2>
    <!--Section description-->
    <p class=" w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within matter of hours to help you.</p>

    <ul class="list-unstyled">
    <li><i class="fa fa-map-marker fa-2x"></i> General Santos Ave, Lower Bicutan, Taguig, 1631 Metro Manila</li>
    <li><i class="fa fa-phone mt-4 fa-2x"></i> +(+632) 8376141</li>
    <li><i class="fa fa-envelope mt-4 fa-2x"></i></li>

    </ul>     

        <div class="row">


            <!--Grid column-->
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1182.1119372246994!2d121.04982774442091!3d14.48802190505541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf13f01eb803%3A0x232e629cdd251cc7!2sNational+Research+Council+of+the+Philippines+(NRCP)!5e0!3m2!1sen!2sph!4v1539051012355" width="500" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>


            <!--Grid column-->
            <div class="col-md-6">
                <form action="#" id="form-contact" name="form-contact">

            <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text"id="contact_name" name="contact_name" class="form-control required">

                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="contact_email" name="contact_email" class="form-control required">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="contact_subject" name="contact_subject" class="form-control required">
                                    <label for="subject" class="">Subject</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="contact_message" name="contact_message" rows="2" class="form-control md-textarea required"></textarea>
                                <label for="message">Your message</label>
                            </div>

                        </div>

                

                        <div class="text-center text-md-left">
                            <button id="submit-contact-us" name="submit-contact-us" class="btn btn-success">Submit</button>
                        </div>
                
                    </div> 

                </form>



            </div>





        </div>


    <!--Grid column-->
    </div>
</div>

@include('partials.main_footer')
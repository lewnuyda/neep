@include('partials.admin_header')
<style type="text/css">
/*
 * Specific styles of signin component
 */
/*
 * General styles
 */


.card-container.card {
  
    padding: 40px 40px;
}

</style>

<div class="container">
    <hr>
    <h2>NRCP Expert Engagement Admin</h2>
    <div class="card card-container">

        <form  id="form-neep-expert-response"  name="form-neep-expert-response"  method="POST">

            {{ csrf_field() }}
            <div class="form-group">
                <label for="neep_req_inst_name">Name of Institution:</label>
                <strong>{{ $neep_req_inst_name }}</strong>
            </div>

            <div class="form-group">
                <label for="neep_expert_remarks">Remarks:</label>
                <textarea class="form-control" id="neep_expert_remarks" name="neep_expert_remarks" rows="3"></textarea>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="neep_expert_response" id="neep_expert_response" value="1" >
                <label class="form-check-label" for="neep_expert_response">
                    Accept
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="neep_expert_response" id="neep_expert_response" value="2">
                <label class="form-check-label" for="neep_expert_response">
                    Decline
                </label>
            </div>
            <hr>
            <div class="form-group">
                <input type="hidden" id="neep_expert_response_id"   name="neep_expert_response_id" value="{{ $neep_expert_response_id }}">


                <button id="btn-save-neep-expert-response" name="save_neep_expert_response" class="btn btn-success">Submit</button>
            </div>
            

        </form>
       
    </div><!-- /card-container -->
</div><!-- /container -->






    </body>

</html>

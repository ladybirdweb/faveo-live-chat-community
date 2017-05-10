<?php 
//$info = $problem->general();
$title ="";
$solution = "";
if ($problem->getGeneralByIdentifier('solution-title')) {
    $title = $problem->getGeneralByIdentifier('solution-title')->value;
}
if ($problem->getGeneralByIdentifier('solution')) {
    $solution = $problem->getGeneralByIdentifier('solution')->value;
}
?>
<div class="modal fade" id="solution{{$problem->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Solution</h4>
                {!! Form::open(['url'=>'service-desk/general/'.$problem->id.'/sd_problem','files'=>true]) !!}
            </div>
            <div class="modal-body">
                <!-- Form  -->
                <div class="row">
                    <div class="col-md-12">
                       {!! Form::label('solution-title','Solution Title') !!}
                       {!! Form::text('solution-title',$title,['class'=>'form-control']) !!}
                       {!! Form::hidden('identifier','solution') !!}
                    </div>
                    <div class="col-md-12">
                       {!! Form::label('solution','Solution') !!}
                       {!! Form::textarea('solution',$solution,['class'=>'form-control','id'=>'solution']) !!}
                    </div>
                    
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="{{Lang::get('lang.save')}}">
                {!! Form::close() !!}
            </div>
            <!-- /Form -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(function () {
        $("#solution").wysihtml5();
    });
</script>
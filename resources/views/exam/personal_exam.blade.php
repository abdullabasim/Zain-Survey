@extends('layouts.default')
@section('title')
English Exam
@endsection
@section('css')
   <style>

       label.btn span {
           font-size: 1.5em ;
       }

       label input[type="radio"] ~ i.fa.fa-circle-o{
           color: #0a0a0a;    display: inline;
       }
       label input[type="radio"] ~ i.fa.fa-dot-circle-o{
           display: none;
       }
       label input[type="radio"]:checked ~ i.fa.fa-circle-o{
           display: none;
       }
       label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
           color: #5cb85c;    display: inline;
       }
       label:hover input[type="radio"] ~ i.fa {
           color: #5cb85c;
       }

       label input[type="checkbox"] ~ i.fa.fa-square-o{
           color: #0a0a0a;    display: inline;
       }
       label input[type="checkbox"] ~ i.fa.fa-check-square-o{
           display: none;
       }
       label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
           display: none;
       }
       label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
           color: #5cb85c;    display: inline;
       }
       label:hover input[type="checkbox"] ~ i.fa {
           color: #5cb85c;
       }

       div[data-toggle="buttons"] label.active{
           color: #0a0a0a;
       }

       div[data-toggle="buttons"] label {
           display: inline-block;
           padding: 6px 12px;
           margin-bottom: 0;
           font-size: 14px;
           font-weight: normal;
           line-height: 2em;
           text-align: left;
           white-space: nowrap;
           vertical-align: top;
           cursor: pointer;

           border: 0px solid
           #0a0a0a;
           border-radius: 3px;
           color: #0a0a0a;
           -webkit-user-select: none;
           -moz-user-select: none;
           -ms-user-select: none;
           -o-user-select: none;
           user-select: none;
       }

       div[data-toggle="buttons"] label:hover {
           color: #5cb85c;
       }

       div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
           -webkit-box-shadow: none;
           box-shadow: none;
       }



   </style>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>English Exam</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('userExam')}}"> <i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Personal Exam</li>
            </ol>


        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                @include('alertNotifications/alertNotifications')
                <div id="errorsJs"></div>

                <!-- /.box-header -->
                    <div class="box-body" id="item">


                        <form method="post" action="{{url('personalExamAnswer')}}">
                            {{ csrf_field() }}
                        <h2 style=" display: inline;"><b style=" display: inline;">A/<u style=" display: inline;">Personal question Section </u>: </b></h2><h4 style=" display: inline;">Select the Correct Answer</h4>
                       <input type="hidden" name="dumy" value="{{$ex}}">
                        <br>
                        <br>
                        @foreach($personalExamQuestions as $key => $personalExamQuestion)

                                @if(@$personalExamQuestion->personalQuestion->personalQuestionType-> id == 1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-10">
                                        <h4 style="font-weight: bold;">Q{{$counter++}}: {{@$personalExamQuestion->personalQuestion->title}}</h4>

                                        <div class="btn-group btn-group-vertical" data-toggle="buttons">
                                            <label class="btn active">
                                                <input required type="radio" value= "{{@$personalExamQuestion->personalQuestion->personalQuestionAnswer->answer1}}" name='personal[{{@$personalExamQuestion->personal_question_id}}]' ><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span>  {{@$personalExamQuestion->personalQuestion->personalQuestionAnswer->answer1}}</span>
                                            </label>
                                            <label class="btn">
                                                <input type="radio" value= "{{@$personalExamQuestion->personalQuestion->personalQuestionAnswer->answer2}}"  name='personal[{{@$personalExamQuestion->personal_question_id}}]'><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> {{@$personalExamQuestion->personalQuestion->personalQuestionAnswer->answer2}}</span>
                                            </label>
                                            <label class="btn">
                                                <input type="radio" value= "{{@$personalExamQuestion->personalQuestion->personalQuestionAnswer->answer3}}" name='personal[{{@$personalExamQuestion->personal_question_id}}]'><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> {{@$personalExamQuestion->personalQuestion->personalQuestionAnswer->answer3}}</span>
                                            </label>
                                            <label class="btn">
                                                <input type="radio" value= "{{@$personalExamQuestion->personalQuestion->personalQuestionAnswer->answer4}}" name='personal[{{@$personalExamQuestion->personal_question_id}}]'><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> {{@$personalExamQuestion->personalQuestion->personalQuestionAnswer->answer4}}</span>
                                            </label>
                                        </div>
                                    </div>

                                        </div>
                                    </div>
                                @elseif(@$personalExamQuestion->personalQuestion->personalQuestionType-> id == 3)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-10">
                                                <h4 style="font-weight: bold;">Q{{$counter++}}: {{@$personalExamQuestion->personalQuestion->title}}</h4>

                                                <div class="btn-group btn-group-vertical" data-toggle="buttons">
                                                    <textarea name="personTextArea[{{@$personalExamQuestion->personal_question_id}}]" class="form-control" rows="5" cols="100" placeholder="Enter Answer" required></textarea>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                 @elseif(@$personalExamQuestion->personalQuestion->personalQuestionType-> id == 2)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-10">
                                                <h4 style="font-weight: bold;">Q{{$counter++}}: {{@$personalExamQuestion->personalQuestion->title}}</h4>

                                                <div class="btn-group btn-group-vertical" data-toggle="buttons">
                                                    <label class="btn active">
                                                        <input required type="radio" value= "{{@$personalExamQuestion->personalQuestion->personalAnswerType->answer1}}" name='personal2[{{@$personalExamQuestion->personal_question_id}}]' ><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span>  {{@$personalExamQuestion->personalQuestion->personalAnswerType->answer1}}</span>
                                                    </label>
                                                    <label class="btn">
                                                        <input type="radio" value= "{{@$personalExamQuestion->personalQuestion->personalAnswerType->answer2}}"  name='personal2[{{@$personalExamQuestion->personal_question_id}}]'><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> {{@$personalExamQuestion->personalQuestion->personalAnswerType->answer2}}</span>
                                                    </label>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                        @endforeach

                        <br>
                        <br>



                                <div class="col-md-2  col-md-offset-5 form-group" >

                                    <button   type="submit" class="btn btn-block btn-success ">Save Answers  <span  id="plus"    class="glyphicon glyphicon-floppy-open">  </span></button>


                                </div>


                        </form>
                    </div>




            </div>

        </section>
        <!-- /.content -->

        <div class="modal fade" id="myModalDelete" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Grammar Question</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you Sure you want to delete this Grammar Question?</p>
                        <div style="margin-left: 70px">
                            <button type="button" class="btn btn-info btn-yes" data-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


    </div>

@section('js')

    <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- DataTables -->


    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>



@endsection
@endsection
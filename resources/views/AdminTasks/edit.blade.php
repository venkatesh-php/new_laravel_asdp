@extends('layouts.app')
 

@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit New task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('AdminTasks.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($admin_tasks, ['method' => 'PATCH','route' => ['AdminTasks.update', $admin_tasks->id]]) !!}
    <div class="row">


    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Work Nature:</strong>
        {!! Form::select('worknature', [
        'Task' => ['TASK' => 'Task'],
        'Assignment' => ['ASSIGNMENT' => 'Assignment'],
        'Presentation' => ['PRESENTATION' => 'Presentation'],
        'WorkShop' => ['WORKSHOP' => 'WorkShop'],
        'Project' => ['PROJECT' => 'Project']],
        array('class' => 'form-control')) !!}
        

        
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>On Skills or Language:</strong>
        {!! Form::select('onskills', [
        'General' => ['General' => 'General'],
        'HTML' => ['HTML' => 'HTML'],
        'CSS' => ['CSS' => 'CSS'],
        'JAVASCRIPT' => ['JAVASCRIPT' => 'JAVASCRIPT'],
        'PHP' => ['PHP' => 'PHP'],
        'JAVA' => ['JAVA' => 'JAVA'],
        'C' => ['C' => 'C'],
        'C++' => ['C++' => 'C++'],
        'Python' => ['PYTHON' => 'Python'],
        'Android' => ['Android' => 'Android'],
        'Embedded' => ['Embedded' => 'Embedded'],
        'Concept' => ['concept' => 'Concept']],
        array('class' => 'form-control')) !!}
        
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Work Title:</strong>
        {!! Form::text('worktitle', null, array('placeholder' => 'Work Title','class' => 'form-control')) !!}
    </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Work Description:</strong>
        {!! Form::text('workdescription', null, array('placeholder' => 'Work Description','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>What In IT For Me:</strong>
        {!! Form::text('whatinitforme', null, array('placeholder' => 'What In IT For Me','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Reserved Credits For:</strong><br>
        <strong>User:</strong>
        {!! Form::selectRange('number', 1, 10) !!}
        <strong>Guide:</strong>
        {!! Form::selectRange('number', 1, 10) !!}
        <strong>Reviewer:</strong>
        {!! Form::selectRange('number', 1, 10) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    
            <strong>  Select file to Upload:</strong><br>
                {!! Form::file('uploads') !!}
                
        </div>
    </div> 

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>
    {!! Form::close() !!}


@endsection
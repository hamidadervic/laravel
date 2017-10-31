@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="content">
                <div class="title">Laravel Services</div>
                <h1> <?php echo $services['title'] ?> </h1>
                <?php if ( count($services['services']) > 0 ) { ?>
                          <ul class="list-group">
                           <?php foreach($services['services'] as $ser) { ?>
                                 <li class="list-group-item"> <?php echo $ser; ?> </li>
                           <?php	} ?>
                          </ul>
                <?php } ?>
            </div>
        </div>
@endsection


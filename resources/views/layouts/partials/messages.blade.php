@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <br><br>
            <div class="alert alert-success alert-dismissable">
				<a type="button" class="close" data-dismiss="alert" aria-hidden="true">×</a>
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success alert-dismissable">
            <a type="button" class="close" data-dismiss="alert" aria-hidden="true">×</a>
            <i class="fa fa-check"></i>
            {{ $data }}
        </div>
    @endif
@endif
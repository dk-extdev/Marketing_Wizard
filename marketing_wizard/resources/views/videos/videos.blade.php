@extends('layouts.home')

@section('title', 'Lastest Updates')

@section('content')

<div class="gt_main_content_wrap">
    <section class="gt_about_bg">
        <div class="container">
            <div class="col-lg-12">
            <div class="row">

                <div class="panel panel-default panel_custom_1">
                    <div class="panel-heading">LATEST UPDATES</div>
                    <div class="panel-body">
                        <table id="myTable" class="listing_front_tbl ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($uservideos as $uservideo)
                               <tr class="search-result">
                                
                                <td>Project '{{ $uservideo->title }}' has been completed</td>
                                <td class="url"><a href="{{ $uservideo->url }}">{{ $uservideo->url }}</a></td>
                                <td class="meta">{{ $uservideo->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>


        </div>
    </div>
</section>

</div>


@endsection
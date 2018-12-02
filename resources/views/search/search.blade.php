@extends('layouts._layout_no_vue')

@section('content')
<div class="container">
    <div class="spell-wrap">
    <div class="filter-block">
        <button class="filter evocation btn btn-primary">Evocation</button>
    </div>
    <table id="search-table" style="width:100%;">
        <thead>
            <tr>
                @foreach($spells[0]->getAttributes() as $key => $val)
                    @if(!in_array($key, $not_used))
                        
                        <th class="{{str_replace('_', ' ', $key)}} @if(in_array($key, $hide_rows)) none @endif ">{{ucfirst(str_replace("_", " ", $key))}}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($spells as $spell)
            <tr>
                @foreach($spell->getAttributes() as $key => $val)
                    @if(!in_array($key, $not_used))
                        @php if($key == "higher_level" && $val == "0"){ $val = ""; } @endphp
                        <td @if(in_array($key, $hide_rows)) class="none" @endif>
                            @if(!maybe_unserialize($val)){{$val}}
                            @else 
                                @foreach(maybe_unserialize($val) AS $new_val)
                                    {{$new_val}}
                                @endforeach
                            @endif
                        </td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{$spell->name}}</div>
            
            <div class="panel-body">
                <div><strong>Level:</strong> {{$spell->level}}</div>
                <div><strong>Concentration:</strong> {{$spell->concentration}}</div>
                <div><strong>Components:</strong> @foreach($spell->components() as $c) <span>{{$c}} </span>  @endforeach</div>
                <div><strong>Material Cost:</strong> {{$spell->materials}}</div>
                <div><strong>School:</strong> {{$spell->school}}</div>
                <div><strong>Range:</strong> {{$spell->range}}</div>
                <div><strong>Duration:</strong> {{$spell->duration}}</div>
                <div><strong>Casting Time:</strong> {{$spell->casting_time}}</div>
                <div><strong>Description:</strong> @foreach($spell->desc() as $desc) <div>{{$desc}}</div> @endforeach</div>
            </div>
        </div>
    </div> -->
        
    
    </div>
</div>
<script>
    var table = $("#search-table").DataTable({
        "responsive": true,
        "paging": true,
        "info":true,
        "ordering":true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 }, //name
            { responsivePriority: 10000, targets: 1 }, //desc
            { responsivePriority: 100, targets: 2 }, //page
            { responsivePriority: 2, targets: 3 }, //school
            { responsivePriority: 3, targets: 4 }, //level
            { responsivePriority: 4, targets: 5 }, //range
            { responsivePriority: 5, targets: 6 }, // concentration
            { responsivePriority: 100, targets: 7 }, //material
            { responsivePriority: 100, targets: 8 }, //ritual
            { responsivePriority: 100, targets: 9 }, //classes
            { responsivePriority: 6, targets: 10 }, //casting_time
            { responsivePriority: 7, targets: 11 }, //duration
            { responsivePriority: 100, targets: 12 }, //components
            { responsivePriority: 100, targets: 13 } //higher_level
        ],
        "lengthMenu": [[25, 10, 50, -1], [25, 10, 50, "All"]]
    });

    $(".filter.evocation").on("click", function(e){
        e.preventDefault();
        table
            .columns(".school")
            .search("Evocation")
            .draw();
    });

    // $.fn.dataTable.ext.search.push(
    //     function( settings, data, dataIndex ) {
    //         if(data.includes("Evocation")){
    //             return true;
    //         }
    //         return false;
    //     }
    // );
</script>
@endsection
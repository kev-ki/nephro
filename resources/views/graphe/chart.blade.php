@section('graphes')
    <div class="col">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <form action="{{route('barchart')}}" method="post">
                            @csrf
                            @method('post')
                            <div class="col-md-12">
                                <select name="annee" id="annee" type="submit" class="custom-select col-md-3 btn-outline-secondary">
                                    @foreach($year as $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <div class="" id="bar-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var datas = {{json_encode($user)}}

        Highcharts.chart('bar-container', {
            title:{
                text:'Nombre de patient par an selon le sexe'
            },
            subtitle:{
                text:'Kevin'
            },
            xAxis:{
                categories:['Jan','Feb','Mars','Avril','Mai','Juin','Juil','Août','sept','Oct','Nov','Dec']
            },
            yAxis:{
                title:{
                    text:'Nombre de patient'
                }
            },
            legend:{
                layout:'vertical',
                align:'right',
                verticalAlign:'middle',
            },
            plotOptions:{
                series:{
                    allowPointSelect:true
                }
            },
            series:[{
                name:'Patient',
                data:datas
            }],
            responsive:{
                rules:[{
                    condition:{
                        maxWidth:500
                    },
                    chartOptions:{
                        legend:{
                            layout:'horizontal',
                            align:'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        })
    </script>
@endsection

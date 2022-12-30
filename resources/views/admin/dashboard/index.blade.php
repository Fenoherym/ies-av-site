@extends('admin.app')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="dsh-cart" style="border-left: 5px solid #32a852;">
                    <i class="fa fa-tag me-3" style="color: #32a852; font-size:25px;"></i>  Etudiants: {{ $etudiant_count }}
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dsh-cart" style="border-left: 5px solid #e3ad19;">
                    <i class="fa fa-tag me-3" style="color: #e3ad19; font-size:25px;"></i> Enseignants: {{ $enseignant_count }}
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dsh-cart" style="border-left: 5px solid #1985e3;">
                    <i class="fa fa-tag me-3" style="color: #1985e3; font-size:25px;"></i> Mention : {{ $filiere_count }}
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="dsh-cart" style="border-left: 5px solid #32a852;">
                    <i class="fa fa-tag me-3" style="color: #32a852; font-size:25px;"></i> Parcours: {{ $parcours_count  }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <canvas id="myChart1" style="height: 60vh;"></canvas>
            </div>

        </div>
    </div>
@endsection

@php
    $filiere_data = [];
    $filiere_count = [];
    foreach($filieres as $filiere){
        $filiere_data[] = $filiere->name;

        $etudiant_parcrs = 0;

        foreach ($filiere->parcours as $parcours) {
            $etudiant_parcrs = $etudiant_parcrs + $parcours->etudiants->count();
        }
        $filiere_count[] = $etudiant_parcrs;
    }


@endphp

@section('extra-js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script type="text/javascript">

    <?php echo "var filiere_data = '".implode("<>", $filiere_data)."'.split('<>');"; ?>
    <?php echo "var filiere_count = '".implode("<>", $filiere_count)."'.split('<>');"; ?>
    const ctx1 = document.getElementById('myChart1').getContext('2d');
    const myChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: filiere_data,
            datasets: [{
                label: "Nombre d'étudiants pour chaque mention",
                data: filiere_count,
                backgroundColor: [
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',

                ],
                borderColor: [
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                    '#3d85e3',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });



</script>
@endsection

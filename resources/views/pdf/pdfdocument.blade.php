@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<head>
    <title>Summary Details</title>


        <style type="text/css">
        
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }

    </style>

</head>
<body style="font-size:25px;">


<?php 

    //echo "<pre>";
    //print_r($assignednaturopathy);
    //echo $userData->patient_profiles->age;

?>

<div class="header-content-details">
    <h6 class="fw-bolder text-center">Swamy Vivekananda Yoga Anusandhana Samsthana<br>
        Arogyadhama,Holistic Research Health HomePrashanti Kutiram,Bengaluru-560105</h6>
</div>

<table>
  <tr>
    <th></th>
    <th></th>
  </tr>
  <tr>
    <td>Date:</td>
    <td>{{ isset($userviteId) && !empty($userviteId) ?$userviteId->date : '' }}</td>
</tr>
<tr>
    <td>Name:</td>
    <td>{{ isset($userData) && !empty($userData) ?$userData->name : '' }}</td>
</tr>
<tr>
    <td>Age/Sex:</td>
    <td>{{ isset($userData['userDetails']) && !empty($userData['userDetails']) ? $userData['userDetails']['age'] : '' }} / {{ isset($userData['userDetails']) && $userData['userDetails']['gender'] ==1 ? "Male" : "Female" }}</td>
</tr>
<tr>
    <td>Registation:</td>
    <td>IP{{ isset($userData['userDetails']) && !empty($userData['userDetails']) ? $userData['userDetails']['user_id'] : '' }}</td>
</tr>
<tr>
    <td>Department:</td>
    <td>{{ isset($userData['userDetails']['department']) && !empty($userData['userDetails']['department']) ? $userData['userDetails']['department']['name'] : '' }}</td>
  </tr>

</table>


<table>
    
    <tr>
        <th>NATUROPATHY</th>
    </tr>

    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($naturopathy as $key=>$naturoTherapy)
    <tr>
        <td>{{$naturoTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp

                <th>

                    @foreach($assignednaturopathy as $key=>$values)
                        @if($naturoTherapy->id == $values->therapy_id && $i == $values->is_day)
                           {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>


<table>
    
    <tr>
        <th>Ayurvedha</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($ayurvedha as $key=>$ayurvedhaTherapy)
    <tr>
        <td>{{$ayurvedhaTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>

                    @foreach($assignedayurvedha as $key=>$values)
                        @if($ayurvedhaTherapy->id == $values->therapy_id && $i == $values->is_day)
                           {{ $ayurvedhaTherapy->therapy_name }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>

<table>
    
    <tr>
        <th>Yoga</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($yoga as $key=>$yogaTherapy)
    <tr>
        <td>{{$yogaTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assignedyoga as $key=>$values)
                        @if($yogaTherapy->id == $values->therapy_id && $i == $values->is_day)
                           {{ $yogaTherapy->therapy_name }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>


<table>
    
    <tr>
        <th>Physiotheraphy</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($physiotheraphy as $key=>$physiotheraphyTherapy)
    <tr>
        <td>{{$physiotheraphyTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assignedphysiotheraphy as $key=>$values)
                        @if($physiotheraphyTherapy->id == $values->therapy_id && $i == $values->is_day)
                           {{ $physiotheraphyTherapy->therapy_name }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>


<table>
    
    <tr>
        <th>Acupuncture</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($acupuncture as $key=>$acupunctureTherapy)
    <tr>
        <td>{{$acupunctureTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assignedacupuncture as $key=>$values)
                        @if($acupunctureTherapy->id == $values->therapy_id && $i == $values->is_day)
                           {{ $acupunctureTherapy->therapy_name }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>


<table>
    
    <tr>
        <th>Counseling</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($counseling as $key=>$counselingTherapy)
    <tr>
        <td>{{$counselingTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assignedcounseling as $key=>$values)
                        @if($counselingTherapy->id == $values->therapy_id && $i == $values->is_day)
                           {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>



<table>
    
    <tr>
        <th>Breakfast</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($breakfast as $key=>$breakfastTherapy)
    <tr>
        <td>{{$breakfastTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assignedbreakfast as $key=>$values)
                        @if($breakfastTherapy->id == $values['therapy_id'] && $i == $values['is_day'])
                           {{ $values['therapy']['therapy_name'] }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>


<table>
    
    <tr>
        <th>Juices</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($juices as $key=>$juicesTherapy)
    <tr>
        <td>{{$juicesTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assignedjuices as $key=>$values)
                        @if($juicesTherapy->id == $values['therapy_id'] && $i == $values['is_day'])
                           {{ $values['therapy']['therapy_name'] }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>

<table>
    
    <tr>
        <th>Lunch</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($lunch as $key=>$lunchTherapy)
    <tr>
        <td>{{$lunchTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assignedlunch as $key=>$values)
                        @if($lunchTherapy->id == $values['therapy_id'] && $i == $values['is_day'])
                           {{ $values['therapy']['therapy_name'] }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>

<table>
    
    <tr>
        <th>Snacks</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($snacks as $key=>$snacksTherapy)
    <tr>
        <td>{{$snacksTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assignedsnacks as $key=>$values)
                        @if($snacksTherapy->id == $values['therapy_id'] && $i == $values['is_day'])
                           {{ $values['therapy']['therapy_name'] }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>

<table>
    
    <tr>
        <th>Dinner</th>
    </tr>
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php
                $initialDate = $userviteId->date;
            @endphp

            @for($i = 1; $i <= 7; $i++)
                @php
                    $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                @endphp

                <th>{{ $date->format('Y-m-d') }}</th>
            @endfor

    </tr>

    @foreach($dinner as $key=>$dinnerTherapy)
    <tr>
        <td>{{$dinnerTherapy->therapy_name}}</td>

        @for($i = 1; $i <= 7; $i++)
            @php
                $date = \Carbon\Carbon::parse($initialDate)->addDays($i - 1);
                $tableDate = $date->format('Y-m-d');
            @endphp
            
                <th>
                    
                    @foreach($assigneddinner as $key=>$values)
                        @if($dinnerTherapy->id == $values['therapy_id'] && $i == $values['is_day'])
                           {{ $values['therapy']['therapy_name'] }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>

<!-- @if(!empty($weekno))

    @include('pdf.otherweekpdf')

@endif -->


</body>

</html>

@foreach($weekno as $key=>$value)

<table>
    
    <tr>
        <th>NATUROPATHY</th>
    </tr>
    
    <tr>
        <th>Params ⬇ Therapy Dates ➟ </th>

            @php

                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));

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
                        @if($naturoTherapy->id == $values->therapy_id && $tableDate == $values->date)
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($ayurvedhaTherapy->id == $values->therapy_id && $tableDate == $values->date)
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($yogaTherapy->id == $values->therapy_id && $tableDate == $values->date)
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($physiotheraphyTherapy->id == $values->therapy_id && $tableDate == $values->date)
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($acupunctureTherapy->id == $values->therapy_id && $tableDate == $values->date)
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($counselingTherapy->id == $values->therapy_id && $tableDate == $values->date)
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($breakfastTherapy->id == $values['therapy_id'] && $tableDate == $values['date'])
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($juicesTherapy->id == $values['therapy_id'] && $tableDate == $values['date'])
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($lunchTherapy->id == $values['therapy_id'] && $tableDate == $values['date'])
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($snacksTherapy->id == $values['therapy_id'] && $tableDate == $values['date'])
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
                $initialDate1 = $userviteId->date;
                $initialDate = date('Y-m-d', strtotime($initialDate1 . ' +7 days'));
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
                        @if($dinnerTherapy->id == $values['therapy_id'] && $tableDate == $values['date'])
                           {{ $values['therapy']['therapy_name'] }} {!! $image !!}
                        @endif                    
                    @endforeach
                </th>
           
        @endfor

    </tr>
    @endforeach

</table>

@endforeach
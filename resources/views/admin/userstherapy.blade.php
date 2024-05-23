
        <div id="addDynamic">
         <hr class="mt-2 mb-2" />
         <div class="d-flex justify-content-between align-items-center">
            <h4>Schedule List</h4>
            <button disabled class="btn text-bg-danger bg-danger py-2 text-white" id="deleteTherapyAll">Delete All</button>
         </div>
         

           <table class="table  table-borderless">
            <thead class="cstm-tble">
            <tr class="text-white">
               <!-- <th>{{__('apilang.all')}}</th> -->
               <th><input type="checkbox" class="form-check-input" id="checkAlldelete" /></th>
               <th>{{__('apilang.date')}}</th>
               <th>{{__('apilang.therapy')}}</th>
               <th>{{__('apilang.start_time')}}</th>
               <th>{{__('apilang.end_time')}}</th>
               <th>{{__('apilang.action')}}</th>
            </tr>
          </thead>
          <tbody>

            @if(empty($userTherapy))
             <tr><td colspan="5" class="text-center">No therapy </td></tr>
            @endif

            @foreach($userTherapy as $key=>$therapy)
               <tr>
                  <td> <input class="form-check-input alldelete" type="checkbox" name="alldelete[]" value="{{ isset($therapy['id']) && !empty($therapy['id']) ? $therapy['id'] : '' }}"> </td>
                  <td>{{ isset($therapy['date']) && !empty($therapy['date']) ? $therapy['date'] : "" }}</td>
                  <td>{{ isset($therapy['therapy']['therapy_name']) && !empty($therapy['therapy']['therapy_name']) ? $therapy['therapy']['therapy_name'] : "" }}</td>
                  <td>{{ isset($therapy['start_time']) && !empty($therapy['start_time']) ? $therapy['start_time'] : "" }}</td>
                  <td>{{ isset($therapy['end_time']) && !empty($therapy['end_time']) ? $therapy['end_time'] : "" }} </td>
                  <td> <!--<a class="text-primary" href="#">Edit</a> / --> <a class="text-danger deleteTherapy" id="deleteTherapy" data-therapy="{{$therapy['id']}}" href="javascript::void()">Delete</a></td>
               </tr>
            @endforeach

          </tbody>
           </table>
           
        </div>



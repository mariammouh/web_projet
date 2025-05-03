@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your tasks') }}</div>

                    <div class="card-body">
                     
                        @if(!empty($todolist))
                            @foreach ($todolist as $item)  <ul >
                                <li> <div class="list"><p class="txt"> {{$item['content']}}{{ __('   ')}}</p>
                                    @if($item->completed==true)
                                     <p class="action">this tacks is completed ✅ </p>

                                     @else
                                     
                                    <form method="POST" action="{{route('complete',$item->id)}}"  >
                                        @csrf
                                        <button class="complete" type="submit" >Complete</button> </form>
                                    <form method="POST" action="{{route('destroy',$item->id)}}"> 
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete" type="submit" >delete</button>
                                    </form>@endif</div>
                                </li>

                        </ul>
                        @endforeach  
                        @elseif(empty($todolist)) {{ __('Thers no tacks curentlly')}}
                        @endif
                      <form method="POST" action="{{route('add',Auth::user()->id)}}">
                        @csrf
                        <input type="text"  id="todoInput" name="task" placeholder="Add new task">
                       
                        <button type="submit"class="action" >Add</button> </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

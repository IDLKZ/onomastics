@extends('layouts.backend.layout')
@push('styles')
    <style>
        .create{
            border-radius: 3px;
            background-color: #999999;
            padding: 15px;
            margin-top: -60px;
            margin-right: 15px;
            float: right;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(233, 30, 99, 0.4);
            background: linear-gradient(60deg, #ec407a, #d81b60);
            background-color: rgba(0, 0, 0, 0);
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">supervised_user_circle</i>
                    </div>
                    <h4 class="card-title">{{__("content.dictionary")}}</h4>
                    <a href="{{route('admin-dictionary.create')}}" class="btn btn-primary create">{{__("content.create")}}<div class="ripple-container"></div></a>
                </div>
                <div class="card-body">
                    @if($dictionaries->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>{{__("validation.attributes.img")}}</th>
                                    <th>{{__("validation.attributes.word")}}</th>
                                    <th>{{__("validation.attributes.description")}}</th>
                                    <th class="text-right">{{__("content.action")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dictionaries as $dictionary)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td><img src="{{$dictionary->img}}" style="max-height: 130px; max-width: 130px;border-radius: 50%"></td>
                                        <td>{{$dictionary->word}}</td>
                                        <td>{!! $dictionary->description !!}</td>




                                        <td class="td-actions text-right">
                                            <a href="{{route('admin-dictionary.edit', $dictionary->id)}}" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="{{__("content.edit")}}">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <form class="d-inline" action="{{route('admin-dictionary.destroy', $dictionary->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" rel="tooltip" class="btn btn-danger btn-round" data-original-title="" title="{{__("content.delete")}}">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $dictionaries->links() !!}
                        </div>
                    @else
                        <h3 class="text-danger"> {{__("content.empty")}}</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


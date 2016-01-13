<script src="{{ URL::asset('js/grid.js') }}"></script>
<form action="{{ route('order.index') }}" id="grid">
    <input type="hidden" id="page" name="page" value="{{$items->currentPage()}}"/>

    @foreach(\App\Orders::$search['columns'] as $column)
        <div class="form-group">
            <label>
                <span>{{$column}}</span>
                <input type="text" name="search_" value="{{\Input::get('search_' . $column)}}"/>
            </label>
        </div>
    @endforeach
    <div class="form-group">
        <label>
            <span>date start</span>
            <input type="text" name="search_date_start" value="{{\Input::get('search_date_start')}}"/>
        </label>
    </div>
    <div class="form-group">
        <label>
            <span>date end</span>
            <input type="text" name="search_date_end" value="{{\Input::get('search_date_end')}}"/>
        </label>
    </div>

    <button type="button" class="btn btn-primary" id="search">Search</button>


    <div class="form-group">
        <label>
            <span>Показывать по:</span>
            <select name="per_page" id="per_page">
                @for($i=1; $i<5; $i++)
                    <option value="{{$i}}" @if($items->perPage() == $i) selected @endif>{{$i}}</option>
                @endfor;
            </select>
        </label>
    </div>

    <table class="table">
        <thead>
        <tr id="sort">
            <td><a href="#">
                    <span>#</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_id'))}}"></span>
                    <input class="" type="hidden" name="sort_id" value="{{\Input::get('sort_id')}}"/>
                </a></td>
            <td>
                <a href="#">
                    <span>Дата</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_add_time'))}}"></span>
                    <input class="" type="hidden" name="sort_add_time" value="{{\Input::get('sort_add_time')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>Клиент</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_client_name'))}}"></span>
                    <input class="" type="hidden" name="sort_client_name" value="{{\Input::get('sort_client_name')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>Телефон</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_client_phone'))}}"></span>
                    <input type="hidden" name="sort_client_phone" value="{{\Input::get('sort_client_phone')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>Товар</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_good_id'))}}"></span>
                    <input type="hidden" name="sort_good_id" value="{{\Input::get('sort_good_id')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>Статус</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_state_id'))}}"></span>
                    <input type="hidden" name="sort_state_id" value="{{\Input::get('sort_state_id')}}"/>
                </a>
            </td>
        </tr>
        </thead>

        <tbody>
        @foreach($items as $index => $order)/

            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->add_time}}</td>
                <td>{{$order->client_name}}</td>
                <td>{{$order->client_phone}}</td>
                <td>
                    <a href="{{route('good.show', ['id' => $order->good_id])}}">{{$order->good->name}}</a>

                    <div class="small">
                        {{$order->good->advert->first_name}} {{$order->good->advert->last_name}}
                        ({{$order->good->advert->login}})
                    </div>
                </td>
                <td>
                    <span class="label label-{{$order->state->slug}}">{{$order->state->name}}</span>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</form>

{{-- Pager --}}
@if($items->lastPage() > 1)
    <nav>
        <ul class="pagination">
            @for($i=1; $i<= $items->lastPage(); $i++)
                <li @if($items->currentPage() == $i) class="active" @endif>
                    <a data-page="{{$i}}" href="#">{{$i}}</a>
                </li>
            @endfor
        </ul>
    </nav>
@endif
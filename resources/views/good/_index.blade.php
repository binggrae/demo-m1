<script src="{{ URL::asset('js/grid.js') }}"></script>
<form action="{{ route('good.index') }}" id="grid">
    <input type="hidden" id="page" name="page" value="{{$items->currentPage()}}"/>

    <label>
        <select name="per_page" id="per_page">
            @for($i=1; $i<5; $i++)
                <option value="{{$i}}" @if($items->perPage() == $i) selected @endif>{{$i}}</option>
            @endfor;
        </select>
    </label>

    <table class="table">
        <thead>

        <tr id="sort">
            <td>
                <a href="#">
                    <span>#</span>
                    <span class="{{\App\Goods::getSortableClass(\Input::get('sort_id'))}}"></span>
                    <input class="" type="hidden" name="sort_name" value="{{\Input::get('sort_id')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>Название</span>
                    <span class="{{\App\Goods::getSortableClass(\Input::get('sort_name'))}}"></span>
                    <input class="" type="hidden" name="sort_name" value="{{\Input::get('sort_name')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>Цена</span>
                    <span class="{{\App\Goods::getSortableClass(\Input::get('sort_price'))}}"></span>
                    <input type="hidden" name="sort_price" value="{{\Input::get('sort_price')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>Рекламодатель</span>
                    <span class="{{\App\Goods::getSortableClass(\Input::get('sort_advert_id'))}}"></span>
                    <input type="hidden" name="sort_advert_id" value="{{\Input::get('sort_advert_id')}}"/>
                </a>
            </td>
        </tr>
        </thead>


        <tbody>
        @foreach($items as $index => $good)
            <tr>
                <td>{{($items->currentPage() - 1) * $items->perPage() + ($index + 1)}}</td>
                <td>
                    <a href="{{route('good.edit', ['id' => $good->id])}}">
                        {{$good->name}}
                    </a>

                    <div class="small">
                        <span>Внешний ID: {{$good->id}}</span>
                    </div>
                </td>
                <td>{{number_format($good->price, 2, '.', ' ')}}</td>
                <td>
                    <a href="{{route('advert.show', ['id' => $good->advert_id])}}">
                        {{$good->advert->first_name}} {{$good->advert->last_name}}
                    </a>

                    <div class="small">
                        {{$good->advert->login}}
                    </div>
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
<script src="{{ URL::asset('js/grid.js') }}"></script>
<form action="{{ route('state.index') }}" id="grid">
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
            <td>#</td>
            <td>
                <a href="#">
                    <span>Название</span>
                    <span class="{{\App\Goods::getSortableClass(\Input::get('sort_name'))}}"></span>
                    <input class="" type="hidden" name="sort_name" value="{{\Input::get('sort_name')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>Псевдоним</span>
                    <span class="{{\App\Goods::getSortableClass(\Input::get('sort_slug'))}}"></span>
                    <input type="hidden" name="sort_slug" value="{{\Input::get('sort_slug')}}"/>
                </a>
            </td>
        </tr>
        </thead>

        <tbody>
        @foreach($items as $index => $state)
            <tr>
                <td>{{($items->currentPage() - 1) * $items->perPage() + ($index + 1)}}</td>
                <td>{{$state->name}}</td>
                <td>{{$state->slug}}</td>
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
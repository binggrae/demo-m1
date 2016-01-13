<script src="{{ URL::asset('js/grid.js') }}"></script>
<form action="{{ route('advert.index') }}" id="grid">
    <input type="hidden" id="page" name="page" value="{{$items->currentPage()}}"/>


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
                    <span>first name</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_first_name'))}}"></span>
                    <input class="" type="hidden" name="sort_first_name" value="{{\Input::get('sort_first_name')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>last name</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_last_name'))}}"></span>
                    <input class="" type="hidden" name="sort_last_name" value="{{\Input::get('sort_last_name')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>login</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_login'))}}"></span>
                    <input type="hidden" name="sort_login" value="{{\Input::get('sort_login')}}"/>
                </a>
            </td>
            <td>
                <a href="#">
                    <span>password</span>
                    <span class="{{\App\Orders::getSortableClass(\Input::get('sort_password'))}}"></span>
                    <input type="hidden" name="sort_password" value="{{\Input::get('sort_password')}}"/>
                </a>
            </td>
        </tr>
        </thead>

        <tbody>
        @foreach($items as $index => $order)/

            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->first_name}}</td>
                <td>{{$order->last_name}}</td>
                <td>{{$order->login}}</td>
                <td>{{$order->password}}</td>
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
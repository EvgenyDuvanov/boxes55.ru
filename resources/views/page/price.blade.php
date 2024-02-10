<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 half-card">
            <h3>НАШ ПРАЙС</h3>
            <table>
                <thead>
                    <tr>
                        <th class="col-4">Наименование</th>
                        <th class="col-4">до 3 дней</th>
                        <th class="col-4">от 3 дней</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ intval($product->price_3_days) }} ₽/день</td>
                            <td>{{ intval($product->price_over_3_days) }} ₽/день</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="">Комплекты</h4>
            <table>
                <thead>
                    <tr>
                        <th class="col-4">Наименование</th>
                        <th class="col-4">до 3 дней</th>
                        <th class="col-4">от 3 дней</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sets as $set)
                        <tr>
                            <td>{{ $set->name }}</td>
                            <td>{{ intval($set->price_3_days) }} ₽/день</td>
                            <td>{{ intval($set->price_over_3_days) }} ₽/день</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <small>* Чем дольше вы арендуете оборудование, тем меньше стоимость аренды в расчете на одни сутки. Данная стоимость исчесляется при аренде от трех дней включительно.</small> --}}
        </div>
    </div>
</div>

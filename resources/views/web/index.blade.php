
<div class="row">
    <div class="col-6 m-auto">

        <div class="alert alert-warning mb-2">
            Выберите службу доставки, чтобы рассчитать стоимость доставки.
        </div>

        <div class="card">
            <div class="card-body">
                <form class="" action="/api/delivery/calculate" method="POST">
                    <div class="row form-group">
                        <label class="col-form-label col-3" for="sourceKladr">Служба доставки</label>
                        <div class="col">
                            <select class="form-control @error('service') is-invalid @enderror" name="service">
                                @foreach ([
                                    'fast, slow' => 'Все', 
                                    'fast' => 'Быстрая доставка', 
                                    'slow' => 'Медленная доставка'
                                    ] as $value => $text)
                                    <option value="{{ $value }}" {{ $errors->service === $value ? 'selected' : '' }}>{{ $text }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">@error('service'){{ $message }}@enderror</div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-form-label col-3" for="source_kladr">От куда<span class="text-danger">*</span></label>
                        <div class="col">
                            <input class="form-control @error('source_kladr') is-invalid @enderror" name="source_kladr" value="{{ old('source_kladr') }}" required_ />
                            <div class="invalid-feedback">@error('source_kladr'){{ $message }}@enderror</div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-form-label col-3" for="target_kladr">Куда<span class="text-danger">*</span></label>
                        <div class="col">
                            <input class="form-control @error('target_kladr') is-invalid @enderror" name="target_kladr" value="{{ old('target_kladr') }}" required_ />
                            <div class="invalid-feedback">@error('target_kladr'){{ $message }}@enderror</div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-form-label col-3" for="weight">Вес, кг.<span class="text-danger">*</span></label>
                        <div class="col-3">
                            <input class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" placeholder="0.00" required_ />
                            <div class="invalid-feedback">@error('weight'){{ $message }}@enderror</div>
                        </div>
                    </div>
                    
                    <hr />
                    <button class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>

    </div>
</div>